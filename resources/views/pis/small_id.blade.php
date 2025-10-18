<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DOH-CVCHD ID</title>

    <style>
        /* === CR80 ID card size === */
        @page {
            size: 53.98mm 85.6mm;
            margin: 0;
        }
        @font-face {
            font-family: 'BarlowSemiCondensed';
            src: url('{{ public_path('fonts/BarlowSemiCondensed-Regular.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
            }   

        @font-face {
            font-family: 'BarlowSemiCondensed';
            src: url('{{ public_path('fonts/BarlowSemiCondensed-SemiBold.ttf') }}') format('truetype');
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: 'BarlowSemiCondensed';
            src: url('{{ public_path('fonts/BarlowSemiCondensed-Bold.ttf') }}') format('truetype');
            font-weight: bold;
            font-style: normal;
        }


        html, body {
            width: 53.98mm;
            height: 85.6mm;
            margin: 0;
            padding: 0;
            background: #fff;
            overflow: hidden;
            font-family: 'BarlowSemiCondensed', sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .page {
            width: 53.98mm;
            height: 85.6mm;
            position: relative;
            page-break-inside: avoid;
        }

        .bg {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            width: 100%;
            text-align: center;
            color: #2b6452;
            font-family: 'BarlowSemiCondensed', sans-serif;
        }

        /* === FRONT SIDE ELEMENTS === */
        .picture1 {
            position: absolute;
            top: 58px;
            left: 50%;
            transform: translateX(-50%);
            width: 32mm;
            height: 33mm;
            object-fit: cover;
            border-radius: 4px;
            z-index: -1;
        }

        .name {
            top: 53.5mm;
            font-size: 4.2mm;
            font-weight: 700;
            color: #2b6452;
        }

        .designation {
            top: 59mm;
            font-size: 2.8mm;
            font-weight: 600;
            color: #2b6452;
            font-family: 'BarlowSemiCondensed', sans-serif;
        }

        .userid {
            top: 78mm;
            font-size: 2.1mm;
            font-weight: 600;
            color: #2b6452;
            text-align: center;
            width: 100%;
        }

        /* === WHITE TEXT for Permanent Users === */
        .white-text .name,
        .white-text .designation,
        .white-text .userid {
            color: white !important;
        }

        .division {
            position: absolute;
            width: 90%;
            left: 5%;
            color: #2b6452;
            font-weight: 600;
            white-space: pre-line;
            text-align: center;
            line-height: 0.9;
        }

        /* === BACK SIDE ELEMENTS === */
        .info-field {
            position: absolute;
            font-size: 1.9mm;
            color: white;
            font-weight: 700;
            font-family: 'BarlowSemiCondensed', sans-serif;
        }

        .field-philhealth { top: 4.6mm; left: 4.2mm; }
        .field-tin { top: 4.6mm; left: 28.5mm; }
        .field-blood { top: 10.9mm; left: 4.2mm; }
        .field-birth { top: 10.9mm; left: 28.5mm; }
        .field-address { top: 17.9mm; left: 4.4mm; width: 43mm; font-size: 1.9mm; line-height: 1.1; }

        .field-ice-name { top: 28.1mm; left: 9.4mm; font-size: 1.9mm; }
        .field-ice-address { top: 31.2mm; left: 11.5mm; font-size: 1.9mm; }
        .field-ice-contact { top: 37.4mm; left: 14.2mm; font-size: 1.9mm; }
        .field-ice-donate { top: 44.5mm; left: 5.3mm; width: 50mm; }
        .field-ice-specific { top: 46.9mm; left: 21.4mm; font-size: 1.9mm; line-height: 1.1; }

        .signature1 {
            position: absolute;
            top: 54.5mm;
            left: 50%;
            transform: translateX(-50%);
            width: 30mm;
            height: auto;
            object-fit: contain;
            opacity: 1;
            background: transparent;
            mix-blend-mode: multiply;
        }
    </style>
</head>
<body>

    @php
        use PIS\Division;

        $division = [
            'desc' => 'NO DIVISION',
            'top' => '70.8mm',
            'font' => '3.1mm',
        ];

        if (!empty($user->division_id)) {
            $divisionModel = Division::find($user->division_id);
            if ($divisionModel) {
                if ($user->division_id == 3) {
                    $division['desc'] = "Regional Director and Assistant\nRegional Director Division (RD-ARD)";
                    $division['top'] = '68.9mm';
                    $division['font'] = '3.1mm';
                } elseif ($user->division_id == 4) {
                    $division['desc'] = "Local Health Support Division\n(LHSD)";
                    $division['top'] = '68.9mm';
                    $division['font'] = '3.2mm';
                } elseif ($user->division_id == 5) {
                    $parts = explode('RLED - ', $divisionModel->description);
                    $division['desc'] = isset($parts[1]) ? $parts[1] . ' (RLED)' : $divisionModel->description . ' (RLED)';
                    $division['top'] = '68.2mm';
                    $division['font'] = '3.4mm';
                } elseif ($user->division_id == 6) {
                    $division['desc'] = "Management Support Division\n(MSD)";
                    $division['top'] = '68.8mm';
                    $division['font'] = '3.2mm';
                } else {
                    $division['desc'] = $divisionModel->description;
                }
            }
        }

        $isPermanent = isset($user->job_status) && $user->job_status === 'Permanent';

        // === Format ID: created_at year + last 4 digits of userid ===
        $year = $user->created_at ? $user->created_at->format('Y') : '';
        $last5 = substr($user->userid, -5);
        $formattedId = $year . '-' . $last5;
    @endphp

<!-- FRONT PAGE -->
<div class="page front {{ $isPermanent ? 'white-text' : '' }}">
    @if($isPermanent)
        <img src="{{ public_path('img/Final_Small_Front_Reg.png') }}" alt="Front of ID" class="bg">
    @else
        <img src="{{ public_path('img/Final_Small_Front.png') }}" alt="Front of ID" class="bg">
    @endif

    @if(!empty($user->picture) && file_exists(public_path('upload_picture/picture/' . $user->picture)))
        <img src="{{ public_path('upload_picture/picture/' . $user->picture) }}" class="picture1" alt="Profile Picture">
    @else
        <img src="{{ public_path('img/default_profile.png') }}" class="picture1" alt="Profile Picture">
    @endif

    <div class="overlay name">{{ ucwords(strtolower($name)) }}</div>
    <div class="overlay designation">{{ ucwords($designation) }}</div>

    <div class="overlay userid">ID NO.: {{ $formattedId }}</div>

    <div 
        class="overlay division" 
        style="top: {{ $division['top'] }}; font-size: {{ $division['font'] }} ;"
    >
        {!! nl2br(e(ucwords($division['desc']))) !!}
    </div>
</div>

<!-- BACK PAGE -->
<div class="page back">
    @if($isPermanent)
        <img src="{{ public_path('img/Final_Small_Back_Reg.png') }}" alt="Back of ID" class="bg">
    @else
        <img src="{{ public_path('img/Final_Small_Back.png') }}" alt="Back of ID" class="bg">
    @endif

    <div class="info-field field-philhealth">{{ $phicno ?? '' }}</div>
    <div class="info-field field-tin">{{ $tin_no ?? '' }}</div>
    <div class="info-field field-blood">{{ $blood_type ?? '' }}</div>
    <div class="info-field field-birth">
        {{ $date_of_birth ? \Carbon\Carbon::parse($date_of_birth)->format('F d, Y') : '' }}
    </div>
    <div class="info-field field-address">{{ $residential_address ?? '' }}</div>

    <!-- ICE FIELDS (values only, no labels) -->
    <div class="info-field field-ice-name">{{ $ice_name ?? '' }}</div>
    <div class="info-field field-ice-address">{{ $ice_address?? '' }}</div>
    <div class="info-field field-ice-contact">{{ $ice_contact_no ?? '' }}</div>
 
    <div class="info-field field-ice-donate" style="font-family: Arial Unicode MS, DejaVu Sans, sans-serif; color:black">
    @if($ice_donate_organ === 'Yes')
        &#10003; 
    @endif
</div>

    <div class="info-field field-ice-specific">{{ $ice_specific_organ ?? '' }}</div>

    @if(!empty($user->signature) && file_exists(public_path('upload_picture/signature/' . $user->signature)))
        <img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/signature/'.$user->signature }}" class="signature1" alt="Signature">
    @endif
</div>


</body>
</html>
