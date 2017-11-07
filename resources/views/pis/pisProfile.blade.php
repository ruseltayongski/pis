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
        .editable-empty{
            color: black;
        }
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
                            <li >
                                <a data-toggle="tab" href="#educational_background">
                                    <i class="blue ace-icon fa fa-rss bigger-120"></i>
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
                                    <i class="purple ace-icon fa fa-briefcase bigger-120"></i>
                                    Voluntary Work
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#training_program">
                                    <i class="green ace-icon fa fa-briefcase bigger-120"></i>
                                    Training Program
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#other_information">
                                    <i class="orange ace-icon fa fa-briefcase bigger-120"></i>
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
                                                <div id="personal_information" class="tab-pane fade in active">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3 class="lighter block green">Personal Information</h3>
                                                            <div class="profile-user-info">
                                                                <div class="profile-user-info profile-user-info-striped">

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> LASTNAME </div>
                                                                        <div class="profile-info-value">
                                                                            <span id="lname" class="editable">{{ $user->lname }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> FIRSTNAME </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="fname">{{ $user->fname }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> MIDDLE NAME </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="mname">{{ $user->mname }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> NAME EXTENSION(JR,,SR): </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_select" id="name_extension">{{ $user->name_extension }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> DATE OF BIRTH </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_datepicker" id="date_of_birth">{{ $user->date_of_birth }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> PLACE OF BIRTH </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="place_of_birth">{{ $user->place_of_birth }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> SEX </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio" id="sex">{{ $user->sex }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> CIVIL STATUS </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio" id="civil_status">{{ $user->civil_status }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> HEIGHT (m) </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio" id="height">{{ $user->height }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> WEIGHT (kg) </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio" id="weight">{{ $user->weight }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> BLOOD TYPE </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio" id="blood_type">{{ $user->blood_type }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> GSIS ID NO </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio" id="gsis_idno">{{ $user->gsis_idno }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> PAG-IBIG ID NO. </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio" id="pag_ibigno">{{ $user->pag_ibigno }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> SSS NO. </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio" id="sssno">{{ $user->sssno }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> TIN NO. </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio" id="tin_no">{{ $user->tin_no }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> CITIZENSHIP: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_radio" id="citizenship">{{ $user->citizenship }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> RESIDENTIAL ADDRESS: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="residential_address">{{ $user->residential_address }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> RESIDENTIAL MUNICIPALITY: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="residential_municipality">{{ $user->residential_municipality }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> RESIDENTIAL PROVINCE: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="residential_province">{{ $user->province }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> ZIP CODE: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="zip_code">{{ $user->region_zip }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> TELEPHONE NO: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="telno">{{ $user->telno }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> CELL NO: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="cellno">{{ $user->cellno }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name"> EMAIL ADDRESS: </div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="email_address">{{ $user->email_address }}</span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div><!-- /.col -->
                                                    </div><!-- /.row -->

                                                </div><!-- /#personal information -->

                                                <div id="family_background" class="tab-pane fade">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3 class="lighter block green">Family Background</h3>
                                                            <div class="profile-user-info">
                                                                <div class="profile-user-info profile-user-info-striped">
                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Spouse Surname:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="spouse_lname"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Spouse Firstname:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="spouse_fname"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Spouse Middlename:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="spouse_mname"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Spouse Name Extension(JR,,SR):</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_select" id="spouse_nextension"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Occupation:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="spouse_occupation"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Employer/Business Name:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="spouse_business_name"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Telephone No:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="spouse_telephone_no"></span>
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
                                                                            <span class="editable" id="father_lname"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Father Firstname:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="father_fname"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Father Middle Name:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="father_mname"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Name Extension(JR,,SR):</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_select" id="father_nextension"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Mother Maidenname:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="mother_lname"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Mother Firstname:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="mother_fname"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Mother Middle Name:</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable" id="mother_mname"></span>
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

@endsection

