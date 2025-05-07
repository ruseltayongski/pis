<?php
    use PIS\Section;
    use PIS\Division;

?>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@if(isset($personal_information) and count($personal_information) > 0)
    <div class="table-responsive">
        <table id="simple-table" class="table table-bordered table-hover">
            <thead>
            <tr class="info">
                <th>Employee ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Section / Division</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Civil Status</th>
                <th>ETD (dd/mm/yy)</th>
                {{-- <th>Employee Status</th> --}}
                <th>Options</th>
            </tr>
            </thead>

            <tbody>
            @foreach($personal_information as $user)
                <tr>
                    <td>
                        <a href="#pis_info" role="button" class="green" data-backdrop="static" data-id="{{ $user->userid }}" data-toggle="modal" >
                            <b class="green">
                                @if(strpos($user->userid,'no_userid'))
                                    NO USERID
                                @else
                                    {{ $user->userid }}
                                @endif
                            </b>
                        </a>
                    </td>
                    <td><a href="#pis_info" role="button" data-backdrop="static" data-id="{{ $user->userid }}" data-toggle="modal" ><b class="blue">@if($user->fname || $user->lname || $user->mname || $user->name_extension) {{ $user->fname.' '.$user->mname.' '.$user->lname.' '.$user->name_extension }} @else <i>NO NAME</i> @endif</b></a></td>
                    <td>
                        @if($designation = \PIS\Designation::find($user->designation_id)) {{ $designation->description }} @else {{ $user->position }} @endif
                    </td>

                    <td>
                        <label class="orange">@if(isset(Section::find($user->section_id)->description)) {{ Section::find($user->section_id)->description }} @else NO SECTION @endif</label>
                        <small><em>(@if(isset(Division::find($user->division_id)->description)) {{ Division::find($user->division_id)->description }} @else NO DIVISION @endif {{ ')' }}</em></small>
                    </td>
                    <td>
                        {{ $user->sex }}
                    </td>
                    <td>
                        @if($user->date_of_birth)
                            {{ \Carbon\Carbon::parse($user->date_of_birth)->age }}
                        @else
                            <i></i>
                        @endif
                    </td>
                    <td>
                        {{ $user->civil_status }}
                    </td>
                    {{-- <td>
                        @if( $user->job_status == 'Job Order' )
                            <b class="green">{{ $user->job_status }}</b>
                         @else
                            <b class="purple">{{ $user->job_status }}</b>
                        @endif
                    </td> --}}
{{-- 
                    <td>
                        @if($user->entrance_of_duty)
                        {{ \Carbon\Carbon::parse($user->entrance_of_duty)->format('m/d/Y') }}
                        @else
                           
                        @endif
                    </td> --}}

                    <td>
                        <input type="date" class="form-control etd-input" 
                               data-userid="{{ $user->userid }}" 
                               data-current="{{ $user->entrance_of_duty ? \Carbon\Carbon::parse($user->entrance_of_duty)->format('Y-m-d') : '' }}"
                               value="{{ $user->entrance_of_duty ? \Carbon\Carbon::parse($user->entrance_of_duty)->format('Y-m-d') : '' }}"
                               style="border: none; outline: none;" disabled>
                    </td>

                    <!-- <td class="center">
                        @if(strpos($user->userid,'no_userid'))
                            NO USERID
                        @else
                            <a href="#" class="red delete" id="{{ $type.'delete'.$user->userid }}">
                                <i class="ace-icon fa fa-trash bigger-180"></i>
                            </a>
                            
                        @endif
                    </td> -->

                    <td class="center">
                        @if(strpos($user->userid, 'no_userid') !== false)
                            NO USERID
                        @else
                            <div style="display: inline-flex; gap: 8px; align-items: center;">
                                <a href="#" class="red delete" id="{{ $type.'delete'.$user->userid }}" title="REMOVE">
                                    <i class="ace-icon fa fa-trash bigger-150"></i>
                                </a>
                                <a href="#" class="set-inactive" id="{{ $type.'inactive'.$user->userid }}" title="INACTIVE">
                                    <i class="ace-icon fa fa-eye-slash bigger-150 text-warning"></i>
                                </a>
                                <a href="#" title="PRINT COE" onclick="openPrintPage('{{ $user->userid }}'); return false;">
                                    <i class="ace-icon fa fa-file-pdf-o bigger-150"></i>
                                </a>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $personal_information->links() }}
@else
    <div class="alert alert-danger" role="alert">PIS records are empty.</div> 
@endif

<script>
    //user information
    $("a[href='#pis_info']").on('click',function(){
        $('.modal_content').html(loadingState);
        //var url = "{{ asset('pisInfo') }}"+"/"+$(this).data('id');
        var url = "/pis/pisInfo/" + $(this).data('id');
        console.log("{{ route('pis.info', ['userid' => '']) }}"+"/"+$(this).data('id'));
        setTimeout(function(){
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('.modal_content').html(data);
                }
            });
        },700);
    });
    function openPrintPage(userid) {
    var newWindow = window.open('', '_blank');
    
    newWindow.document.write('<html><head><title>Certification of Employment</title>');
    
    newWindow.document.write(`
        <style>
            @page {
                size: A4;
                margin: 0;
            }
            
            @media print {
                body {
                    width: 210mm;
                    height: 297mm;
                    margin: 0;
                    padding: 0;
                }
                .certificate-container {
                    box-shadow: none;
                    border: none;
                    padding: 20mm;
                }
                .print-button {
                    display: none;
                }
            }
            
            body {
                font-family: 'Times New Roman', serif;
                margin: 0;
                padding: 0;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            
            .page-wrapper {
                width: 210mm;
                height: 297mm;
                margin: 20px auto;
                background: white;
                box-shadow: 0 0 10px rgba(0,0,0,0.2);
                position: relative;
            }
            
            .footer {
                position: absolute;
                bottom: 10mm;
                left: 15mm;
                right: 15mm;
                font-size: 8px;
                text-align: center;
                border-top: 1px solid #888;
                padding-top: 3mm;
                line-height: 1.3;
            }
            
            .certificate-container {
                width: 100%;
                height: 100%;
                box-sizing: border-box;
                padding: 20mm 20mm 30mm 20mm;
                text-align: center;
                position: relative;
            }
            
            .header {
                text-align: center;
                margin-bottom: 20px;
            }
            
            .header-logos {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 10px;
            }
            
            .logo-and-text-container {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;  /* Align items to the top */
                margin-bottom: 10px;
            }
            
            .logo {
                width: 100px;
                height: auto;
                object-fit: contain;
            }
            
            .center-content {
                flex-grow: 1;
                text-align: center;
                margin: 0 15px;
            }
            
            .header-text {
                font-size: 14px;
                line-height: 1.4;
                margin-top: 10px;
            }
            
            .title {
                font-weight: bold;
                font-size: 22px;
                letter-spacing: 6px;
                margin: 30px 0;
            }
            
            .content {
                font-size: 16px;
                line-height: 1.6;
                text-align: justify;
                margin: 30px 0;
            }
            
            .signature {
                margin-top: 60px;
                text-align: right;
                font-size: 16px;
            }
            
            .signatory {
                font-weight: bold;
                text-decoration: underline;
                margin-top: 40px;
            }
            
            .designation {
                margin-top: 5px;
            }
            
            .print-button {
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 10px 15px;
                background: #0066cc;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
                z-index: 100;
            }
            
            .print-button:hover {
                background: #0052a3;
            }
        </style>
    `);
    
    newWindow.document.write('</head><body>');
    
    // Add print button
    newWindow.document.write(`
        <button class="print-button" onclick="window.print()">Print Certificate</button>
    `);
    
    newWindow.document.write(`
        <div class="page-wrapper">
            <div class="certificate-container">
                <div class="header">
                    <div class="logo-and-text-container">
                        <img class="logo" src="/pis/public/img/coe-logo/doh.png" alt="DOH Logo">
                        <div class="center-content">
                            <div class="header-text">
                                Republic of the Philippines<br>
                                <strong>DEPARTMENT OF HEALTH</strong><br>
                                Central Visayas Center for Health Development
                            </div>
                        </div>
                        <img class="logo" src="/pis/public/img/coe-logo/bp.png" alt="BP Logo">
                    </div>
                </div>
                
                <div class="title">C E R T I F I C A T I O N</div>
                <div class="content">
                    <p>This is to certify that MR. JUAN B. DELA CRUZ is connected with the Department of Health Central Visayas Center for Health Development from February 12, 2025 up to present as Health Program Officer I (Job Order).</p>
                    
                    <p>This is to certify further Mr. Dela Cruz is receiving a monthly salary of Thirty Thousand Twenty-Four Pesos (Php 30,024.00).</p>
                    
                    <p>This Certification is being issued upon the request of Mr. Dela Cruz for whatever purpose this may serve.</p>
                    
                    <p>Given this 23rd day of April, 2025 in Cebu City, Philippines.</p>
                </div>
                
                <div class="signature">
                    <div class="signatory">RAMIL R. ABREA, CPA, MBA</div>
                    <div class="designation">Chief Administrative Officer</div>
                </div>
                
                <div class="footer">
                    Osmeña Boulevard, Sambag II, Cebu City, 6000 Philippines ● Trunk Line (032) 260-9740 local 101, 102, 201, 301, 401<br>
                    Website: http://www.ro7.doh.gov.ph ● Email Address: centralvisayas@ro7.doh.gov.ph ● Social Media: @DOH7govph<br>
                    Human Resource Management Office Landline No: (032) 260-9740 loc. 412 Human Resource Management Office E-mail Address:<br>
                    hrmo@ro7.doh.gov.ph
                </div>
            </div>
        </div>
    `);
    
    newWindow.document.write('</body></html>');
    
    // Close the document write stream
    newWindow.document.close();
}


$(document).ready(function() {
    $('.etd-input').on('change', function() {
        let userid = $(this).data('userid');
        let etd = $(this).val();
        let currentVal = $(this).attr('data-current');

        // Optional: prevent save if no real change
        if (etd === currentVal) {
            alert('No change detected.');
            return;
        }

        $.ajax({
            url: '{{ url("/pis/save-etd") }}',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                userid: userid,
                entrance_of_duty: etd // FIXED: must match Laravel field
            },
            success: function(response) {
                alert(response.message);

                // Optional: highlight saved input green
                let input = $('.etd-input[data-userid="' + userid + '"]');
                input.css('background-color', '#d4edda');
                setTimeout(() => {
                    input.css('background-color', '');
                }, 1000);

                // Update current value tracker
                input.attr('data-current', etd);
            },
            error: function(xhr) {
                alert('Failed to save ETD! Check console.');
                console.log(xhr.responseText);
            }
        });
    });
});




</script>