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
                <th>Entrance of Duty</th>
                {{-- <th>Employee Status</th> --}}
                @if($type == 'INACTIVE')
                    <th>Status</th>
                    <th>Action Date</th>
                @endif
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
                            style="border: none; outline: none; transition: background-color 0.3s;">
                     </td>
                     
                     @if($type == 'INACTIVE')
                        <td>
                             @if($user->action_status == 1)
                        <span class="label label-warning arrowed-in">Inactive</span>
                            @elseif($user->action_status == 2)
                                <span class="label label-primary arrowed-in">Resigned</span>
                            @elseif($user->action_status == 3)
                                <span class="label label-danger arrowed-in">Retired</span>
                            @else
                                <span class="label label-default arrowed-in">Unknown</span>
                            @endif
                        </td>
                        <td>
                             {{ \Carbon\Carbon::parse($user->action_date)->format('F d, Y') }}
                        </td>
                    @endif
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
                                <a href="#" 
                                    class="set-actions" 
                                    id="{{ $type.'actions'.$user->userid }}" 
                                    data-userid="{{ $user->userid }}" 
                                    title="SET ACTIONS">
                                    <i class="ace-icon fa fa-cogs bigger-150 text-warning"></i>
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
    // Open a blank popup immediately to avoid browser blocking
    var printWindow = window.open('', '_blank');
    
    if (!printWindow) {
        alert('Popup blocked. Please allow popups for this site.');
        return;
    }

    // Show a temporary loading message
    printWindow.document.write('<html><head><title>Loading...</title></head><body><div style="text-align:center;padding:50px;font-family:Arial;">Please Input Salary in Work Experience for Certificate of Employment...</div></body></html>');
    printWindow.document.close();

    // Helper to convert number to words
    function convertNumberToWords(amount) {
        const ones = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"];
        const teens = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
        const tens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];
        const scales = ["", "Thousand", "Million", "Billion"];

        function convertHundreds(num) {
            let result = '';
            if (num >= 100) {
                result += ones[Math.floor(num / 100)] + " Hundred ";
                num %= 100;
            }
            if (num >= 10 && num < 20) {
                result += teens[num - 10] + " ";
            } else {
                if (num >= 20) {
                    result += tens[Math.floor(num / 10)] + " ";
                    num %= 10;
                }
                if (num > 0) {
                    result += ones[num] + " ";
                }
            }
            return result.trim();
        }

        function convertWholeNumberToWords(num) {
            if (num === 0) return "Zero";
            let result = '';
            let scale = 0;

            while (num > 0) {
                const chunk = num % 1000;
                if (chunk > 0) {
                    result = convertHundreds(chunk) + (scales[scale] ? ' ' + scales[scale] : '') + ' ' + result;
                }
                num = Math.floor(num / 1000);
                scale++;
            }

            return result.trim();
        }

        const [pesoPart, centPart] = amount.toFixed(2).split('.');
        const pesoWords = convertWholeNumberToWords(parseInt(pesoPart));
        const centWords = convertWholeNumberToWords(parseInt(centPart));
        const pesoLabel = parseInt(pesoPart) === 1 ? 'Peso' : 'Pesos';
        const centLabel = parseInt(centPart) === 1 ? 'Centavo' : 'Centavos';

        if (parseInt(centPart) > 0) {
            return `${pesoWords} ${pesoLabel} and ${centWords} ${centLabel}`;
        } else {
            return `${pesoWords} ${pesoLabel}`;
        }
    }

    // Fetch user data
    $.ajax({
        url: '/pis/getUserData/' + userid,
        type: 'GET',
        success: function(userData) {
            // Format full name
            let fullName = 'NO NAME PROVIDED';
            if (userData.fname || userData.lname || userData.mname || userData.name_extension) {
                const nameParts = [];
                if (userData.fname) nameParts.push(userData.fname.toUpperCase());
                if (userData.mname) nameParts.push(userData.mname.charAt(0).toUpperCase() + '.');
                if (userData.lname) nameParts.push(userData.lname.toUpperCase());
                if (userData.name_extension) nameParts.push(userData.name_extension.toUpperCase());
                fullName = nameParts.join(' ');
            }

            // Format entrance date
            let entranceDate = 'N/A';
            if (userData.entrance_of_duty) {
                const date = new Date(userData.entrance_of_duty);
                const months = ['January', 'February', 'March', 'April', 'May', 'June', 
                                'July', 'August', 'September', 'October', 'November', 'December'];
                entranceDate = `${months[date.getMonth()]} ${date.getDate()}, ${date.getFullYear()}`;
            }

            let genderPrefixUpper = '';
            let genderPrefixProper = '';

            if (userData.sex) {
                if (userData.sex.toLowerCase() === 'male') {
                    genderPrefixUpper = 'MR.';
                    genderPrefixProper = 'Mr.';
                } else if (userData.sex.toLowerCase() === 'female') {
                    genderPrefixUpper = 'MS.';
                    genderPrefixProper = 'Ms.';
                }
            }

            function getOrdinalSuffixHTML(day) {
                if (day > 3 && day < 21) return `${day}<sup>th</sup>`;
                switch (day % 10) {
                    case 1: return `${day}<sup>st</sup>`;
                    case 2: return `${day}<sup>nd</sup>`;
                    case 3: return `${day}<sup>rd</sup>`;
                    default: return `${day}<sup>th</sup>`;
                }
            }

            const today = new Date();
            const day = today.getDate();
            const month = today.toLocaleString('en-US', { month: 'long' });
            const year = today.getFullYear();
            const formattedDate = `${getOrdinalSuffixHTML(day)} day of ${month}, ${year}`;

            const position = userData.position || 'N/A';
            const jobStatus = userData.job_status || 'N/A';
            const salaryAmount = userData.salary_amount && !isNaN(userData.salary_amount) ? Number(userData.salary_amount) : null;
            const salaryInWords = salaryAmount !== null ? convertNumberToWords(salaryAmount) : 'N/A';
            const salaryFormatted = salaryAmount !== null ? salaryAmount.toLocaleString('en-PH', { minimumFractionDigits: 2 }) : 'N/A';

            const html = `
            <html><head><title>Certification of Employment</title>
            <style>
            @page { size: A4 ; margin: 0; }
            @media print {
                body { width: 210mm; height: 297mm; margin: 0; padding: 0; }
                .certificate-container { box-shadow: none; border: none; padding: 20mm; }
                .print-button { display: none; }
            }
            body {
                font-family: 'Calibri', serif;
                margin: 0; padding: 0;
                background-color: #f0f0f0;
                display: flex; justify-content: center; align-items: center;
                min-height: 100vh;
            }
            .page-wrapper {
                width: 210mm; height: 297mm;
                margin: 20px auto;
                background: white; box-shadow: 0 0 10px rgba(0,0,0,0.2);
                position: relative;
            }
            .footer {
                position: absolute; bottom: 10mm;
                left: 15mm; right: 15mm;
                font-size: 8px; text-align: center;
                border-top: 1px solid #888;
                padding-top: 3mm; line-height: 1.3;
            }
            .certificate-container {
                width: 100%; height: 100%;
                box-sizing: border-box;
                padding: 10mm 20mm 10mm 20mm; /* reduce top padding */
                text-align: left; position: relative;
            }

            .header { text-align: center; margin-bottom: 20px; }
            .logo-and-text-container {
                display: flex; justify-content: space-between; align-items: flex-start;
                margin-bottom: 30px;
            }
            .logo {
                width: 100px; height: auto; object-fit: contain; 
            }
            .center-content {
                flex-grow: 1; text-align: center;
                margin: 0 15px;
            }
            .header-text {
                font-size: 14px;
                line-height: 1.4;
                margin-top: 30px;
                font-family: 'Times New Roman', Times, serif;
            }
            .title {
                font-weight: bold; font-size: 26px;
                letter-spacing: 3px; margin: 20px 0;
                margin-bottom: 50px;
            }
            .content {
                font-size: 12pt;
                line-height: 1.6;
                text-align: justify;
                margin: 30px 0;
                letter-spacing: -0.5px; /* reduce spacing between letters */
            }

            .signature {
                margin-top: 60px; text-align: right; font-size: 16px;
            }
            .signatory {
                font-weight: bold; 
                margin-top: 40px;
                margin-right: 90px;
            }
            .designation { margin-top: 5px; margin-right: 100px; font-size: 14px;  font-weight: bold; }
            .print-button {
                position: fixed; top: 20px; right: 20px;
                padding: 10px 15px;
                background: #0066cc; color: white;
                border: none; border-radius: 4px;
                cursor: pointer; font-size: 14px; z-index: 100;
            }
            .print-button:hover { background: #0052a3; }
        </style>
        </head><body>
        <button class="print-button" onclick="window.print()">Print Certificate</button>
        <div class="page-wrapper">
            <div class="certificate-container">
                <div class="header">
                    <div class="logo-and-text-container">
                        <img class="logo" src="/pis/public/img/coe-logo/doh.png" alt="DOH Logo">
                        <div class="center-content">
                            <div class="header-text">
                                Republic of the Philippines<br>
                                <strong>DEPARTMENT OF HEALTH</strong><br>
                                <em>Central Visayas Center for Health Development</em>
                            </div>
                        </div>
                        <img class="logo" src="/pis/public/img/coe-logo/bp.png" alt="BP Logo">
                    </div>
                </div>
                <div class="title" style="margin-left:170px; margin-top: 50px;">C E R T I F I C A T I O N</div>
                <div class="content" >
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <b>${genderPrefixUpper} ${fullName}</b> is connected with the Department of Health Central Visayas Center for Health Development from ${entranceDate} up to present as ${position} (${jobStatus}).</p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify further that ${genderPrefixProper} ${userData.lname.charAt(0).toUpperCase() + userData.lname.slice(1).toLowerCase()} is receiving a monthly salary of ${salaryInWords} (Php ${salaryFormatted}).</p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Certification is being issued upon the request of ${genderPrefixProper} ${userData.lname.charAt(0).toUpperCase() + userData.lname.slice(1).toLowerCase()} for whatever purpose this may serve.</p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Given this ${formattedDate} in Cebu City, Philippines.</p>
                </div>
                <div class="signature">
                    <div class="signatory">RAMIL R. ABREA, CPA, MBA</div>
                    <div class="designation">Chief Administrative Officer</div>
                </div>
                <div class="footer">
                    Osmeña Boulevard, Sambag II, Cebu City, 6000 Philippines ● Trunk Line (032) 260-9740 local 101, 102, 201, 301, 401<br>
                    Website: http://www.ro7.doh.gov.ph ● Email: centralvisayas@ro7.doh.gov.ph ● Social: @DOH7govph<br>
                    HRMO Landline: (032) 260-9740 loc. 412 ● HRMO Email: hrmo@ro7.doh.gov.ph
                </div>
            </div>
        </div>
        </body></html>`;

            // Write the certificate to the popup
            printWindow.document.open();
            printWindow.document.write(html);
            printWindow.document.close();
        },
        error: function(xhr, status, error) {
            printWindow.close();
            alert('Error fetching user data: ' + (xhr.responseJSON ? xhr.responseJSON.error : error));
            console.error('Error:', xhr.responseJSON || error);
        }
    });
}

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.etd-input').on('change', function() {
        var input = $(this);
        var userid = input.data('userid');
        var newDate = input.val();
        var originalDate = input.data('current');

        if (newDate === originalDate) {
            return; // No change
        }

        input.css('background-color', '#f8f9fa').prop('disabled', true);

        $.post('/pis/saveEtd', {
            userid: userid,
            entrance_of_duty: newDate
        }).done(function(response) {
            input.css('background-color', '#d4edda');
            input.data('current', newDate);
        }).fail(function(xhr) {
            input.css('background-color', '#f8d7da').val(originalDate);
            var msg = 'Failed to save Entrance of Duty.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                msg += ' ' + xhr.responseJSON.message;
            }
            alert(msg);
        }).always(function() {
            setTimeout(() => {
                input.prop('disabled', false).css('background-color', '');
            }, 1500);
        });
    });
});




</script>