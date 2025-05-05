<?php
    use PIS\Section;
    use PIS\Division;

?>
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
                               value="{{ $user->entrance_of_duty ? \Carbon\Carbon::parse($user->entrance_of_duty)->format('Y-m-d') : '' }}"
                               style="border: none; outline: none;">
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
                                <a href="#" title="PRINT COE" onclick="openPrintPage(); return false;">
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

    function openPrintPage() {
    // Open a blank page (simulate a PDF view for testing)
    var newWindow = window.open('', '_blank');
    
    newWindow.document.write('<html><head><title>Certificate of Employment (COE)</title>');
    
    // Add some styling to center the content
    newWindow.document.write(`
        <style>
            body {
                font-family: 'Times New Roman', serif;
                text-align: center;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #f4f4f4;
            }
            .certificate-container {
                border: 2px solid #000;
                padding: 30px;
                width: 80%;
                max-width: 800px;
                background-color: #fff;
            }
            h1 {
                font-size: 24px;
                font-weight: bold;
                text-decoration: underline;
            }
            .content {
                font-size: 18px;
                margin-top: 20px;
                line-height: 1.5;
            }
        </style>
    `);
    
    newWindow.document.write('</head><body>');
    
    // COE content
    newWindow.document.write(`
        <div class="certificate-container">
            <h1>Certificate of Employment - Test</h1>
            <div class="content">
                <p>This is to certify that</p>
                <p><strong>[Employee Name]</strong>, holder of ID number <strong>[ID Number]</strong>, has been employed with our company since <strong>[Start Date]</strong> and is currently serving as <strong>[Job Title]</strong>.</p>
                <p>Issued this <strong>[Date]</strong> at <strong>[Company Location]</strong>.</p>
                <p><strong>[Company Name]</strong><br>
                   <strong>[Company Address]</strong><br>
                   <strong>[Authorized Signatory]</strong><br>
                   [Designation]</p>
            </div>
        </div>
    `);
    
    newWindow.document.write('</body></html>');
}

$(document).ready(function() {
    $('.etd-input').on('change', function() {
        let userid = $(this).data('userid');
        let etd = $(this).val();

        $.ajax({
            url: '{{ route("pis.saveEtd") }}',  // Generate correct URL using Laravel route()
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                userid: userid,
                etd: etd
            },
            success: function(response) {
                alert(response.message);
            },
            error: function(xhr) {
                alert('Failed to save ETD!');
            }
        });
    });
});



</script>