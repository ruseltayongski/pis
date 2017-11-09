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
            width: 30%;
        }
        /*.editable-empty{
            color: black;
        }*/
    </style>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <div class="page-header">
                    <h1>
                        User Profile Page
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <ul class="nav nav-tabs padding-18">
                            <li>
                                <a data-toggle="tab" href="#personal_information">
                                    <i class="green ace-icon fa fa-user bigger-120"></i>
                                    Personal Information
                                </a>
                            </li>
                            <li class="active">
                                <a data-toggle="tab" href="#family_background">
                                    <i class="orange ace-icon fa fa-picture-o bigger-120"></i>
                                    Family Background
                                </a>
                            </li>
                            <li >
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
                                    <i class="orange ace-icon fa fa-user-secret bigger-120"></i>
                                    Other Information
                                </a>
                            </li>
                        </ul>
                        <div class="hr dotted"></div>

                        <div>
                            <div id="user-profile-1" class="user-profile row">
                                <div class="col-xs-12 col-sm-3 center">
                                    <div>
                                <span class="profile-picture">
                                    <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="
                                    <?php
                                    if($user->sex == 'Female')
                                        echo asset('public/assets_ace/images/avatars/female1.png');
                                    else
                                        echo asset('public/assets_ace/images/avatars/male1.png');
                                    ?>" />
                                </span>
                                        <div class="rating inline"></div>
                                        <div class="space-4"></div>
                                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                            <div class="inline position-relative">
                                                <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                                    <i class="ace-icon fa fa-circle light-green"></i>
                                                    &nbsp;
                                                    <span class="white">{{ $user->fname.' '.$user->lname }}</span>
                                                </a>

                                                <ul class="align-left dropdown-menu">
                                                    <li class="dropdown-header"> Change Status </li>
                                                    <li>
                                                        <a href="#soe" class="change-status" data-color="purple" data-description="HIRED">
                                                            <i class="ace-icon fa fa-circle purple"></i>
                                                            &nbsp;
                                                            <span class="purple">HIRED</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-6"></div>
                                    <div class="profile-contact-info">
                                        <div class="profile-contact-links align-left">
                                            <a class="btn btn-link">
                                                <i class="ace-icon fa fa-sun-o bigger-120 green"></i>
                                                <label id="soe" class="green">
                                                    HIRED
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
                                            <div class="tab-content no-border padding-5">
                                                <div id="personal_information" class="tab-pane fade">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3 class="lighter block green">Personal Information</h3>
                                                            <div class="profile-user-info">
                                                                <div class="profile-user-info profile-user-info-striped">

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> LASTNAME </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}collname">{{ $user->lname }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> FIRSTNAME </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colfname">{{ $user->fname }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> MIDDLE NAME </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colmname">{{ $user->mname }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> NAME EXTENSION(JR,,SR): </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colname_extension">{{ $user->name_extension }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> DATE OF BIRTH </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio personal_information" id="{{ $user->piId }}coldate_of_birth">{{ $user->date_of_birth }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> PLACE OF BIRTH </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colplace_of_birth">{{ $user->place_of_birth }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> SEX </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio personal_information" id="{{ $user->piId }}colsex">{{ $user->sex }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> CIVIL STATUS </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio personal_information" id="{{ $user->piId }}colcivil_status">{{ $user->civil_status }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> HEIGHT (m) </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colheight">{{ $user->height }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> WEIGHT (kg) </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colweight">{{ $user->weight }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> BLOOD TYPE </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colblood_type">{{ $user->blood_type }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> GSIS ID NO </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colgsis_idno">{{ $user->gsis_idno }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> PAG-IBIG ID NO. </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colpag_ibigno">{{ $user->pag_ibigno }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> SSS NO. </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colsssno">{{ $user->sssno }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> TIN NO. </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}coltin_no">{{ $user->tin_no }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> CITIZENSHIP: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio personal_information" id="{{ $user->piId }}colcitizenship">{{ $user->citizenship }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> RESIDENTIAL ADDRESS: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colresidential_address">{{ $user->residential_address }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> RESIDENTIAL MUNICIPALITY: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colresidential_municipality">{{ $user->residential_municipality }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> RESIDENTIAL PROVINCE: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colresidential_province">{{ $user->residential_province }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> ZIP CODE: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colregion_zip">{{ $user->region_zip }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> TELEPHONE NO: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}coltelno">{{ $user->telno }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> CELL NO: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colcellno">{{ $user->cellno }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> EMAIL ADDRESS: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable personal_information" id="{{ $user->piId }}colemail_address">{{ $user->email_address }}</span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div><!-- /.col -->
                                                    </div><!-- /.row -->

                                                </div><!-- /#personal information -->

                                                <div id="family_background" class="tab-pane fade in active">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3 class="lighter block green">Family Background</h3>
                                                            <div class="profile-user-info">
                                                                <div class="profile-user-info profile-user-info-striped">
                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Spouse Surname:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colsln">{{ $user->sln }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Spouse Firstname:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colsfn">{{ $user->sfn }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Spouse Middlename:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colsmn">{{ $user->smn }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Spouse Name Extension(JR,,SR):</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colsne">{{ $user->sne }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Occupation:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colsoccu">{{ $user->soccu }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Employer/Business Name:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colsbadd">{{ $user->sbadd }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Telephone No:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colstelno">{{ $user->stelno }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <h5 class="lighter block blue">Name of children</h5>
                                                            <div class="profile-user-info">
                                                                <div class="profile-user-info profile-user-info-striped">
                                                                    <div id="children_append">
                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name warning"><b><i>NAME of CHILDREN (Write full name):</i></b></div>
                                                                            <div class="profile-info-value pull-left">
                                                                                <span class="editable_picker"><b><i>DATE OF BIRTH (mm/dd/yyyy)</i></b></span>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="padding-right: 3%;padding-top: 1%">
                                                                <a href="#" class="pull-right red" onclick="addChildren();"><i class="fa fa-plus"></i> Add Children</a>
                                                            </div>

                                                            <h5 class="lighter block blue">Name of parent</h5>
                                                            <div class="profile-user-info">
                                                                <div class="profile-user-info profile-user-info-striped">
                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Father Lastname:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colfln">{{ $user->fln }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Father Firstname:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colffn">{{ $user->ffn }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Father Middle Name:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colfmn">{{ $user->fmn }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Father NameExtension(JR,,SR):</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colfne">{{ $user->fne }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Mother Maidenname:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colmmln">{{ $user->mmln }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Mother Firstname:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colmfn">{{ $user->mfn }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Mother Middle Name:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable family_background" id="{{ $user->piUserid }}colmmn">{{ $user->mmn }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- PARENT -->
                                                            <div class="hr hr-8 dotted"></div>

                                                        </div><!-- /.col -->
                                                    </div><!-- /.row -->
                                                </div><!-- /#family background -->
                                                <div id="educational_background" class="fade tab-pane">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3 class="lighter block green">Educational Background</h3>
                                                            <div class="hr dotted hr-8"></div>
                                                        </div>
                                                    </div>
                                                </div><!-- /#education background -->

                                                <div id="service_eligibility" class="fade tab-pane">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3 class="lighter block green">Civil Service Eligibility</h3>
                                                            <div class="form-group table-responsive">
                                                                <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                                                                    <thead>
                                                                    <tr class="info">
                                                                        <th class="center" rowspan="2">21. CAREER SERVICE/RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES/CSEE BARANGAY ELIGIBILITY/DRIVER'S LICENCE</th>
                                                                        <th class="center" rowspan="2">RATING (if Applicable)</th>
                                                                        <th class="center" rowspan="2">DATE OF EXAMINATION / CONFERMENT</th>
                                                                        <th class="center" rowspan="2">PLACE OF EXAMINATION / CONFERMENT</th>
                                                                        <th class="center" colspan="2">LICENSE (if applicable)</th>
                                                                    </tr>
                                                                    <tr class="info">
                                                                        <th class="center">NUMBER</th>
                                                                        <th class="center">Date of Validity</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="service_append">

                                                                    </tbody>
                                                                </table><br>
                                                                <a href="#" class="pull-right red" onclick="addService()"><i class="fa fa-plus"></i> Add Service Eligibility</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /#Service Eligibility -->

                                                <div id="work_experience" class="fade tab-pane">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3 class="lighter block green">Work Experience</h3>
                                                            <div class="form-group table-responsive">
                                                                <table class="table table-list table-hover table-striped">
                                                                    <thead>
                                                                    <tr class="info">
                                                                        <th class="center" colspan="2">22. INCLUSIVE DATES (mm/dd/yyyy)</th>
                                                                        <th class="center" rowspan="2">POSITION TITLE (Write in full/Do not abbreviate)</th>
                                                                        <th class="center" rowspan="2">DEPARTMENT / AGENCY / OFFICE / COMPANY (Write in full/Do not abrebiate)</th>
                                                                        <th class="center" rowspan="2">MONTHLY SALARY</th>
                                                                        <th class="center" rowspan="2">SALARY/JOB/PAY GRADE(if applicable)(Format *00-0*)/INCREMENT</th>
                                                                        <th class="center" rowspan="2">STATUS OF APPOINTMENT</th>
                                                                        <th class="center" rowspan="2">GOV'T SERVICE(Y/N)</th>
                                                                    </tr>
                                                                    <tr class="info">
                                                                        <th class="center">From</th>
                                                                        <th class="center">To</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="work_append">

                                                                    </tbody>
                                                                </table>
                                                                <a href="#" class="pull-right red" onclick="addWork()"><i class="fa fa-plus"></i> Add Work Experience</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /#Work Experience -->

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
@endsection
@section('js')

    <script>
        jQuery(function($) {

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

            // *** editable avatar *** //
            try {//ie8 throws some harmless exceptions, so let's catch'em

                //first let's add a fake appendChild method for Image element for browsers that have a problem with this
                //because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
                try {
                    document.createElement('IMG').appendChild(document.createElement('B'));
                } catch(e) {
                    Image.prototype.appendChild = function(el){}
                }

                var last_gritter
                $('#avatar').editable({
                    type: 'image',
                    name: 'avatar',
                    value: null,
                    //onblur: 'ignore',  //don't reset or hide editable onblur?!
                    image: {
                        //specify ace file input plugin's options here
                        btn_choose: 'Change Avatar',
                        droppable: true,
                        maxSize: 110000,//~100Kb

                        //and a few extra ones here
                        name: 'avatar',//put the field name here as well, will be used inside the custom plugin
                        on_error : function(error_type) {//on_error function will be called when the selected file has a problem
                            if(last_gritter) $.gritter.remove(last_gritter);
                            if(error_type == 1) {//file format error
                                last_gritter = $.gritter.add({
                                    title: 'File is not an image!',
                                    text: 'Please choose a jpg|gif|png image!',
                                    class_name: 'gritter-error gritter-center'
                                });
                            } else if(error_type == 2) {//file size rror
                                last_gritter = $.gritter.add({
                                    title: 'File too big!',
                                    text: 'Image size should not exceed 100Kb!',
                                    class_name: 'gritter-error gritter-center'
                                });
                            }
                            else {//other error
                            }
                        },
                        on_success : function() {
                            $.gritter.removeAll();
                        }
                    },
                    url: function(params) {
                        // ***UPDATE AVATAR HERE*** //
                        //for a working upload example you can replace the contents of this function with
                        //examples/profile-avatar-update.js

                        var deferred = new $.Deferred

                        var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
                        if(!value || value.length == 0) {
                            deferred.resolve();
                            return deferred.promise();
                        }


                        //dummy upload
                        setTimeout(function(){
                            if("FileReader" in window) {
                                //for browsers that have a thumbnail of selected image
                                var thumb = $('#avatar').next().find('img').data('thumb');
                                if(thumb) $('#avatar').get(0).src = thumb;
                            }

                            deferred.resolve({'status':'OK'});

                            if(last_gritter) $.gritter.remove(last_gritter);
                            last_gritter = $.gritter.add({
                                title: 'Avatar Updated!',
                                text: 'Uploading to server can be easily implemented. A working example is included with the template.',
                                class_name: 'gritter-info gritter-center'
                            });

                        } , parseInt(Math.random() * 800 + 800))

                        return deferred.promise();

                        // ***END OF UPDATE AVATAR HERE*** //
                    },

                    success: function(response, newValue) {
                    }
                })
            }catch(e) {}

            /**
             //let's display edit mode by default?
             var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input at first
             if(blank_image) {
					$('#avatar').editable('show').on('hidden', function(e, reason) {
						if(reason == 'onblur') {
							$('#avatar').editable('show');
							return;
						}
						$('#avatar').off('hidden');
					})
				}
             */

                //another option is using modals
            $('#avatar2').on('click', function(){
                var modal =
                        '<div class="modal fade">\
                          <div class="modal-dialog">\
                           <div class="modal-content">\
                            <div class="modal-header">\
                                <button type="button" class="close" data-dismiss="modal">&times;</button>\
                                <h4 class="blue">Change Avatar</h4>\
                            </div>\
                            \
                            <form class="no-margin">\
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
                    btn_choose:'Click to choose new avatar',
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
                    if(!file.data('ace_input_files')) return false;

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
                        if(thumb) $('#avatar2').get(0).src = thumb;

                        working = false;
                    });


                    setTimeout(function(){
                        deferred.resolve();
                    } , parseInt(Math.random() * 800 + 800));

                    return false;
                });

            });


            //////////////////////////////
            $('#profile-feed-1').ace_scroll({
                height: '250px',
                mouseWheelLock: true,
                alwaysVisible : true
            });

            $('a[ data-original-title]').tooltip();

            $('.easy-pie-chart.percentage').each(function(){
                var barColor = $(this).data('color') || '#555';
                var trackColor = '#E2E2E2';
                var size = parseInt($(this).data('size')) || 72;
                $(this).easyPieChart({
                    barColor: barColor,
                    trackColor: trackColor,
                    scaleColor: false,
                    lineCap: 'butt',
                    lineWidth: parseInt(size/10),
                    animate:false,
                    size: size
                }).css('color', barColor);
            });

            ///////////////////////////////////////////

            //right & left position
            //show the user info on right or left depending on its position
            $('#user-profile-2 .memberdiv').on('mouseenter touchstart', function(){
                var $this = $(this);
                var $parent = $this.closest('.tab-pane');

                var off1 = $parent.offset();
                var w1 = $parent.width();

                var off2 = $this.offset();
                var w2 = $this.width();

                var place = 'left';
                if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) place = 'right';

                $this.find('.popover').removeClass('right left').addClass(place);
            }).on('click', function(e) {
                e.preventDefault();
            });


            ///////////////////////////////////////////
            $('#user-profile-3')
                    .find('input[type=file]').ace_file_input({
                        style:'well',
                        btn_choose:'Change avatar',
                        btn_change:null,
                        no_icon:'ace-icon fa fa-picture-o',
                        thumbnail:'large',
                        droppable:true,

                        allowExt: ['jpg', 'jpeg', 'png', 'gif'],
                        allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
                    })
                    .end().find('button[type=reset]').on(ace.click_event, function(){
                        $('#user-profile-3 input[type=file]').ace_file_input('reset_input');
                    })
                    .end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
                $(this).prev().focus();
            });
            $('.input-mask-phone').mask('(999) 999-9999');

            $('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);


            ////////////////////
            //change profile
            $('[data-toggle="buttons"] .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                $('.user-profile').parent().addClass('hide');
                $('#user-profile-'+which).parent().removeClass('hide');
            });

            /////////////////////////////////////
            $(document).one('ajaxloadstart.page', function(e) {
                //in ajax mode, remove remaining elements before leaving page
                try {
                    $('.editable').editable('destroy');
                } catch(e) {}
                $('[class*=select2]').remove();
            });

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
                        else if(Class.includes('family_background')){
                            json = {
                                "userid" : this.id.split('col')[0],
                                "column" : this.id.split('col')[1],
                                "value" : value,
                                "_token" : "<?php echo csrf_token(); ?>",
                            };
                            url = "{!! asset('updateFamilyBackground') !!}";
                        }

                        $.post(url,json,function(result){
                            console.log(result);
                        });
                    },
                    error: function(errors) {
                        alert('slow internet connection..');
                    }
                });
            });

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
                "date_of_birth": [
                    {value:'Dummy', text:'Dummy'}
                ]
            }];

            $(".editable_radio").each(function(index){
                $('#'+this.id).editable({
                    type: 'radiolist',
                    name: this.id,
                    source: source_radio[0][this.id.split('col')[1]],
                    validate: function(value) {
                        var string = this.className;
                        if(value != null){
                            $("#"+this.id).html(value);
                            var json = {
                                "id" : "<?php echo $user->piId; ?>",
                                "column" : this.id.split('col')[1],
                                "value" : value,
                                "other_country" : $("#other_country").val(),
                                "_token" : "<?php echo csrf_token(); ?>",
                            };
                            var url = "<?php echo asset('updatePersonalInformation'); ?>";
                            $.post(url,json,function(result){
                                console.log(result);
                            });
                        }
                        else if(this.id.split('col')[1] == 'date_of_birth'){
                            var date_picker = $("#"+this.id+"input").val();
                            $("#"+this.id).html(date_picker);
                            var json = {
                                "id" : "<?php echo $user->piId; ?>",
                                "column" : this.id.split('col')[1],
                                "value" : date_picker,
                                "_token" : "<?php echo csrf_token(); ?>",
                            };
                            var url = "<?php echo asset('updatePersonalInformation'); ?>";
                            $.post(url,json,function(result){
                                console.log(result);
                            });
                        }

                    }
                });
            });


        });


        (function($) {
            //global variable
            var todayDate = new Date();
            var month = todayDate.getMonth()+1;
            var day = todayDate.getDate();
            var year = todayDate.getFullYear()-20;
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
                        if(name.split('col')[1] == 'citizenship' || name.split('col')[1] == 'sex' || name.split('col')[1] == 'civil_status'){
                            $label = $('<label class="radio-inline" style="padding-right:10px;padding-top:5px;">')
                                    .append($('<input>', {
                                                type: 'radio',
                                                name:  name,
                                                value: this.sourceData[i].value
                                            }
                                    ));
                            $label.append($('<span>').text(this.sourceData[i].text));
                            // Add radio buttons to template
                            this.$tpl.append($label);
                        }
                    }

                   if(name.split("col")[1] == 'date_of_birth'){
                        var value = $("#"+name).text();
                        if(value == 'Empty')
                           value = month+'/'+day+'/'+year;

                        this.$tpl.append("<input type='text' value='"+value+"' id='" + name + "input"+"' style='margin-right:15px;width:100%'>");
                        $("#"+name+"input").datepicker({
                            showOtherMonths: true,
                            selectOtherMonths: true,
                            autoclose:true,
                            //changeMonth: true,
                            //changeYear: true,
                        });
                   }

                    for(var j = 1; j<= 10; j++){
                        var temp,value,styleInput;
                        if(name.includes('c_id')){
                            if($("#"+name).text() == 'Empty')
                                value = month+'/'+day+'/'+year;
                            else
                                value = $("#"+name).text();

                            temp = name.split('c_id')[0];
                        }
                        else if(name.split('sid')[0].includes('date_of_examination') || name.split('sid')[0].includes('date_of_validity')){
                            if($("#"+name).text() == 'Empty')
                                value = '';
                            else
                                value = $("#"+name).text();

                            temp = name.split('sid')[0];
                        }
                        else {
                            value = month+'/'+day+'/'+year;
                            temp = name;
                        }

                        if(temp == 'childrenValue'+j || temp == 'date_of_examination'+j || temp == 'date_of_validity'+j){
                            if(temp == 'date_of_validity')
                                styleInput = 'margin-right:100px;';

                            this.$tpl.append("<input type='text' value='"+value+"' id='" + name + "input"+"' style='"+styleInput+"width:100%'>");
                            $("#"+name+"input").datepicker({
                                showOtherMonths: true,
                                selectOtherMonths: true,
                                autoclose:true
                            });
                        }
                    }

                    $(function() {
                        $(document).on('click', '.applyBtn', function() {
                            return false;
                        });
                        $(document).on('click', '.input-mini', function(){
                            return false;
                        });
                    });
                    for (var i = 1; i <= 10; i++) {
                        if(name.split('wid')[0] == 'inclusive_dates'+i){
                            var element = $("#"+name);
                            if(element.text() == 'Empty')
                                value = '';
                            else
                                value = element.text();

                            this.$tpl.append("<input type='text' id='" + name.split('wid')[0] + "input" + "' value='"+value+"' style='margin-right:20px;'>");
                        }
                        $("#inclusive_dates" + i + "input").daterangepicker();
                    }

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
                value2input: function(value) {
                    //this.$input.prop('checked', true);
                    $("input[name="+name+"][value='"+$value+"']").prop("checked",true);
                    if($.isArray(value) && value.length) {
                        this.$input.each(function(i, el) {
                            var $el = $(el);
                            // cannot use $.inArray as it performs strict comparison
                            $.each(value, function(j, val) {
                                if($el.val() == val) {
                                    $el.prop('checked', true);
                                }
                            });
                        });
                    }
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

    </script>

@endsection

