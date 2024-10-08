@extends('layouts.pis_app')
@section('content')
    <style>
        .profile-info-name{
            font-size: 8pt;
        }
        th,input{
            font-size: 7pt;
        }
        input[type="text"] {
            font-size:11px;
        }
        .profile-info-name{
            width: 40%;
        }
        u{
            color: #307bff;
        }
        .margin-left-50{
            margin-left:50px;
        }
    </style>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <div class="page-header">
                    <div class="row">
                        <div class="col-md-3">
                            <h1>
                                User Profile Page
                            </h1>
                        </div>
                        <div class="col-md-8">
                            <!--
                                @if(Auth::user()->usertype)
                                <div class="col-md-4">
                                    <a href="{{ url('pisId').'/'.$user->piUserid.'/landscape'  }}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-image"></i> ID PICTURE | LANDSCAPE </a>
                                </div>
                                @endif
                            -->
                       
                            <!-- <div class="col-md-2" >
                                <a href="{{ url('pisId').'/'.$user->piUserid.'/landscape'  }}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-image"></i> ARTA ID V1</a>
                            </div> -->
                            <div class="col-md-2">
                                <a href="{{ url('pisIdArta').'/'.$user->piUserid.'/landscape'  }}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-image"></i> ARTA ID V2</a>
                            </div>
                            &nbsp;
                            @if($user->job_status == "Job Order" || $user->job_status == "CBII" || $user->job_status == "Contractual")
                            <div class="col-md-2" style="margin-right:190px" >
                                <a href="{{ url('pisIdArta2024JOC').'/'.$user->piUserid.'/landscape'  }}" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-image"></i> JOB ORDER / CONTRACTUAL ARTA ID 2024</a>
                            </div>
                            @else
                            <div class="col-md-2" style="margin-right:75px" >
                                <a href="{{ url('pisIdArta2024').'/'.$user->piUserid.'/landscape'  }}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-image"></i> REGULAR ARTA ID 2024</a>
                            </div>
                            @endif
                            

                   
                            <div class="col-md-2">
                                <form action="{{ url('print').'/print_pdf.php' }}" method="POST" target="_blank">
                                    <input type="hidden" name="userid" value="{{ $user->piUserid }}">
                                    <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-image"></i> GENERATE PDS </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.page-header -->

                

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#personal_information">
                                    <i class="green ace-icon fa fa-user bigger-120"></i>
                                    Personal Information
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#family_background">
                                    <i class="orange ace-icon fa fa-picture-o bigger-120"></i>
                                    Family Background
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#educational_background">
                                    <i class="blue ace-icon fa fa-book bigger-120"></i>
                                    Educational Background
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#service_eligibility">
                                    <i class="pink ace-icon fa fa-certificate bigger-120"></i>
                                    Civil Service Eligibility
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#work_experience">
                                    <i class="red ace-icon fa fa-briefcase bigger-120"></i>
                                    Work Experience
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#voluntary_work">
                                    <i class="purple ace-icon fa fa-life-bouy bigger-120"></i>
                                    Voluntary Work
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#training_program">
                                    <i class="green ace-icon fa fa-wrench bigger-120"></i>
                                    Training Program
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#other_information">
                                    <i class="brown ace-icon fa fa-user-secret bigger-120"></i>
                                    Other Information
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#survey">
                                    <i class="grey ace-icon fa fa-info bigger-120"></i>
                                    Survey
                                </a>
                            </li>
                        </ul>
                        <div class="hr dotted"></div>

                        <div>
                            <div id="user-profile-1" class="user-profile row">
                                <div class="col-xs-12 col-sm-3 center">
                                    <div>
                                        <span class="profile-picture">
                                            <a href="#">
                                            <?php
                                                $profilePic = "";
                                                if(isset($user->picture)){
                                                    $profilePic = asset('public/upload_picture/picture').'/'.$user->picture;
                                                } else {
                                                    if($user->sex == 'Female')
                                                        $profilePic = asset('public/assets_ace/images/avatars/female1.png');
                                                    else
                                                        $profilePic = asset('public/assets_ace/images/avatars/male1.png');
                                                }
                                            ?>
                                            <img id="avatar_picture" class="img-responsive" alt="Alex's Avatar" src="{{ $profilePic }}" />
                                            </a>
                                        </span>
                                        <span class="profile-picture">
                                            <?php
                                                if($user->signature){
                                                   $signature = asset('public/upload_picture/signature').'/'.$user->signature;
                                                } else {
                                                    $signature = asset('public/img/no_signature.png');
                                                }
                                            ?>
                                            <a href="#">
                                                <img id="avatar_signature" class="img-responsive" alt="Alex's Avatar" src="{{ $signature }}" style="height:50px;width: 100%;background-color: rgb(206, 232, 1)"/>
                                            </a>
                                        </span>
                                        <div class="space-6"></div>

                                        <?php $signature_path = str_replace('pis','',url('/')).'/generate_signature/signature.php'.'?path='.$signature; ?>
                                        <a href="{{ $signature_path }}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-image"></i> DOWNLOAD SIGNATURE</a>

                                        <div class="space-6"></div>
                                        <div class="rating inline"></div>
                                        <div class="space-4"></div>
                                        <div class="width-90 label label-info label-xlg arrowed-in arrowed-in-right">
                                            <div class="inline position-relative">
                                                <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                                    <i class="ace-icon fa fa-circle light-green"></i>
                                                    &nbsp;
                                                    <span class="white">{{ $user->fname.' '.$user->lname }}</span>
                                                </a>

                                                <ul class="align-left @if(Auth::user()->usertype) dropdown-menu @endif dropdown-caret dropdown-lighter">
                                                    @if(Auth::user()->usertype)
                                                        <li class="dropdown-header"> Change Status </li>
                                                        @foreach($employeeStatus as $status)
                                                            <li>
                                                                <a href="#" data-id="{{ $status['id'] }}" class="change-status" data-color="{{ $status['status'] }}" data-description="{{ $status['description'] }}">
                                                                    <i class="ace-icon fa fa-circle {{ $status['status'] }}"></i>
                                                                    &nbsp;
                                                                    <span class="{{ $status['status'] }}">{{ $status['description'] }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-6"></div>
                                    <div class="profile-contact-info">
                                        <div class="profile-contact-links align-left">
                                            <a class="btn btn-link">
                                                <i id="color-i" class="ace-icon fa fa-sun-o bigger-120 {{ $user->employee_status }}"></i>
                                                <label id="color-label" class="{{ $user->employee_status }}">
                                                    <span class="effective-status">{{ $user->employee_status_description }}</span> - <span class="effective-date">{{ date("m-d-Y",strtotime($user->resigned_effectivity)) }}</span>
                                                </label>
                                            </a>
                                            <a href="http://ro7.doh.gov.ph/" target="_blank" class="btn btn-link">
                                                <i class="ace-icon fa fa-globe bigger-125 blue"></i>
                                                www.ro7.doh.gov.ph
                                            </a>
                                        </div>
                                    </div>

                                    <div class="space-4"></div>
                                </div>

                                <div class="col-xs-12 col-sm-9">
                                    <div id="user-profile-2" class="user-profile">
                                        <div class="tabbable">
                                            <div class="tab-content no-border">

                                                @include('pis.personal_information')
                                                @include('pis.family_background')
                                                @include('pis.educational_background')
                                                @include('pis.civil_service')
                                                @include('pis.work_experience')
                                                @include('pis.voluntary_work')
                                                @include('pis.training_program')
                                                @include('pis.other_information')
                                                @include('pis.survey')

                                            </div><!-- /tab-content -->
                                        </div><!-- /tabbable -->
                                    </div><!-- /user-profile -->
                                </div><!-- /COL-->
                            </div><!-- /user-profile row-->
                        </div><!-- /DIV -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
    @include('modal')
@endsection
@section('js')
    <script>
        var removeColor = 'green';
        $(".change-status").each(function(index){
            var href = $(this).attr('href');
            $("a[href='"+href+"']").on("click",function(e){
                var soeId = $(this).data('id');
                if(!soeId)
                    return;

                var userid = "<?php echo $user->piUserid; ?>";
                var appendElement = $("#ose");
                appendElement.html($(this).data('description'));
                appendElement.removeClass(removeColor);
                appendElement.addClass($(this).data('color'));

                appendElement.siblings().removeClass(removeColor);
                appendElement.siblings().addClass($(this).data('color'));
                removeColor = $(this).data('color');

                if(soeId != 1) {
                    e.preventDefault();
                    $('#resigned_effectivity').modal({backdrop: 'static', keyboard: false});
                    $('.userid').val(userid);
                    $('.soeId').val(soeId);
                    const inputDate = $(".effective-date").text();
                    const parts = inputDate.split('-');
                    const formattedDate = `${parts[2]}-${parts[1]}-${parts[0]}`;
                    $(document).ready(function(){
                        $(".date_effectivity").val(formattedDate);
                    });
                } else {
                    employeeStatusAjax(userid, soeId);
                } 
                return;
            });
        });

        function employeeStatusAjax(userid,soeId,date_effectivity){
            url = "<?php echo asset('updateEmployeeStatus'); ?>";
            json = {
                "userid" : userid,
                "employee_status" : soeId,
                "date_effectivity" : date_effectivity,
                "_token" : "<?php echo csrf_token(); ?>"
            };
            $.post(url,json,function(result) {
                $("#color-i").removeClass();
                $("#color-i").addClass(result['color_i']);
                $("#color-label").removeClass();
                $("#color-label").addClass(result['effective_color']);
                $(".effective-status").html(result['effective_status']);
                $(".effective-date").html(result['effective_date']);
                Lobibox.notify('success', {
                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    msg: 'Successfully updated the employee status'
                });
            });

            event.preventDefault();
        }

        function resignedEffectivity() {
            var date_effectivity = $(".date_effectivity").val();
            var userid = $('.userid').val();
            var soeId = $(".soeId").val();

            employeeStatusAjax(userid,soeId,date_effectivity);
            $('#resigned_effectivity').modal('toggle');
        }

        jQuery(function($) {
            var childrenCount = "<?php echo Session::get('childrenCount'); ?>";
            var childrenLimit = "<?php echo Session::get('childrenCount'); ?>";
            var childId = "<?php echo DB::select("show table status like 'children'")[0]->Auto_increment; ?>";
            var chilBool = true;
            $("#childrenAdd").on('click',function(event){
                if(chilBool)
                {
                    childrenCount++;
                    childrenLimit++;
                    chilBool = false;

                    var childrenName = 'childrenName'+childrenCount+'c_id'+childId+'colcname';
                    var childrenDOB = 'childrenDOB'+childrenCount+'c_id'+childId+'colcdate_of_birth';
                    var childrenDelete = childrenCount+'c_id'+childId+'colchildrenDelete';
                    var chilAnimation = childrenName + childrenDOB;
                    event.preventDefault();
                    var childrenAppend =
                        '<div class="profile-info-row" id="'+chilAnimation+'">\
                                <div class="profile-info-name editable children" id="'+childrenName+'"></div>\
                                <div class="profile-info-value pull-left">\
                                    <span class="editable_radio" id="'+childrenDOB+'"></span>\
                                </div>\
                                <div class="pull-right" style="margin-right:5%;">\
                                    <span class="editable_radio work_experience" id="'+childrenDelete+'"><i class="fa fa-close"></i></span>\
                                </div>\
                            </div>';
                    $("#children_append").append(childrenAppend);
                    $("#"+chilAnimation).hide().fadeIn();

                    editable_text();
                    editable_radio();


                } else {
                    event.preventDefault();
                    alert('Click column to input children..');
                }

            });


            //CIVIL ELIGIBILITY ADD
            var civilCount = "<?php echo Session::get('civilCount'); ?>";
            var civilLimit = "<?php echo Session::get('civilCount'); ?>";
            $("#civilAdd").on('click',function(event){
                if(civilLimit <= 10)
                {
                    civilCount++;
                    civilLimit++;
                    var civilUnique_row = civilCount+"<?php echo 'civil'.str_random(10).date('Y-').$user->id.date('mdHis'); ?>";
                    event.preventDefault();

                    var civilAppend =
                        '<tr id="'+civilUnique_row+'">\
                                <td class="center"><span class="editable civil_eligibility" id="'+'no_id'+"<?php echo str_random(10); ?>"+civilCount+'colcareer_service"></span></td>\
                                <td class="center"><span class="editable civil_eligibility" id="'+'no_id'+"<?php echo str_random(10); ?>"+civilCount+'colrating"></span></td>\
                                <td class="center"><span class="editable_radio civil_eligibility" id="'+'no_id'+"<?php echo str_random(10); ?>"+civilCount+'coldate_of_examination"></span></td>\
                                <td><span class="editable civil_eligibility" id="'+'no_id'+"<?php echo str_random(10); ?>"+civilCount+'colplace_examination"></span></td>\
                                <td class="center"><span class="editable civil_eligibility" id="'+'no_id'+"<?php echo str_random(10); ?>"+civilCount+'collicense_number"></span></td>\
                                <td class="center"><span class="editable civil_eligibility" id="'+'no_id'+"<?php echo str_random(10); ?>"+civilCount+'coldate_of_validity"></span></td>\
                                <td class="center"><span class="editable_radio civil_eligibility" id="'+'no_id'+"<?php echo str_random(10); ?>"+civilCount+'colcivilDelete"><i class="fa fa-close"></i></span></td>\
                            </tr>';
                    $("#civil_append").append(civilAppend);
                    $("#"+civilUnique_row).hide().fadeIn();

                    editable_text();
                    editable_radio();

                } else {
                    event.preventDefault();
                    alert('Click column to input children..');
                }
            });

            //WORK EXPERIENCE ADD
            var workCount = "<?php echo Session::get('workCount'); ?>";
            $("#workAdd").on('click',function(event){

                workCount++;
                var workUnique_row = workCount+"<?php echo 'work'.str_random(10).date('Y-').$user->id.date('mdHis'); ?>";
                event.preventDefault();

                var workAppend =
                    '<tr id="'+workUnique_row+'">\
                        <td class="center"><span class="editable_radio work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'coldate_from"></span></td>\
                        <td class="center td_workDateto"><span class="editable_radio work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'coldate_to"></span></td>\
                        <td class="center"><span class="editable work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colposition_title"></span></td>\
                        <td class="center"><span class="editable work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colcompany"></span></td>'+
                        '<td class="center monthly_salary"><span class="blue <?php if(Auth::user()->usertype)echo 'editable'; ?> work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colmonthly_salary_private"></span></td>'
                        +'<td class="center"><span class="red '+"<?php
                        if(Auth::user()->usertype)
                            echo 'editable_radio';
                        else
                            echo '';
                        ?>"+
                    ' work_experience workAdd" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colsalary_grade"><?php
                        if(!Auth::user()->usertype)
                            echo 'Please go to hr to update your salary grade';
                        ?>
                        </span></td>\
                        <td class="center"><span class="editable_select work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colstatus_of_appointment"></span></td>\
                        <td class="center"><span class="editable_radio work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colgovernment_service"></span></td>\
                        <td class="center"><span class="editable_radio work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colworkDelete"><i class="fa fa-close"></i></span></td>\
                    </tr>';
                $("#work_append").append(workAppend);
                $("#"+workUnique_row).hide().fadeIn();

                editable_text();
                editable_radio();
                editable_select();

            });

            //VOLUNTARY WORK ADD
            //note.. carefull sa id unique.. true in where clause. (must have no-id)
            var voluntaryCount = "<?php echo Session::get('voluntaryCount'); ?>";
            var voluntaryLimit = "<?php echo Session::get('voluntaryCount'); ?>";
            $("#voluntaryAdd").on('click',function(event){
                if(voluntaryLimit <= 10)
                {
                    voluntaryCount++;
                    voluntaryLimit++;
                    var voluntaryUnique_row = voluntaryCount+"<?php echo 'voluntary'.str_random(10).date('Y-').$user->id.date('mdHis'); ?>";
                    event.preventDefault();

                    var voluntaryAppend =
                        '<tr id="'+voluntaryUnique_row+'">\
                                <td class="center align-middle"><span class="editable voluntary_work" id="'+"voluntaryno_id<?php echo str_random(10); ?>"+voluntaryCount+'colname_of_organization"></span></td>\
                                <td class="center align-middle"><span class="editable_radio voluntary_work" id="'+"voluntaryno_id<?php echo str_random(10); ?>"+voluntaryCount+'colvdate_from"></span></td>\
                                <td class="center align-middle"><span class="editable_radio voluntary_work" id="'+"voluntaryno_id<?php echo str_random(10); ?>"+voluntaryCount+'colvdate_to"></span></td>\
                                <td class="center align-middle"><span class="editable voluntary_work" id="'+"voluntaryno_id<?php echo str_random(10); ?>"+voluntaryCount+'colnumber_of_hours"></span></td>\
                                <td class="center align-middle"><span class="editable voluntary_work" id="'+"voluntaryno_id<?php echo str_random(10); ?>"+voluntaryCount+'colnature_of_work"></span></td>\
                                <td class="center"><span class="editable_radio work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+voluntaryCount+'colvoluntaryDelete"><i class="fa fa-close"></i></span></td>\
                            </tr>';
                    $("#voluntary_append").append(voluntaryAppend);
                    $("#"+voluntaryUnique_row).hide().fadeIn();

                    editable_text();
                    editable_radio();

                } else {
                    event.preventDefault();
                    alert('Click column to input children..');
                }
            });

            //TRAINING PROGRAM ADD
            //note.. carefull sa id unique.. true in where clause (must have no-id)
            var trainingCount = "<?php echo Session::get('trainingCount'); ?>";
            $("#trainingAdd").on('click',function(event){
                trainingCount++;
                var trainingUnique_row = trainingCount+"<?php echo 'training'.str_random(10).date('Y-').$user->id.date('mdHis'); ?>";
                event.preventDefault();

                var certificate_id = "trainingno_id<?php echo str_random(10); ?>"+trainingCount+'colcertificate';
                var trainingAppend =
                    '<tr id="'+trainingUnique_row+'">\
                            <td class="center align-middle"><span class="editable training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'coltitle_of_learning"></span></td>\
                            <td class="center align-middle"><span class="editable_radio training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'coltdate_from"></span></td>\
                            <td class="center align-middle"><span class="editable_radio training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'coltdate_to"></span></td>\
                            <td class="center align-middle"><span class="editable training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'colnumber_of_hours"></span></td>\
                            <td class="center align-middle"><span class="editable training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'coltype_of_id"></span></td>\
                            <td class="center align-middle"><span class="editable training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'colsponsored_by"></span></td>\
                            <td class="center align-middle trainingCertificate">\
                                <span class="editable_certificate training_program" data-link="" id="'+certificate_id+'" >\
                                    <a href="#" class="user-title-label dropdown-toggle editable-empty" data-toggle="dropdown">\
                                        Empty\
                                    </a>\
                                </span>\
                            </td>\
                            <td class="center align-middle trainingDelete"><span class="editable_radio training_program" id="'+'no_id'+"<?php echo str_random(10); ?>"+trainingCount+'coltrainingDelete"><i class="fa fa-close"></i></span></td>\
                        </tr>';
                $("#training_append").append(trainingAppend);
                $("#"+trainingUnique_row).hide().fadeIn();

                editable_text();
                editable_radio();

                dropzoneAdd(certificate_id);

                console.log(certificate_id);
            });

            //EDUCATIONAL BACKGROUND ADD
            var educationCount = "<?php echo Session::get('educationalBackgroundRow'); ?>";
            $("#educationAdd").on('click',function(event){

                educationCount++;
                var educationUnique_row = educationCount+"<?php echo 'education'.str_random(10).date('Y-').$user->id.date('mdHis'); ?>";
                event.preventDefault();

                var educationAppend =
                    '<tr id="'+educationUnique_row+'">\
                        <td class="center"><span class="editable_select educational_background" id="'+'no_id'+"<?php echo str_random(10); ?>"+educationCount+'collevel"></span></td>\
                        <td class="center"><span class="editable educational_background" id="'+'no_id'+"<?php echo str_random(10); ?>"+educationCount+'colname_of_school"></span></td>\
                        <td class="center"><span class="editable educational_background" id="'+'no_id'+"<?php echo str_random(10); ?>"+educationCount+'coldegree_course"></span></td>\
                        <td class="center"><span class="editable educational_background" id="'+'no_id'+"<?php echo str_random(10); ?>"+educationCount+'colpoa_from"></span></td>\
                        <td class="center"><span class="editable educational_background" id="'+'no_id'+"<?php echo str_random(10); ?>"+educationCount+'colpoa_to"></td>\
                        <td class="center"><span class="editable educational_background" id="'+'no_id'+"<?php echo str_random(10); ?>"+educationCount+'colunits_earned"></span></td>\
                        <td class="center"><span class="editable educational_background" id="'+'no_id'+"<?php echo str_random(10); ?>"+educationCount+'colyear_graduated"></span></td>\
                        <td class="center"><span class="editable educational_background" id="'+'no_id'+"<?php echo str_random(10); ?>"+educationCount+'colscholarship"></span></td>\
                        <td class="center"><span class="editable_radio educational_background" id="'+'no_id'+"<?php echo str_random(10); ?>"+educationCount+'coleducationDelete"><i class="fa fa-close"></i></span></td>\
                    </tr>';
                $("#education_append").append(educationAppend);
                $("#"+educationUnique_row).hide().fadeIn();

                editable_text();
                editable_radio();
                editable_select();
            });

            //OTHER INFORMATION ADD
            //note.. carefull sa id unique.. true in where clause (must have no-id)
            var otherCount = "<?php echo Session::get('otherCount'); ?>";
            $("#otherAdd").on('click',function(event){

                otherCount++;
                var otherUnique_row = otherCount+"<?php echo 'other'.str_random(10).date('Y-').$user->id.date('mdHis'); ?>";
                event.preventDefault();

                var otherAppend =
                    '<tr id="'+otherUnique_row+'">\
                                <td class="center align-middle"><span class="editable other_information" id="'+"otherno_id<?php echo str_random(10); ?>"+otherCount+'colspecial_skills"></span></td>\
                                <td class="center align-middle"><span class="editable other_information" id="'+"otherno_id<?php echo str_random(10); ?>"+otherCount+'colrecognition"></span></td>\
                                <td class="center align-middle"><span class="editable other_information" id="'+"otherno_id<?php echo str_random(10); ?>"+otherCount+'colorganization"></span></td>\
                                <td class="center align-middle"><span class="editable_radio other_information" id="'+'otherno_id'+"<?php echo str_random(10); ?>"+otherCount+'colotherDelete"><i class="fa fa-close"></i></span></td>\
                            </tr>';
                $("#other_append").append(otherAppend);
                $("#"+otherUnique_row).hide().fadeIn();

                editable_text();
                editable_radio();
            });

            window.certificateLink = '';
            function dropzoneAdd(certificate_id){

                $('#'+certificate_id).on('click', function(e){

                    spancertificateId = certificate_id;
                    trainingId = certificate_id.split('training')[1].split('col')[0];
                    certificateUnique = $("#"+certificate_id).parents(':eq(1)').attr('id');

                    try {
                        trainingDeleteid = $("#"+certificate_id).parents(':eq(0)').siblings('.trainingDelete').children().get(0).id;
                    } catch(e) {}

                    certificateLink = $("#"+certificate_id).data('link');
                    dropzoneCount++;
                    var certificateContent = "<div class=\"row\" style='height:100px;'>\n" +
                        "                                                                <div class=\"col-xs-12\">\n" +
                        "                                                                    <div >\n" +
                        "                                                                        <form action=\"./dummy.html\" class=\"dropzone well\" id=\"dropzone"+dropzoneCount+"\">\n" +
                        "                                                                            <div class=\"fallback\">\n" +
                        "                                                                                <input name=\"file\" type=\"file\" multiple=\"\" />\n" +
                        "                                                                            </div>\n" +
                        "                                                                        </form>\n" +
                        "                                                                    </div>\n" +
                        "\n" +
                        "                                                                    <div id=\"preview-template\" class=\"hide\">\n" +
                        "                                                                        <div class=\"dz-preview dz-file-preview\">\n" +
                        "                                                                            <div class=\"dz-image\">\n" +
                        "                                                                                <img data-dz-thumbnail=\"\" />\n" +
                        "                                                                            </div>\n" +
                        "\n" +
                        "                                                                            <div class=\"dz-details\">\n" +
                        "                                                                                <div class=\"dz-size\">\n" +
                        "                                                                                    <span data-dz-size=\"\"></span>\n" +
                        "                                                                                </div>\n" +
                        "\n" +
                        "                                                                                <div class=\"dz-filename\">\n" +
                        "                                                                                    <span data-dz-name=\"\"></span>\n" +
                        "                                                                                </div>\n" +
                        "                                                                            </div>\n" +
                        "\n" +
                        "                                                                            <div class=\"dz-progress\">\n" +
                        "                                                                                <span class=\"dz-upload\" data-dz-uploadprogress=\"\"></span>\n" +
                        "                                                                            </div>\n" +
                        "\n" +
                        "                                                                            <div class=\"dz-error-message\">\n" +
                        "                                                                                <span data-dz-errormessage=\"\"></span>\n" +
                        "                                                                            </div>\n" +
                        "\n" +
                        "                                                                            <div class=\"dz-success-mark\">\n" +
                        "                                                                                <span class=\"fa-stack fa-lg bigger-150\">\n" +
                        "                                                                                    <i class=\"fa fa-circle fa-stack-2x white\"></i>\n" +
                        "\n" +
                        "                                                                                    <i class=\"fa fa-check fa-stack-1x fa-inverse green\"></i>\n" +
                        "                                                                                </span>\n" +
                        "                                                                            </div>\n" +
                        "\n" +
                        "                                                                            <div class=\"dz-error-mark\">\n" +
                        "                                                                                <span class=\"fa-stack fa-lg bigger-150\">\n" +
                        "                                                                                    <i class=\"fa fa-circle fa-stack-2x white\"></i>\n" +
                        "\n" +
                        "                                                                                    <i class=\"fa fa-remove fa-stack-1x fa-inverse red\"></i>\n" +
                        "                                                                                </span>\n" +
                        "                                                                            </div>\n" +
                        "                                                                        </div>\n" +
                        "                                                                    </div><!-- PAGE CONTENT ENDS -->\n" +
                        "                                                                </div><!-- /.col -->\n" +
                        "                                     </div><div class='alert alert-warning certificate-link'>Link</div><!-- /.row -->";


                    var modal =
                        '<div class="modal fade">\
                          <div class="modal-dialog modal-sm">\
                           <div class="modal-content">\
                            <div class="modal-header">\
                                <button type="button" class="close" data-dismiss="modal">&times;</button>\
                                <h4 class="blue">Upload Certificate</h4>\
                            </div>\
                            \
                             <div class="modal-body">\
                                <div class="space-4"></div>'+
                        certificateContent
                        +'</div>\
                            \
                             <div class="modal-footer center">\
                                <button type="submit" class="btn btn-sm btn-success dropzoneSubmit"><i class="ace-icon fa fa-check"></i> Submit</button>\
                                <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
                             </div>\
                          </div>\
                         </div>\
                        </div>';


                    var modal = $(modal);


                    modal.modal("show").on('shown.bs.modal', function (e) {
                        $(".certificate-link").html("<li><a download='"+certificateLink.split('johndoe')[0]+"'"+" href="+"'<?php echo asset('public/upload_picture/certificate')?>"+"/"+certificateLink+"'"+" >"+certificateLink.split('johndoe')[0]+'</a></li>');
                        certificateLink = '';
                        try {
                            Dropzone.autoDiscover = false;

                            file = '';
                            var myDropzone = new Dropzone('#dropzone'+dropzoneCount, {
                                previewTemplate: $('#preview-template').html(),
                                thumbnailHeight: 120,
                                thumbnailWidth: 120,
                                maxFilesize: 999999999999999999,
                                maxFiles: 1,
                                maxfilesexceeded: function(result) {
                                    this.removeAllFiles();
                                    this.addFile(result);
                                },

                                addRemoveLinks : true,
                                dictRemoveFile: 'Remove',

                                dictDefaultMessage :
                                    '<span class="bigger-150 bolder"><i class="ace-icon fa fa-caret-right red"></i> Drop files</span> to upload \
                                    <span class="smaller-80 grey">(or click)</span> <br /> \
                                    <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i>'
                                ,

                                thumbnail: function(file, dataUrl) {
                                    if (file.previewElement) {
                                        $(file.previewElement).removeClass("dz-file-preview");
                                        var images = $(file.previewElement).find("[data-dz-thumbnail]").each(function() {
                                            var thumbnailElement = this;
                                            thumbnailElement.alt = file.name;
                                            thumbnailElement.src = dataUrl;
                                        });
                                        setTimeout(function() { $(file.previewElement).addClass("dz-image-preview"); }, 1);
                                    }
                                }

                            });


                            //simulating upload progress
                            var minSteps = 6,
                                maxSteps = 60,
                                timeBetweenSteps = 100,
                                bytesPerStep = 100000;

                            myDropzone.uploadFiles = function(files) {
                                var self = this;

                                for (var i = 0; i < files.length; i++) {
                                    file = files[i];
                                    totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                                    for (var step = 0; step < totalSteps; step++) {
                                        var duration = timeBetweenSteps * (step + 1);
                                        setTimeout(function(file, totalSteps, step) {
                                            return function() {
                                                file.upload = {
                                                    progress: 100 * (step + 1) / totalSteps,
                                                    total: file.size,
                                                    bytesSent: (step + 1) * file.size / totalSteps
                                                };

                                                self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
                                                if (file.upload.progress == 100) {
                                                    file.status = Dropzone.SUCCESS;
                                                    self.emit("success", file, 'success', null);
                                                    self.emit("complete", file);
                                                    self.processQueue();
                                                    uploadcertificateFlag = true;
                                                }
                                            };
                                        }(file, totalSteps, step), duration);

                                    }

                                }
                            };

                            //remove dropzone instance when leaving this page in ajax mode
                            $(document).one('ajaxloadstart.page', function(e) {
                                try {
                                    myDropzone.destroy();
                                } catch(e) {}
                            });


                        } catch(e) {
                            modal.modal( 'hide' ).data( 'bs.modal', null );
                        }

                    });


                    $(document).on('click', '.dropzoneSubmit', function() {
                        if(uploadcertificateFlag){
                            if(file)
                                $('#'+spancertificateId).html('<span class="label label-info label-sm arrowed-in arrowed-in-right">\n' +
                                    '                                 <span class="inline position-relative">\n' +
                                    '                                     <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">\n' +
                                    '                                       <i class="ace-icon fa fa-certificate light-green"></i>\n' +
                                    '                                         &nbsp;\n' +
                                    '                                       <span class="white" style="font-size:5.5pt;">View Certificate</span>\n' +
                                    '                                      </a>\n' +
                                    '                                  </span>\n' +
                                    '                         </span>');
                            else
                                console.log('false');

                            console.log(file);
                            $('.modal').modal('hide');
                            uploadcertificateFlag = false;

                            var url = "<?php echo asset('/uploadCertificate'); ?>";
                            var form_data = new FormData();
                            form_data.append('certificate', file);
                            form_data.append('trainingId',trainingId);
                            form_data.append('userid',"<?php echo $user->piUserid ?>");
                            form_data.append('unique_row',certificateUnique);
                            $.ajaxSetup(
                                {
                                    headers:
                                        {
                                            'X-CSRF-Token': "<?php echo csrf_token(); ?>"
                                        }
                                });
                            $.ajax({
                                url:url,
                                data: form_data,
                                type: 'POST',
                                contentType: false, // The content type used when sending data to the server.
                                cache: false, // To unable request pages to be cached
                                processData: false,
                                success: function(result) {
                                    console.log("checkhere");
                                    console.log(result);
                                    $('#'+spancertificateId).data('link', result);
                                    console.log(trainingDeleteid);
                                }
                            });
                        }
                    });


                });
            }

            $('.rating').raty({
                'half': true,
                'starType' : 'i',
                'score' : 4
            });

            //editables on first profile page
            // inline or popup
            $.fn.editable.defaults.mode = 'popup';
            $.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
            $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';


            //another option is using modals
            $('#avatar_picture').on('click', function(){
                var last_gritter;
                var modal =
                    '<div class="modal fade">\
                      <div class="modal-dialog">\
                       <div class="modal-content">\
                        <div class="modal-header">\
                            <button type="button" class="close" data-dismiss="modal">&times;</button>\
                            <h4 class="blue">Change Picture</h4>\
                        </div>\
                        \
                        <form class="no-margin" id="uploadPicture" enctype="multipart/form-data">\
                         <div class="modal-body">\
                            <div class="space-4"></div>\
                            <div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
                         </div>\
                        \
                         <div class="modal-footer center">\
                            <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
                            <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
                         </div>\
                        </form>\
                      </div>\
                     </div>\
                    </div>';


                var modal = $(modal);
                modal.modal("show").on("hidden", function(){
                    modal.remove();
                });

                var working = false;

                var form = modal.find('form:eq(0)');
                var file = form.find('input[type=file]').eq(0);
                file.ace_file_input({
                    style:'well',
                    btn_choose:'Click to choose new picture',
                    btn_change:null,
                    no_icon:'ace-icon fa fa-picture-o',
                    thumbnail:'small',
                    before_remove: function() {
                        //don't remove/reset files while being uploaded
                        return !working;
                    },
                    allowExt: ['jpg', 'jpeg', 'png', 'gif'],
                    allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
                });

                form.on('submit', function(){
                    if(!file.data('ace_input_files')) {
                        last_gritter = $.gritter.add({
                            title: 'no image!',
                            text: 'Please choose a jpg|gif|png image!',
                            class_name: 'gritter-error gritter-center'
                        });
                        console.log($("input[name='file-input']").prop('files')[0]);
                        return false;
                    }

                    file.ace_file_input('disable');
                    form.find('button').attr('disabled', 'disabled');
                    form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");

                    var deferred = new $.Deferred;
                    working = true;
                    deferred.done(function() {
                        form.find('button').removeAttr('disabled');
                        form.find('input[type=file]').ace_file_input('enable');
                        form.find('.modal-body > :last-child').remove();

                        modal.modal("hide");

                        var thumb = file.next().find('img').data('thumb');
                        //if(thumb) $('#avatar2').get(0).src = thumb;

                        //process upload
                        var url = "<?php echo asset('/uploadPicture'); ?>";
                        var file_data = form.find('input[type=file]').eq(0).prop('files')[0];

                        var form_data = new FormData();
                        form_data.append('picture', file_data);
                        form_data.append('userid',"<?php echo $user->piUserid ?>");
                        $.ajaxSetup(
                            {
                                headers:
                                    {
                                        'X-CSRF-Token': "<?php echo csrf_token(); ?>"
                                    }
                            });
                        $.ajax({
                            url:url,
                            data: form_data,
                            type: 'POST',
                            contentType: false, // The content type used when sending data to the server.
                            cache: false, // To unable request pages to be cached
                            processData: false,
                            success: function(result) {
                                result = result.replace(/<\/?[^>]+(>|$)/g, "")
                                console.log(result);
                                last_gritter = $.gritter.add({
                                    title: 'Picture Updated!',
                                    text: 'Uploading to server.. successfully save..',
                                    class_name: 'gritter-info gritter-center',
                                });
                                $('#avatar_picture').get(0).src = "<?php echo asset('public/upload_picture/picture')?>"+result.split("upload_picture/picture")[1];
                            }
                        });
                        working = false;
                    });


                    setTimeout(function(){
                        deferred.resolve();
                    } , parseInt(Math.random() * 800 + 800));

                    return false;
                });

            });

            $('#avatar_signature').on('click', function(){
                var last_gritter;
                var modal =
                    '<div class="modal fade">\
                      <div class="modal-dialog">\
                       <div class="modal-content">\
                        <div class="modal-header">\
                            <button type="button" class="close" data-dismiss="modal">&times;</button>\
                            <h4 class="blue">Change Signature</h4>\
                        </div>\
                        \
                        <form class="no-margin" id="uploadSignature" enctype="multipart/form-data">\
                         <div class="modal-body">\
                            <div class="space-4"></div>\
                            <div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
                         </div>\
                        \
                         <div class="modal-footer center">\
                            <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
                            <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
                         </div>\
                        </form>\
                      </div>\
                     </div>\
                    </div>';


                var modal = $(modal);
                modal.modal("show").on("hidden", function(){
                    modal.remove();
                });

                var working = false;

                var form = modal.find('form:eq(0)');
                var file = form.find('input[type=file]').eq(0);
                file.ace_file_input({
                    style:'well',
                    btn_choose:'Click to choose new picture',
                    btn_change:null,
                    no_icon:'ace-icon fa fa-picture-o',
                    thumbnail:'small',
                    before_remove: function() {
                        //don't remove/reset files while being uploaded
                        return !working;
                    },
                    allowExt: ['jpg', 'jpeg', 'png', 'gif'],
                    allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
                });

                form.on('submit', function(){
                    if(!file.data('ace_input_files')) {
                        last_gritter = $.gritter.add({
                            title: 'no image!',
                            text: 'Please choose a jpg|gif|png image!',
                            class_name: 'gritter-error gritter-center'
                        });
                        console.log($("input[name='file-input']").prop('files')[0]);
                        return false;
                    }

                    file.ace_file_input('disable');
                    form.find('button').attr('disabled', 'disabled');
                    form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");

                    var deferred = new $.Deferred;
                    working = true;
                    deferred.done(function() {
                        form.find('button').removeAttr('disabled');
                        form.find('input[type=file]').ace_file_input('enable');
                        form.find('.modal-body > :last-child').remove();

                        modal.modal("hide");

                        var thumb = file.next().find('img').data('thumb');
                        //if(thumb) $('#avatar2').get(0).src = thumb;

                        //process upload
                        var url = "<?php echo asset('/uploadSignature'); ?>";
                        var file_data = form.find('input[type=file]').eq(0).prop('files')[0];

                        var form_data = new FormData();
                        form_data.append('signature', file_data);
                        form_data.append('userid',"<?php echo $user->piUserid ?>");
                        $.ajaxSetup(
                            {
                                headers:
                                    {
                                        'X-CSRF-Token': "<?php echo csrf_token(); ?>"
                                    }
                            });
                        $.ajax({
                            url:url,
                            data: form_data,
                            type: 'POST',
                            contentType: false, // The content type used when sending data to the server.
                            cache: false, // To unable request pages to be cached
                            processData: false,
                            success: function(result) {
                                console.log("<?php echo asset('public/upload_picture/signature')?>"+result.split("upload_picture/signature")[1]);
                                last_gritter = $.gritter.add({
                                    title: 'Signature Updated!',
                                    text: 'Uploading to server.. successfully save..',
                                    class_name: 'gritter-warning gritter-center',
                                });
                                result = result.replace(/(<([^>]+)>)/ig,"");
                                $('#avatar_signature').get(0).src = "<?php echo asset('public/upload_picture/signature')?>"+result.split("upload_picture/signature")[1];
                            }
                        });
                        working = false;
                    });


                    setTimeout(function(){
                        deferred.resolve();
                    } , parseInt(Math.random() * 800 + 800));

                    return false;
                });

            });

            var file,trainingId,spancertificateId,certificateUnique,trainingDeleteid;
            var dropzoneCount = 0;
            var uploadcertificateFlag = true;

            editable_certificate();

            function editable_certificate(){

                $(".editable_certificate").each(function() {

                    $('#'+this.id).on('click', function(e){

                        spancertificateId = this.id;
                        trainingId = this.id.split('training')[1].split('col')[0];
                        certificateUnique = $(this).parents(':eq(1)').attr('id');

                        try {
                            trainingDeleteid = $(this).parents(':eq(0)').siblings('.trainingDelete').children().get(0).id;
                        } catch(e) {}

                        certificateLink = $(this).data('link');
                        dropzoneCount++;
                        var certificateContent = "<div class=\"row\" style='height:100px;'>\n" +
                            "                                                                <div class=\"col-xs-12\">\n" +
                            "                                                                    <div >\n" +
                            "                                                                        <form action=\"./dummy.html\" class=\"dropzone well\" id=\"dropzone"+dropzoneCount+"\">\n" +
                            "                                                                            <div class=\"fallback\">\n" +
                            "                                                                                <input name=\"file\" type=\"file\" multiple=\"\" />\n" +
                            "                                                                            </div>\n" +
                            "                                                                        </form>\n" +
                            "                                                                    </div>\n" +
                            "\n" +
                            "                                                                    <div id=\"preview-template\" class=\"hide\">\n" +
                            "                                                                        <div class=\"dz-preview dz-file-preview\">\n" +
                            "                                                                            <div class=\"dz-image\">\n" +
                            "                                                                                <img data-dz-thumbnail=\"\" />\n" +
                            "                                                                            </div>\n" +
                            "\n" +
                            "                                                                            <div class=\"dz-details\">\n" +
                            "                                                                                <div class=\"dz-size\">\n" +
                            "                                                                                    <span data-dz-size=\"\"></span>\n" +
                            "                                                                                </div>\n" +
                            "\n" +
                            "                                                                                <div class=\"dz-filename\">\n" +
                            "                                                                                    <span data-dz-name=\"\"></span>\n" +
                            "                                                                                </div>\n" +
                            "                                                                            </div>\n" +
                            "\n" +
                            "                                                                            <div class=\"dz-progress\">\n" +
                            "                                                                                <span class=\"dz-upload\" data-dz-uploadprogress=\"\"></span>\n" +
                            "                                                                            </div>\n" +
                            "\n" +
                            "                                                                            <div class=\"dz-error-message\">\n" +
                            "                                                                                <span data-dz-errormessage=\"\"></span>\n" +
                            "                                                                            </div>\n" +
                            "\n" +
                            "                                                                            <div class=\"dz-success-mark\">\n" +
                            "                                                                                <span class=\"fa-stack fa-lg bigger-150\">\n" +
                            "                                                                                    <i class=\"fa fa-circle fa-stack-2x white\"></i>\n" +
                            "\n" +
                            "                                                                                    <i class=\"fa fa-check fa-stack-1x fa-inverse green\"></i>\n" +
                            "                                                                                </span>\n" +
                            "                                                                            </div>\n" +
                            "\n" +
                            "                                                                            <div class=\"dz-error-mark\">\n" +
                            "                                                                                <span class=\"fa-stack fa-lg bigger-150\">\n" +
                            "                                                                                    <i class=\"fa fa-circle fa-stack-2x white\"></i>\n" +
                            "\n" +
                            "                                                                                    <i class=\"fa fa-remove fa-stack-1x fa-inverse red\"></i>\n" +
                            "                                                                                </span>\n" +
                            "                                                                            </div>\n" +
                            "                                                                        </div>\n" +
                            "                                                                    </div><!-- PAGE CONTENT ENDS -->\n" +
                            "                                                                </div><!-- /.col -->\n" +
                            "                                     </div><div class='alert alert-warning certificate-link'>Link</div><!-- /.row -->";


                        var modal =
                            '<div class="modal fade">\
                              <div class="modal-dialog modal-sm">\
                               <div class="modal-content">\
                                <div class="modal-header">\
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>\
                                    <h4 class="blue">Upload Certificate</h4>\
                                </div>\
                                \
                                 <div class="modal-body">\
                                    <div class="space-4"></div>'+
                            certificateContent
                            +'</div>\
                                \
                                 <div class="modal-footer center">\
                                    <button type="submit" class="btn btn-sm btn-success dropzoneSubmit"><i class="ace-icon fa fa-check"></i> Submit</button>\
                                    <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
                                 </d    iv>\
                              </div>\
                             </div>\
                            </div>';


                        var modal = $(modal);

                        modal.modal("show").on('shown.bs.modal', function (e) {
                            $(".certificate-link").html("<li><a download='"+certificateLink.split('johndoe')[0]+"'"+" href="+"'<?php echo asset('public/upload_picture/certificate')?>"+"/"+certificateLink+"'"+" >"+certificateLink.split('johndoe')[0]+'</a></li>');
                            certificateLink = '';
                            try {
                                Dropzone.autoDiscover = false;

                                file = '';
                                var myDropzone = new Dropzone('#dropzone'+dropzoneCount, {
                                    previewTemplate: $('#preview-template').html(),
                                    thumbnailHeight: 120,
                                    thumbnailWidth: 120,
                                    maxFilesize: 999999999999999999,
                                    maxFiles: 1,
                                    maxfilesexceeded: function(result) {
                                        this.removeAllFiles();
                                        this.addFile(result);
                                    },

                                    addRemoveLinks : true,
                                    dictRemoveFile: 'Remove',

                                    dictDefaultMessage :
                                        '<span class="bigger-150 bolder"><i class="ace-icon fa fa-caret-right red"></i> Drop files</span> to upload \
                                        <span class="smaller-80 grey">(or click)</span> <br /> \
                                        <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i>'
                                    ,

                                    thumbnail: function(file, dataUrl) {
                                        if (file.previewElement) {
                                            $(file.previewElement).removeClass("dz-file-preview");
                                            var images = $(file.previewElement).find("[data-dz-thumbnail]").each(function() {
                                                var thumbnailElement = this;
                                                thumbnailElement.alt = file.name;
                                                thumbnailElement.src = dataUrl;
                                            });
                                            setTimeout(function() { $(file.previewElement).addClass("dz-image-preview"); }, 1);
                                        }
                                    }

                                });


                                //simulating upload progress
                                var minSteps = 6,
                                    maxSteps = 60,
                                    timeBetweenSteps = 100,
                                    bytesPerStep = 100000;

                                myDropzone.uploadFiles = function(files) {
                                    var self = this;

                                    for (var i = 0; i < files.length; i++) {
                                        file = files[i];
                                        totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                                        for (var step = 0; step < totalSteps; step++) {
                                            var duration = timeBetweenSteps * (step + 1);
                                            setTimeout(function(file, totalSteps, step) {
                                                return function() {
                                                    file.upload = {
                                                        progress: 100 * (step + 1) / totalSteps,
                                                        total: file.size,
                                                        bytesSent: (step + 1) * file.size / totalSteps
                                                    };

                                                    self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
                                                    if (file.upload.progress == 100) {
                                                        file.status = Dropzone.SUCCESS;
                                                        self.emit("success", file, 'success', null);
                                                        self.emit("complete", file);
                                                        self.processQueue();
                                                        uploadcertificateFlag = true;
                                                    }
                                                };
                                            }(file, totalSteps, step), duration);

                                        }

                                    }
                                };

                                //remove dropzone instance when leaving this page in ajax mode
                                $(document).one('ajaxloadstart.page', function(e) {
                                    try {
                                        myDropzone.destroy();
                                    } catch(e) {}
                                });


                            } catch(e) {
                                modal.modal( 'hide' ).data( 'bs.modal', null );
                                //alert('Dropzone.js does not support older browsers!');
                            }

                        });


                        $(document).on('click', '.dropzoneSubmit', function() {
                            if(uploadcertificateFlag){
                                if(file)
                                    $('#'+spancertificateId).html('<span class="label label-info label-sm arrowed-in arrowed-in-right">\n' +
                                        '                                 <span class="inline position-relative">\n' +
                                        '                                     <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">\n' +
                                        '                                       <i class="ace-icon fa fa-certificate light-green"></i>\n' +
                                        '                                         &nbsp;\n' +
                                        '                                       <span class="white" style="font-size:5.5pt;">View Certificate</span>\n' +
                                        '                                      </a>\n' +
                                        '                                  </span>\n' +
                                        '                         </span>');
                                else
                                    console.log('false');

                                console.log(file);
                                $('.modal').modal('hide');
                                uploadcertificateFlag = false;

                                var url = "<?php echo asset('/uploadCertificate'); ?>";
                                var form_data = new FormData();
                                form_data.append('certificate', file);
                                form_data.append('trainingId',trainingId);
                                form_data.append('userid',"<?php echo $user->piUserid ?>");
                                form_data.append('unique_row',certificateUnique);
                                $.ajaxSetup(
                                    {
                                        headers:
                                            {
                                                'X-CSRF-Token': "<?php echo csrf_token(); ?>"
                                            }
                                    });
                                $.ajax({
                                    url:url,
                                    data: form_data,
                                    type: 'POST',
                                    contentType: false, // The content type used when sending data to the server.
                                    cache: false, // To unable request pages to be cached
                                    processData: false,
                                    success: function(result) {
                                        result = result.replace(/<\/?[^>]+(>|$)/g, "");
                                        last_gritter = $.gritter.add({
                                            title: 'Uploaded Certificate',
                                            text: 'Successfully uploaded your certificate.',
                                            class_name: 'gritter-info gritter-center',
                                        });
                                        console.log("checkhere");
                                        console.log(result);
                                        $('#'+spancertificateId).data('link', result);
                                        console.log(trainingDeleteid);
                                    }
                                });
                            }
                        });


                    });
                });
            }

            editable_text();
            function editable_text(){
                $(".editable").each(function() {
                    $('#'+this.id).editable({
                        type: 'text',
                        name: this.id,
                        emptytext: "Not Applicable",
                        success: function(data, value) {
                            var Class = this.className;
                            var json,url;

                            if(Class.includes('personal_information')){
                                json = {
                                    "id" : this.id.split('col')[0],
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updatePersonalInformation') !!}";
                            }
                            else if(Class.includes('survey')){
                                json = {
                                    "userid" : this.id.split('col')[0],
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateSurvey') !!}";
                            }
                            else if(Class.includes('family_background')){
                                json = {
                                    "userid" : this.id.split('col')[0],
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateFamilyBackground') !!}";
                            }
                            else if(Class.includes('children')){
                                json = {
                                    "id" : this.id.split('c_id')[1].split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('colc')[1],
                                    "value" : value,
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };

                                var $trapping = this.id.replace('childrenName','childrenDOB').replace('colcname','colcdate_of_birth');
                                if($("#"+$trapping).text() != 'Empty' && $("#"+$trapping).text() != ''){
                                    console.log($("#"+$trapping).text());
                                    chilBool = true; // make true so can add new row
                                } else {
                                    chilBool = false;
                                }

                                url = "{!! asset('updateChildren') !!}";
                            }
                            else if(Class.includes('educational_background')){
                                var education_level,education_id;
                                var unique_row = $(this).parents(':eq(1)').attr('id');
                                if(unique_row){
                                    education_level = $(this).parents(':eq(1)').find('td:eq(0)').find('span').attr('id').split('level')[1];
                                    education_id = 'no_id';
                                } else {
                                    education_level = '';
                                    education_id = this.id.split('col')[0]
                                }
                                json = {
                                    "id" : education_id,
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "level" : education_level,
                                    "unique_row" : unique_row,
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateEducationalBackground') !!}";
                            }
                            else if(Class.includes('civil_eligibility')){
                                json = {
                                    "id" : this.id.split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateCivilEligibility') !!}";
                            }
                            else if(Class.includes('work_experience')){
                                json = {
                                    "id" : this.id.split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateWorkExperience') !!}";
                            }
                            else if(Class.includes('voluntary_work')){
                                json = {
                                    "id" : this.id.split('voluntary')[1].split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateVoluntaryWork') !!}";
                            }
                            else if(Class.includes('training_program')){
                                json = {
                                    "id" : this.id.split('training')[1].split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateTrainingProgram') !!}";
                            }
                            else if(Class.includes('other_information')){
                                json = {
                                    "id" : this.id.split('other')[1].split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateOtherInformation') !!}";
                                console.log(json);
                            }

                            if( json.column == 'account_number' /*|| json.column == 'gsis_idno' || json.column == 'pag_ibigno' || json.column == 'sssno' || json.column == 'tin_no' || json.column == 'phicno'*/  ){
                                $("#"+this.id).css('color','#307bff');
                                $("#"+this.id).css({'font-weight': 'bold'});
                            }

                            $.post(url,json,function(result){
                                if(Class.includes('children')){
                                    childId = result; //get the primary key
                                }
                            }).fail(function(jqXHR, textStatus, errorThrown) {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                                alert("There was something wrong, will restart your page.");
                                window.location.reload();
                            });

                        },
                        error: function(errors) {
                            alert('slow internet connection..');
                        }
                    });
                });
            }


            function source_func($divisionId = null){
                var division = [];
                $.each(<?php echo $division; ?>, function(x, data) {
                    division.push({id: data.id, text: data.description});
                });

                var section = [];
                $.each(<?php echo $section; ?>, function(x, data) {
                    if(data.division == $divisionId){
                        section.push({id: data.id, text: data.description});
                    }
                });

                var designation = [];
                $.each(<?php echo $designation; ?>, function(x, data) {
                    designation.push({id: data.id, text: data.description});
                });

                var eduType = [];
                $.each(<?php echo $education_type; ?>, function(x, data) {
                    eduType.push({id: data.id, text: data.description});
                });

                return  [
                    {
                        "division" : division,
                        "section" : section,
                        "disbursement_type" : [
                            {value: "ATM", text: "ATM"},
                            {value: "CASH_CARD", text: "CASH CARD"},
                            {value: "NO_CARD", text: "W/O LBP CARDS"},
                            {value: "UNDER_VTF", text: "UNDER VTF"}
                        ],
                        "salary_chargeJO" : [
                            // {value: "HEALTH PROMOTION", text: "HEALTH PROMOTION" },
                            // {value: "HEALTH EMERGENCY PREPAREDNESS AND RESPONSE (HEPR)", text: "HEALTH EMERGENCY PREPAREDNESS AND RESPONSE (HEPR)" },
                            // {value: "REGULATION OF REGIONAL HEALTH FACILITIES AND SERVICES", text: "REGULATION OF REGIONAL HEALTH FACILITIES AND SERVICES" },
                            // {value: "SAA 2018-01-0014", text: "SAA 2018-01-0014" },
                            // {value: "SAA 2018-02-0059", text: "SAA 2018-02-0059" },
                            // {value: "SUPPORT TO OPERATIONS (STO)", text: "SUPPORT TO OPERATIONS (STO)" },
                            // {value: "PUBLIC HEALTH MANAGEMENT (PHM)", text: "PUBLIC HEALTH MANAGEMENT (PHM)" },
                            // {value: "SAA 2018-02-0203", text: "SAA 2018-02-0203" },
                            // {value: "SAA 2018-04-0699", text: "SAA 2018-04-0699" },
                            // {value: "SAA 2018-02-0081", text: "SAA 2018-02-0081" },
                            // {value: "SAA No. 2018-02-0059", text: "SAA No. 2018-02-0059" },
                            // {value: "SAA No. 2018-04-0699", text: "SAA No. 2018-04-0699" },
                            // {value: "2018 CO EAO CONAP", text: "2018 CO EAO CONAP" },
                            // {value: "SAA No. 2018-02-0203", text: "SAA No. 2018-02-0203" },
                            // {value: "Public Health Management Chief", text: "Public Health Management Chief" },
                                {value:"    2022 EPIDEMIOLOGY AND SURVEILLANCE FUNDS    ", text:"   2022 EPIDEMIOLOGY AND SURVEILLANCE FUNDS    "},
                                {value:"    2022 HEPR FUNDS ", text:"   2022 HEPR FUNDS "},
                                {value:"    2022 PHM CHIEF  ", text:"   2022 PHM CHIEF  "},
                                {value:"    CONAPP SAA NO. 2021-02-0628 ", text:"   CONAPP SAA NO. 2021-02-0628 "},
                                {value:"    CONAPP SAA NO. 2022-03-1597 ", text:"   CONAPP SAA NO. 2022-03-1597 "},
                                {value:"    HEALTH SECTOR RESEARCH AND DEVELOPMENT FUNDS    ", text:"   HEALTH SECTOR RESEARCH AND DEVELOPMENT FUNDS    "},
                                {value:"    LHSDA FUNDS ", text:"   LHSDA FUNDS "},
                                {value:"    OBCNVBSP    ", text:"   OBCNVBSP    "},
                                {value:"    PHILHEALTH TRUST FUNDS VER. 01  ", text:"   PHILHEALTH TRUST FUNDS VER. 01  "},
                                {value:"    PHILHEALTH TRUST FUNDS VER. 3   ", text:"   PHILHEALTH TRUST FUNDS VER. 3   "},
                                {value:"    RRHFS   ", text:"   RRHFS   "},
                                {value:"    SAA NO. 2022-01-0179    ", text:"   SAA NO. 2022-01-0179    "},
                                {value:"    SAA NO. 2022-01-0197    ", text:"   SAA NO. 2022-01-0197    "},
                                {value:"    SAA NO. 2022-02-0424    ", text:"   SAA NO. 2022-02-0424    "},
                                {value:"    SAA NO. 2022-03-0993    ", text:"   SAA NO. 2022-03-0993    "},
                                {value:"    SAA NO. 2022-03-1486    ", text:"   SAA NO. 2022-03-1486    "},
                                {value:"    SAA NO. 2022-04-2028    ", text:"   SAA NO. 2022-04-2028    "},
                                {value:"    STO OPERATIONS OF REGIONAL OFFICES  ", text:"   STO OPERATIONS OF REGIONAL OFFICES  "},
                                                

                        ],
                        "salary_chargePermanent" : [
                            {value: "RD_ARD", text: "RD/ARD" },
                            {value: "MSD", text: "MSD" },
                            {value: "LHSD", text: "LHSD" },
                            {value: "RLED", text: "RLED" },
                            {value: "PROVINCIAL HEALTH TEAM-CEBU", text: "PROVINCIAL HEALTH TEAM-CEBU" },
                            {value: "PROVINCIAL HEALTH TEAM-BOHOL", text: "PROVINCIAL HEALTH TEAM-BOHOL" },
                            {value: "PROVINCIAL HEALTH TEAM-NEGROS AND SIQUIJOR", text: "PROVINCIAL HEALTH TEAM-NEGROS AND SIQUIJOR" },
                        ],
                        "job_status" : [
                            {value: "Permanent", text: "Permanent"},
                            {value: "Job Order", text: "Job Order"},
                            {value: "CBII", text: "CBII"},
                            {value: "Contractual", text: "Contractual"},
                            {value: "Regular", text: "Regular"},
                            {value: "Casual", text: "Casual"}
                        ],
                        "field_status" : [
                            {value: "HRH", text: "HRH"},
                            {value: "Office Personnel", text: "Office Personnel"}
                        ],
                        "designation": designation,
                        "education_type": eduType
                    }
                ];
            }

            editable_select();
            function editable_select(){
                $(".editable_select").each(function(index) {
                    var source = [];
                    if(this.id.includes('division')){
                        source = source_func()[0].division;
                    }
                    else if(this.id.includes('section')){
                        source = source_func("<?php echo $user->division_id ?>")[0].section;
                    }
                    else if(this.id.includes('disbursement_type')){
                        source = source_func("<?php echo $user->disbursement_type ?>")[0].disbursement_type;
                    }
                    else if(this.id.includes('salary_charge')){
                        @if( $user->job_status == 'Permanent' )
                            source = source_func("<?php echo $user->salary_charge ?>")[0].salary_chargePermanent;
                        @else
                            source = source_func("<?php echo $user->salary_charge ?>")[0].salary_chargeJO;
                        @endif
                    }
                    else if(this.id.includes('job_status') || this.id.includes('status_of_appointment')){
                        source = source_func("<?php echo $user->job_status ?>")[0].job_status;
                    }
                    else if(this.id.includes('designation_id')){
                        source = source_func("designation")[0].designation;
                    }
                    else if(this.className.includes('educational_background')){
                        source = source_func("educational_background")[0].education_type;
                    }
                    else if(this.id.includes('field_status')){
                         source = source_func("<?php echo $user->field_status ?>")[0].field_status;
                    }
                    $('#'+this.id).editable({
                        name : this.id,
                        type: 'select2',
                        source: source,
                        select2: {
                            width: 300
                        },
                        success: function(data, value) {
                            var string = this.className;
                            var json,url,salaryChargeChange;
                            if(string.includes('personal_information')){
                                json = {
                                    "id" : this.id.split('col')[0],
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updatePersonalInformation') !!}";

                                if( json.column == 'job_status' ){
                                    if( value == 'Permanent' ){
                                        salaryChargeChange = source_func("<?php echo $user->salary_charge ?>")[0].salary_chargePermanent;
                                    }
                                    else {
                                        salaryChargeChange = source_func("<?php echo $user->salary_charge ?>")[0].salary_chargeJO;
                                    }
                                    filter_salaryCharge(url,this.id,salaryChargeChange);
                                }

                                if( json.column == 'job_status' || json.column == 'salary_charge' ){
                                    $("#"+this.id).css('color','#307bff');
                                    $("#"+this.id).css({'font-weight': 'bold'});
                                }
                            }
                            else if(string.includes('work_experience')){
                                json = {
                                    "id" : this.id.split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateWorkExperience') !!}";
                            }
                            else if(string.includes('educational_background')){
                                var education_id;
                                var unique_row = $(this).parents(':eq(1)').attr('id')
                                if( unique_row ){
                                    education_id = 'no_id';
                                } else {
                                    education_id = this.id.split('col')[0];
                                }
                                json = {
                                    "id" : education_id,
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "level" : value,
                                    "unique_row" : unique_row,
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateEducationalBackground') !!}";
                                var newId = this.id;
                                newId = newId.replace(/level.*$/,'level'+json.level);
                                $(this).prop('id',newId);
                            }

                            var id = this.id;
                            $.post(url,json,function(result){
                                console.log(result);
                                if(json.column == 'division_id'){
                                    filter_section(url,value,id);
                                }
                            }).fail(function(jqXHR, textStatus, errorThrown) {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                                alert("There was something wrong, will restart your page.");
                                window.location.reload();
                            });
                        },
                        error: function(errors) {
                            alert('slow internet connection..');
                        }
                    });
                });
            }

            function filter_salaryCharge(url,id,salaryChargeChange){
                var source = salaryChargeChange;
                var finalId = id.replace("job_status","salary_charge");
                var element = $("#"+finalId);
                var section = element.removeAttr('id').get(0);
                $(section).clone().attr('id', finalId).text('Select Salary Charge').editable({
                    type: 'select2',
                    value: null,
                    source: source,
                    select2: {
                        'width': 300
                    },
                    success: function (data, value) {
                        json = {
                            "id" : this.id.split('col')[0],
                            "column" : this.id.split('col')[1],
                            "value" : value,
                            "_token" : "<?php echo csrf_token(); ?>",
                        };
                        $.post(url, json, function (result) {
                            console.log(result);
                        });
                    }
                }).insertAfter(section);
                $(section).remove();
            }

            function filter_section(url,divisionId,id){
                var source = source_func(divisionId)[0].section;
                var finalId = id.replace("division","section");
                var element = $("#"+finalId);
                var section = element.removeAttr('id').get(0);
                $(section).clone().attr('id', finalId).text('Select Section').editable({
                    type: 'select2',
                    value: null,
                    source: source,
                    select2: {
                        'width': 300
                    },
                    success: function (data, value) {
                        json = {
                            "id" : this.id.split('col')[0],
                            "column" : this.id.split('col')[1],
                            "value" : value,
                            "_token" : "<?php echo csrf_token(); ?>",
                        };
                        $.post(url, json, function (result) {
                            console.log(result);
                        });
                    }
                }).insertAfter(section);
                $(section).remove();

            }

            //joy
            function filter_tranche(url,id,year){
                var source = year;
                var finalId = id.replace("salary_tranche");
                var element = $("#"+finalId);
                var section = element.removeAttr('id').get(0);
                $(section).clone().attr('id', finalId).text('Select Transasache').editable({
                    type: 'select2',
                    value: null,
                    source: source,
                    select2: {
                        'width': 300
                    },
                    success: function (data, value) {
                        json = {
                            "id" : this.id.split('col')[0],
                            "column" : this.id.split('col')[1],
                            "value" : value,
                            "_token" : "<?php echo csrf_token(); ?>",
                        };
                        $.post(url, json, function (result) {
                            console.log(result);
                        });
                    }
                }).insertAfter(section);
                $(section).remove();

            }

            var source_radio = [{
                "sex": [
                    {value: 'Male', text: 'Male'},
                    {value: 'Female', text: 'Female'}
                ],
                "civil_status": [
                    {value: 'Single', text: 'Single'},
                    {value: 'Widowed', text: 'Widowed'},
                    {value: 'Others', text: 'Others'},
                    {value: 'Married', text: 'Married'},
                    {value: 'Separated', text: 'Separated'}
                ],
                "citizenship": [
                    {value: 'Filipino', text: 'Filipino'},
                    {value: 'Dual Citizenship', text: 'Dual Citizenship'},
                    {value: 'by birth', text: 'by birth'},
                    {value: 'by naturalization', text: 'by naturalization'}
                ],
                "pdate_of_birth": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "cdate_of_birth": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "vdate_from": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "vdate_to": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "tdate_from": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "tdate_to": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "voluntaryDelete": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "trainingDelete": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "salary_grade": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "date_from": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "date_to": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "certificate": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "workDelete": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "childrenDelete": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "civilDelete": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "educationDelete": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "otherDelete": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "date_of_examination": [
                    {value:'Dummy', text:'Dummy'}
                ],
                "government_service": [
                    {value:'Yes', text:'Yes'},
                    {value:'No', text:'No'}
                ],
                "consanguinity_a": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ],
                "consanguinity_b": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ],
                "offense_a": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ],
                "offense_b": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ],
                "convicted": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ],
                "separated": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ],
                "government_a": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ],
                "government_b": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ],
                "immigrant": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ],
                "indigenous_a": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ],
                "indigenous_b": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ],
                "indigenous_c": [
                    {value: 'Yes', text: 'Yes'},
                    {value: 'No', text: 'No'}
                ]
            }];

            var columnId,radioClassname;
            editable_radio();
            function editable_radio(){
                $(".editable_radio").each(function(index){
                    $('#'+this.id).editable({
                        type: 'radiolist',
                        name: this.id,
                        source: source_radio[0][this.id.split('col')[1]],
                        validate: function(value) {
                            var json,url;
                            columnId = this.id.split('col')[1];
                            radioClassname = this.className;
                            $("#"+this.id).css('color','#393939');
                            if( value != null && (columnId == 'sex' || columnId == 'citizenship' || columnId == 'civil_status') ){ //personal information sex,citizenship,civil_status
                                $("#"+this.id).html(value);
                                json = {
                                    "id" : "<?php echo $user->piId; ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "indicate_country" : $("#indicateCountry").val(),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "<?php echo asset('updatePersonalInformation'); ?>";
                            }
                            else if(columnId == 'government_service'){
                                $("#"+this.id).css('color','black').html(value);
                                json = {
                                    "id" : this.id.split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateWorkExperience') !!}";
                            }
                            else if(columnId == 'pdate_of_birth'){ //personal information date_of_birth
                                var date_picker = $("#"+this.id+"input").val();
                                $("#"+this.id).html(date_picker);
                                json = {
                                    "id" : "<?php echo $user->piId; ?>",
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : 'date_of_birth',
                                    "value" : date_picker,
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "<?php echo asset('updatePersonalInformation'); ?>";
                            }
                            else if( columnId == 'date_of_examination' || columnId == 'vdate_from' || columnId == 'vdate_to' || radioClassname.includes('training_program') ){
                                var date_picker = $("#"+this.id+"input").val();
                                $("#"+this.id).html(date_picker);
                                $("#"+this.id).css('color','#393939');
                                var column,rowId;
                                if( columnId == 'date_of_examination' ) {
                                    rowId = this.id.split('col')[0];
                                    url = "{!! asset('updateCivilEligibility') !!}";
                                    column = 'date_of_examination';
                                }
                                else if( radioClassname.includes('training_program') ){
                                    rowId = this.id.split('training')[1].split('col')[0];
                                    url = "{!! asset('updateTrainingProgram') !!}";
                                    if( columnId == 'tdate_from' ){
                                        column = 'date_from';
                                    } else {
                                        column = 'date_to';
                                    }
                                }
                                else{
                                    url = "{!! asset('updateVoluntaryWork') !!}";
                                    rowId = this.id.split('voluntary')[1].split('col')[0];
                                    if( columnId == 'vdate_from' ){
                                        column = 'date_from';
                                    } else {
                                        column = 'date_to';
                                    }
                                }

                                json = {
                                    "id" : rowId,
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : column,
                                    "value" : date_picker,
                                    "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                            }
                            else if(columnId == 'cdate_of_birth'){ // children date_of_birth
                                chilBool = true; // make true so can add new row
                                var date_picker = $("#"+this.id+"input").val();
                                $("#"+this.id).html(date_picker);
                                json = {
                                    "id" : this.id.split('c_id')[1].split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : 'date_of_birth',
                                    "value" : date_picker,
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };

                                var $trapping = this.id.replace('childrenDOB','childrenName').replace('colcdate_of_birth','colcname');
                                if($("#"+$trapping).text() != 'Not Applicable' && $("#"+$trapping).text() != ''){
                                    console.log($("#"+$trapping).text());
                                    chilBool = true; // make true so can add new row
                                } else {
                                    chilBool = false;
                                }
                                $("#"+this.id).css('color','#393939');

                                url = "{!! asset('updateChildren') !!}";
                            }
                            else if(columnId == 'salary_grade'){
                                chilBool = true; // make true so can add new row
                                var salary_grade = $("#salary_tranche").val()+' | '+$("#salary_grade").val()+'-'+$("#salary_step").val();
                                var monthlySalaryId;

                                if(radioClassname.includes('workAdd')){
                                    console.log("true");
                                    monthlySalaryId = $(this).parents(':eq(0)').siblings('.monthly_salary').children().get(0).id;
                                }
                                else {
                                    console.log("false");
                                    monthlySalaryId = this.id.split('col')[0]+"colmonthly_salary";
                                }
                                $("#"+this.id).removeClass('red').removeClass('editable-empty').html(salary_grade);
                                json = {
                                    "id" : this.id.split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : 'salary_grade',
                                    "salary_tranche" : $("#salary_tranche").val(),
                                    "salary_grade" : $("#salary_grade").val(),
                                    "salary_step" : $("#salary_step").val(),
                                    "value" : salary_grade,
                                    "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };

                                // Check if the user is permanent
                                if ("<?php echo $user->job_status ?>" === "Permanent") {
                                    // Add the year parameter only for permanent employees
                                    json.year = $("#year_"+this.id.split('col')[0]+'colyear').val();
                                }
                                console.log("with year",json);
                                url = "{!! asset('updateWorkExperience') !!}";
                            }
                            else if(columnId == 'date_from' || columnId == 'date_to'){
                                var date_picker = $("#"+this.id+"input").val();
                                var toPresent = '';
                                if($("#"+this.id+"toPresent").is(":checked")){
                                    toPresent = $("#"+this.id+"toPresent").val();
                                }
                                var pickerValue;
                                if(toPresent)
                                    pickerValue = toPresent;
                                else{
                                    if(date_picker == 'Present'){
                                        pickerValue = '';
                                    }
                                    else {
                                        pickerValue = date_picker;
                                    }
                                }

                                console.log(pickerValue);
                                $("#"+this.id).css('color','black').html(pickerValue);
                                if(!pickerValue){
                                    $("#"+this.id).css('color','#D14').css('font-style','italic').html('Empty');
                                }

                                json = {
                                    "id" : this.id.split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : pickerValue,
                                    "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateWorkExperience') !!}";
                            }
                            else if(columnId == 'certificate'){
                                json = {
                                    "id" : this.id.split('training')[1].split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateTrainingProgram') !!}";
                            }
                            else if(radioClassname.includes('survey')){
                                var finalValue;
                                if(value == "Yes"){
                                    if(this.id.split('col')[1] == "offense_b"){
                                        finalValue = value+"-"+$("."+this.id.split('col')[1]+"_date_filed").val()+"-"+$("."+this.id.split('col')[1]+"_status_case").val();
                                    }
                                    else if(this.id.split('col')[1] == "consanguinity_a"){
                                        finalValue = value;
                                    }
                                    else {
                                        finalValue = value+"-"+$("."+this.id.split('col')[1]+"_specify").val();
                                    }
                                } else {
                                    finalValue = value;
                                }
                                $("#"+this.id).html(finalValue);
                                json = {
                                    "userid" : this.id.split('col')[0],
                                    "column" : this.id.split('col')[1],
                                    "value" : finalValue,
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updateSurvey') !!}";
                                console.log(json);
                            }

                            if( columnId == 'workDelete' || columnId == 'childrenDelete' || columnId == 'civilDelete' || columnId == 'voluntaryDelete' || columnId == 'trainingDelete' || columnId == 'educationDelete' || columnId == 'otherDelete' ){
                                if( columnId == 'workDelete' ){
                                    json = {
                                        "id" : this.id.split('col')[0],
                                        "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                        "_token" : "<?php echo csrf_token(); ?>",
                                    };

                                    url = "{!! asset('deleteWorkExperience') !!}";
                                    $(this).parents(':eq(1)').fadeOut();

                                }
                                else if( columnId == 'childrenDelete' ){
                                    json = {
                                        "id" : this.id.split('c_id')[1].split('col')[0],
                                        "_token" : "<?php echo csrf_token(); ?>",
                                    };

                                    url = "{!! asset('deleteChildren') !!}";
                                    $(this).parents(':eq(1)').fadeOut();
                                }
                                else if( columnId == 'civilDelete' ){
                                    json = {
                                        "id" : this.id.split('col')[0],
                                        "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                        "_token" : "<?php echo csrf_token(); ?>",
                                    };

                                    url = "{!! asset('deleteCivilEligibility') !!}";
                                    $(this).parents(':eq(1)').fadeOut();
                                }
                                else if( columnId == 'educationDelete' ){
                                    json = {
                                        "id" : this.id.split('col')[0],
                                        "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                        "_token" : "<?php echo csrf_token(); ?>",
                                    };

                                    url = "{!! asset('deleteEducationalBackground') !!}";
                                    $(this).parents(':eq(1)').fadeOut();
                                }
                                else if( columnId == 'otherDelete' ){
                                    json = {
                                        "id" : this.id.split('col')[0],
                                        "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                        "_token" : "<?php echo csrf_token(); ?>",
                                    };

                                    url = "{!! asset('deleteOtherInformation') !!}";
                                    $(this).parents(':eq(1)').fadeOut();
                                }
                                else if( columnId == 'voluntaryDelete' ){
                                    json = {
                                        "id" : this.id.split('col')[0],
                                        "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                        "_token" : "<?php echo csrf_token(); ?>",
                                    };

                                    url = "{!! asset('deleteVoluntaryWork') !!}";
                                    $(this).parents(':eq(1)').fadeOut();
                                }
                                else if( columnId == 'trainingDelete' ){
                                    if(!certificateLink){
                                        certificateLink = $(this).data('link');
                                    }

                                    json = {
                                        "id" : this.id.split('col')[0],
                                        'path' : certificateLink,
                                        "unique_row" : $(this).parents(':eq(1)').attr('id'),
                                        "_token" : "<?php echo csrf_token(); ?>",
                                    };

                                    url = "{!! asset('deleteTrainingProgram') !!}";
                                    $(this).parents(':eq(1)').fadeOut();
                                    certificateLink = '';
                                }

                                $.post(url,json,function(result){
                                    console.log(result);
                                }).fail(function(jqXHR, textStatus, errorThrown) {
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                    alert("There was something wrong, will restart your page.");
                                    window.location.reload();
                                });

                            }
                            else
                            {
                                $.post(url,json,function(result){
                                    console.log(result);
                                    if(columnId == 'cdate_of_birth'){
                                        childId = result; //get the primary key
                                        console.log(result);
                                    }
                                    else if (columnId == "salary_grade"){
                                        console.log("monthly_salary_id",monthlySalaryId);
                                        $("#"+monthlySalaryId).html("<b style='color:#307bff;'>"+result+"</b>");
                                    }
                                }).fail(function(jqXHR, textStatus, errorThrown) {
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                    alert("There was something wrong, will restart your page.");
                                    window.location.reload();
                                });
                                
                            }


                        }
                    });
                });
            }

        });

        (function($) {
            //global variable
            var todayDate = new Date();
            var month = todayDate.getMonth()+1;
            var day = todayDate.getDate();
            var year = todayDate.getFullYear();
            var hours = todayDate.getDate();
            var minutes = todayDate.getMinutes();
            var seconds = todayDate.getSeconds();

            var name = '';
            var $value = '';
            var Radiolist = function (options) {
                this.init('radiolist', options, Radiolist.defaults);
            };
            
            $.fn.editableutils.inherit(Radiolist, $.fn.editabletypes.list);
            $.extend(Radiolist.prototype, {
                renderList: function() {
                    var $label;
                    this.$tpl.empty();
                    if(!$.isArray(this.sourceData)) {
                        return;
                    }
                    for(var i=0; i<this.sourceData.length; i++) {
                        // There should be a better way to get name. May need to be changed for other layouts
                        //var name = this.$input.closest('.editable_radio').find("[data-type='radiolist']").attr('id'); way gamit undefined
                        name = this.options.scope.id;
                        $value = $("#"+name).text();
                        if(name.split('col')[1] == 'citizenship' || name.split('col')[1] == 'sex' || name.split('col')[1] == 'civil_status'
                            || name.split('col')[1] == 'government_service' || name.split('col')[1] == 'consanguinity_a'
                            || name.split('col')[1] == 'consanguinity_b' || name.split('col')[1] == 'offense_a' || name.split('col')[1] == 'offense_b'
                            || name.split('col')[1] == 'convicted' || name.split('col')[1] == 'separated' || name.split('col')[1] == 'government_a'
                            || name.split('col')[1] == 'government_b' || name.split('col')[1] == 'immigrant' || name.split('col')[1] == 'indigenous_a'
                            || name.split('col')[1] == 'indigenous_b' || name.split('col')[1] == 'indigenous_c'
                        ){
                            $label = $('<label class="radio-inline" style="padding-right:10px;padding-top:5px;">')
                                .append($('<input>', {
                                        type: 'radio',
                                        name:  name,
                                        value: this.sourceData[i].value
                                    }
                                ));

                            var spanAppend = $('<span>').text(this.sourceData[i].text);
                            $label.append(spanAppend);
                            // Add radio buttons to template
                            this.$tpl.append($label);
                        }
                    }
                    var indicateCountry;
                    if( name.split('col')[1] == 'citizenship' ){
                        indicateCountry = "<br><br><input type='text' class='form-control' value='{{ $user->indicate_country }}' style='width:80%;' id='indicateCountry' placeholder='Pls. indicate country (OPTIONAL)' name='indicateCountry'>";
                        this.$tpl.append(indicateCountry);
                    }

                    if( name.split('col')[1] == 'government_service' )
                        $(".popover-content").css('width','200px');

                    if( name.split("colp")[1] == 'date_of_birth' || name.split("colc")[1] == 'date_of_birth' || name.split('col')[1] == 'date_from' || name.split('col')[1] == 'date_to' || name.split('col')[1] == 'date_of_examination' || name.split('colv')[1] == 'date_from' || name.split('colv')[1] == 'date_to' || name.split('colt')[1] == 'date_from' || name.split('colt')[1] == 'date_to' )
                    {
                        var value = $("#"+name).text();
                        if(value == 'Empty')
                            value = month+'/'+day+'/'+year;

                        var minDate,attrTrap,presentValue;
                        var presentFlag = false;
                        var extendAppend = '';

                        var toPresent = "<br><br>Check if present: <input type='checkbox' value='Present' id='"+name+'toPresent'+"' style='margin-left:10px;margin-right:10px;transform: scale(1.8)' <?php if(!Auth::user()->usertype) echo 'disabled'; ?>>";
                        var notePresent = "<span class='alert alert-info'>Present check use only once</span>";

                        if( name.split('col')[1] == 'date_from' ) {
                            minDate = '';
                            attrTrap = 'readonly';
                        }
                        else if( name.split('col')[1] == 'date_to' ) {
                            var datepickerTrap = $("#"+name).parent(':first').siblings(':first').children()[0].id;
                            extendAppend = toPresent+notePresent;
                            minDate = $("#"+datepickerTrap).text();
                            if(minDate == 'Empty'){
                                attrTrap = 'disabled';
                            }
                            else
                                attrTrap = 'readonly';
                        }
                        this.$tpl.append("<input type='text' value='"+value+"' id='"+name+ "input"+"' style='margin-right:15px;width:100%'"+attrTrap+">"+extendAppend);

                        $(".td_workDateto").each(function(){
                            presentValue = $("#"+$(this).children('span')[0].id).text();
                            if(presentValue == 'Present'){
                                presentFlag = true;
                                return false;
                            }
                        });
                        $(".td_workDateto").each(function(){
                            presentValue = $("#"+$(this).children('span')[0].id).text();
                            if(presentValue == 'Present'){
                                $("#"+$(this).children('span')[0].id+"toPresent").prop('checked',true);
                                $("#"+$(this).children('span')[0].id+"input").attr("disabled",true);
                            }
                            else if(presentFlag || minDate == 'Empty') {
                                $("#"+$(this).children('span')[0].id+"toPresent").prop('disabled',true)
                            }
                            console.log($(this).children('span')[0].id);
                        });

                        $(function() {
                            $(document).on('click', '.ui-state-disabled', function() {
                                return false;
                            });

                            var toPresent = '#'+name+'toPresent';
                            $(document).on('click', '#'+name+'toPresent', function() {
                                console.log(toPresent);
                                if($(toPresent).is(":checked"))
                                    $("#"+name+"input").attr("disabled",true);
                                else {
                                    $("#"+name+"input").attr("disabled",false);
                                    $(".td_workDateto").each(function(){
                                        $("#"+$(this).children('span')[0].id+"toPresent").prop('disabled',false);
                                    });
                                }
                            });
                        }); // prevent bugs in jquery wew !

                        $("#"+name+"input").datepicker({
                            showOtherMonths: true,
                            selectOtherMonths: true,
                            autoclose:true,
                            changeMonth: true,
                            changeYear: true,
                            minDate: minDate,
                        });
                    }
                    else if (name.split('col')[1] == 'salary_grade'){
                        var salary_append = this.$tpl;
                        var uniq = name.split('col')[0];
                        salary_append.append(<?php
                            $tranche = ["Second","Third", "Fourth"];

                            $years = \PIS\SalaryGrade::select('year')
                                    ->whereNotNull('year')
                                    ->distinct()
                                    ->get();        
                            ?>
                            '@if($user->job_status == "Permanent")<select name="year" id="year_' + uniq + 'colyear" class="form-control years" data-uniq="' + uniq + '" onchange="updateYear(this)" style="width: 100%" required><option value="0">Past Year</option>@foreach($years as $year) <option value="{{ $year->year }}">{{ $year->year  }}</option> @endforeach @endif</select><div class="space-6"></div><select name="salary_tranche" id="salary_tranche" class="form-control" style="width: 100%" required><option value="">Select Tranche</option>@foreach($tranche as $trancheIndex) <option value="{{ $trancheIndex }}">{{ $trancheIndex  }}</option> @endforeach</select> <div class="space-6"></div><select name="salary_grade" id="salary_grade" class="form-control" style="width: 100%" required><option value="">Select Salary Grade</option>@foreach(range(1,33) as $salaryGradeIndex)<option value="{{ $salaryGradeIndex }}">{{ $salaryGradeIndex }}</option>@endforeach</select><div class="space-6"></div><select name="salary_step" id="salary_step" class="form-control" style="width: 100%" required><option value="">Select Salary Step</option>@foreach(range(1,8) as $salaryStepIndex)<option value="{{ $salaryStepIndex }}">{{ $salaryStepIndex }}</option>@endforeach</select>');
                    }
                    else if( name.split('col')[1] == 'workDelete' || name.split('col')[1] == 'childrenDelete' || name.split('col')[1] == 'civilDelete' || name.split('col')[1] == 'voluntaryDelete' || name.split('col')[1] == 'trainingDelete' || name.split('col')[1] == 'educationDelete' || name.split('col')[1] == 'otherDelete' ){
                        try{
                            var certificateId = $("#"+name).parents(':eq(0)').siblings('.trainingCertificate').children().get(0).id;
                            certificateLink = $("#"+certificateId).data('link');
                        }
                        catch(e){}

                        $(".popover-content").css('width','320px');
                        var workDelete_append = this.$tpl;
                        workDelete_append.append("<label class='red'>Are you sure you want to delete this ?</label>&nbsp;");
                    }
                    else if(
                        name.split('col')[1] == 'consanguinity_b' || name.split('col')[1] == 'offense_a' || name.split('col')[1] == 'offense_b'
                        || name.split('col')[1] == 'convicted' || name.split('col')[1] == 'separated' || name.split('col')[1] == 'government_a'
                        || name.split('col')[1] == 'government_b' || name.split('col')[1] == 'immigrant' || name.split('col')[1] == 'indigenous_a'
                        || name.split('col')[1] == 'indigenous_b' || name.split('col')[1] == 'indigenous_c'
                    ){
                        var surveyAppend = this.$tpl;
                        if(name.split('col')[1] == 'offense_b'){
                            surveyAppend.append('<br>'+"<span class='purple "+name.split('col')[1]+" hide'>if yes, give details:<br>" +
                                "Date Filed:<br><input type='text' class='"+name.split('col')[1]+"_date_filed' name='"+name.split('col')[1]+"_date_filed'><br>" +
                                "Status of Case/s:<br><input type='text' class='"+name.split('col')[1]+"_status_case' name='"+name.split('col')[1]+"_status_case'> </span>" +
                                "");
                        } else {
                            surveyAppend.append('<br>'+"<span class='purple "+name.split('col')[1]+" hide'>if yes, give details: <br><input type='text' class='"+name.split('col')[1]+"_specify' name='"+name.split('col')[1]+"_specify'> </span>");
                        }
                        $(function() {
                            $(document).on('change', "input[name='"+name+"']", function() {
                                var radioCheckVal = $("input[name='"+name+"']:checked").val();
                                if(radioCheckVal == "Yes"){
                                    $("."+name.split("col")[1]).removeClass('hide');
                                    $("."+name.split("col")[1]+"_specify").val($value.split('-')[1]);
                                    $("."+name.split("col")[1]+"_date_filed").datepicker({
                                        showOtherMonths: true,
                                        selectOtherMonths: true,
                                        autoclose:true,
                                        changeMonth: true,
                                        changeYear: true
                                    });
                                } else {
                                    $("."+name.split("col")[1]).addClass('hide');
                                }
                            });
                        });
                    }

                    console.log(name);

                    this.$input = this.$tpl.find('input[type="radio"]');
                    this.setClass();
                },

                value2str: function(value) {
                    return $.isArray(value) ? value.sort().join($.trim(this.options.separator)) : '';
                },

                //parse separated string og mo trigger ig click sa editable
                str2value: function(str) {
                    //console.log("str2value");
                    var reg, value = null;
                    if(typeof str === 'string' && str.length) {
                        reg = new RegExp('\\s*'+$.trim(this.options.separator)+'\\s*');
                        value = str.split(reg);
                    } else if($.isArray(str)) {
                        value = str;
                    }
                    return value;
                },

                //set checked on required radio buttons og mo trigger ig click sa editable
                //!!Could probably be cleaned up since this was for select multiple originally
                value2input: function() {
                    console.log('rtayong');
                    //para ma check ang radio box
                    $("input[name="+name+"][value='"+$value+"']").prop("checked",true);
                    var elementId = name.split("col")[1];

                    //SURVEY RADIO BUTTON
                    $("input[name="+elementId+"_specify"+"][value='"+$value+"']").prop("checked",true);
                    if($value.split('-')[0] == "Yes"){
                        $("."+elementId).removeClass('hide');
                        $("input[name="+name+"][value='"+$value.split('-')[0]+"']").prop("checked",true);
                        $("."+elementId+"_specify").val($value.split('-')[1]);
                        $("."+elementId+"_date_filed").val($value.split('-')[1]);
                        $("."+elementId+"_date_filed").datepicker({
                            showOtherMonths: true,
                            selectOtherMonths: true,
                            autoclose:true,
                            changeMonth: true,
                            changeYear: true
                        });
                        $("."+elementId+"_status_case").val($value.split('-')[2]);
                    }
                    //

                },

                input2value: function() {
                    return this.$input.filter(':checked').val();
                },

                //collect text of checked boxes
                value2htmlFinal: function(value, element) {
                    console.log("value2htmlFinal");
                    checked = $.fn.editableutils.itemsByValue(value, this.sourceData);
                    if(checked.length) {
                        $(element).html($.fn.editableutils.escape(value));
                    } else {
                        $(element).empty();
                    }
                },

                value2submit: function(value) {
                    console.log("value2submit");
                    return value;
                },
                //og mo trigger ig click sa editable
                activate: function() {
                    //console.log("activate");
                    this.$input.first().focus();
                }
            });

            Radiolist.defaults = $.extend({}, $.fn.editabletypes.list.defaults, {
                /**
                 @property tpl
                 @default <div></div>
                 **/
                tpl:'<label class="editable-radiolist"></label>',

                /**
                 @property inputclass
                 @type string
                 @default null
                 **/
                inputclass: '',

                /**
                 Separator of values when reading from `data-value` attribute

                 @property separator
                 @type string
                 @default ','
                 **/
                separator: ','
            });

            $.fn.editabletypes.radiolist = Radiolist;

        }(window.jQuery));

        console.log('Im in');
            function updateYear(selected) {
                var uniq = selected.getAttribute('data-uniq');
                var yearx = selected.value;
                console.log('hi im in', uniq+'colyear');
                $.ajax({
                    url: "{{ route('process.year') }}",
                    type: 'POST',
                    data: {
                            year: yearx,
                            _token : "<?php echo csrf_token(); ?>"
                        },
                    success: function (response) {
                        console.log('hi im res', response.tranches);

                        var $salaryTrancheSelect = $('#salary_tranche');
                        $salaryTrancheSelect.empty();
                        
                        $salaryTrancheSelect.append('<option value="">Select Tranche</option>');

                        var tranches = response.tranches;
                        if (!Array.isArray(tranches)) {
                            tranches = Object.values(tranches);  // Convert object to array if it's not an array
                        }
                        // Append each tranche as an option
                        tranches.forEach(function(tranche) {
                            $salaryTrancheSelect.append('<option value="' + tranche + '">' + tranche + '</option>');
                        });
                    },
                    error: function (error) {
                        console.log('Error fetching salary tranches:', error);
                    }
                });
            }
    </script>
@endsection

