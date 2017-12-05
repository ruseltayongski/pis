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
                                            <a href="#">
                                            <img id="avatar2" class="img-responsive" alt="Alex's Avatar" src="
                                            <?php
                                            if(isset($user->picture)){
                                                echo asset('public/upload_picture').'/'.$user->picture;
                                            } else {
                                                if($user->sex == 'Female')
                                                    echo asset('public/assets_ace/images/avatars/female1.png');
                                                else
                                                    echo asset('public/assets_ace/images/avatars/male1.png');
                                            }
                                            ?>" />
                                            </a>
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
                                                                        <div class="profile-info-name">Division</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_select personal_information" id="{{ $user->piId }}coldivision_id">@if($user->division_id){{ \PIS\Division::find($user->division_id)->description }}@endif</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Section</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_select personal_information" id="{{ $user->piId }}colsection_id">@if($user->section_id){{ \PIS\Section::find($user->section_id)->description }}@endif</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Disbursement Type</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_select personal_information" id="{{ $user->piId }}coldisbursement_type">{{ $user->disbursement_type }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name">Salary Charge</div>
                                                                        <div class="profile-info-value">
                                                                            <span class="editable_select personal_information" id="{{ $user->piId }}colsalary_charge">{{ \PIS\Division::find($user->salary_charge)->description }}</span>
                                                                        </div>
                                                                    </div>

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
                                                                            <span class="editable_radio personal_information" id="{{ $user->piId }}colpdate_of_birth">{{ $user->date_of_birth }}</span>
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

                                                <div id="family_background" class="tab-pane fade">
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
                                                                <div class="profile-user-info profile-user-info-striped" id="children_append">
                                                                    <div class="profile-info-row">
                                                                        <div class="profile-info-name warning"><b><i>NAME of CHILDREN (Write full name):</i></b></div>
                                                                        <div class="profile-info-value pull-left">
                                                                            <span class="editable_picker"><b><i>DATE OF BIRTH (mm/dd/yyyy)</i></b></span>
                                                                        </div>
                                                                    </div>
                                                                    <?php $childrenCount = 0; ?>
                                                                    @foreach($children as $row)
                                                                        <?php $childrenCount++; ?>
                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name editable children" id="{{ 'childrenName'.$childrenCount.'c_id'.$row->id }}colcname">{{ $row->name }}</div>
                                                                            <div class="profile-info-value pull-left">
                                                                                <span class="editable_radio children" id="{{ 'childrenDOB'.$childrenCount.'c_id'.$row->id }}colcdate_of_birth">{{ $row->date_of_birth }}</span>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div style="padding-right: 3%;padding-top: 1%">
                                                                <a href="#" class="pull-right red" id="childrenAdd"><i class="fa fa-plus"></i> Add Children</a>
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
                                                            <?php $education_exist = array(); ?>
                                                            @foreach($educationalBackground as $row)
                                                                <?php $education_exist[] = $row->level; ?>
                                                                <h5 class="lighter block blue">
                                                                    @if(count(\PIS\EducationType::find($row->level)) > 0)
                                                                        {{ \PIS\EducationType::find($row->level)->description }}
                                                                    @endif
                                                                </h5>
                                                                <div class="profile-user-info">
                                                                    <div class="profile-user-info profile-user-info-striped">
                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name">Name of School(Write in full)</div>
                                                                            <div class="profile-info-value">
                                                                                <span class="editable educational_background" id="{{ $row->id }}colname_of_schoollevel{{ $row->level }}">{{ $row->name_of_school }}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name">Education/degree/course(Write in full):</div>
                                                                            <div class="profile-info-value">
                                                                                <span class="editable educational_background" id="{{ $row->id }}coldegree_courselevel{{ $row->level }}">{{ $row->degree_course }}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name">Period of attendance from:</div>
                                                                            <div class="profile-info-value">
                                                                                <span class="editable educational_background" id="{{ $row->id }}colpoa_fromlevel{{ $row->level }}">{{ $row->poa_from }}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name">Period of attendance to::</div>
                                                                            <div class="profile-info-value">
                                                                                <span class="editable educational_background" id="{{ $row->id }}colpoa_tolevel{{ $row->level }}">{{ $row->poa_to }}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name">Highest level/units earned(if not graduated):</div>
                                                                            <div class="profile-info-value">
                                                                                <span class="editable educational_background" id="{{ $row->id }}colunits_earnedlevel{{ $row->level }}">{{ $row->units_earned }}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name">Year Graduated:</div>
                                                                            <div class="profile-info-value">
                                                                                <span class="editable educational_background" id="{{ $row->id }}colyear_graduatedlevel{{ $row->level }}">{{ $row->year_graduated }}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name">Scholarship/academic honors receive:</div>
                                                                            <div class="profile-info-value">
                                                                                <span class="editable educational_background" id="{{ $row->id }}colscholarshiplevel{{ $row->level }}">{{ $row->scholarship }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            @foreach($education_type as $eduType)
                                                                @if(!in_array($eduType->id,$education_exist))
                                                                    <h5 class="lighter block blue">
                                                                        {{ $eduType->description }}
                                                                    </h5>
                                                                    <div class="profile-user-info" >
                                                                        <div class="profile-user-info profile-user-info-striped" id="education{{ str_random(10).date('Y-').$user->id.date('mdHis') }}">
                                                                            <div class="profile-info-row">
                                                                                <div class="profile-info-name">Name of School(Write in full)</div>
                                                                                <div class="profile-info-value">
                                                                                    <span class="editable educational_background" id="{{ 'colname_of_schoollevel'.$eduType->id }}"></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="profile-info-row">
                                                                                <div class="profile-info-name">Education/degree/course(Write in full):</div>
                                                                                <div class="profile-info-value">
                                                                                    <span class="editable educational_background" id="{{ 'coldegree_courselevel'.$eduType->id }}"></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="profile-info-row">
                                                                                <div class="profile-info-name">Period of attendance from:</div>
                                                                                <div class="profile-info-value">
                                                                                    <span class="editable educational_background" id="{{ 'colpoa_fromlevel'.$eduType->id }}"></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="profile-info-row">
                                                                                <div class="profile-info-name">Period of attendance to::</div>
                                                                                <div class="profile-info-value">
                                                                                    <span class="editable educational_background" id="{{ 'colpoa_tolevel'.$eduType->id }}"></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="profile-info-row">
                                                                                <div class="profile-info-name">Highest level/units earned(if not graduated):</div>
                                                                                <div class="profile-info-value">
                                                                                    <span class="editable educational_background" id="{{ 'colunits_earnedlevel'.$eduType->id }}"></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="profile-info-row">
                                                                                <div class="profile-info-name">Year Graduated:</div>
                                                                                <div class="profile-info-value">
                                                                                    <span class="editable educational_background" id="{{ 'colyear_graduatedlevel'.$eduType->id }}"></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="profile-info-row">
                                                                                <div class="profile-info-name">Scholarship/academic honors receive:</div>
                                                                                <div class="profile-info-value">
                                                                                    <span class="editable educational_background" id="{{ 'colscholarshiplevel'.$eduType->id }}"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
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
                                                                        <th class="center" rowspan="2">CAREER SERVICE/RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES/CSEE BARANGAY ELIGIBILITY/DRIVER'S LICENCE</th>
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
                                                                    <tbody id="civil_append">
                                                                    <?php $civilCount = 0; ?>
                                                                    @foreach($civil_eligibility as $row)
                                                                    <?php $civilCount++; ?>
                                                                    <tr id="">
                                                                        <td class="center"><span class="editable civil_eligibility" id="{{ $row->id.'colcareer_service' }}" >{{ $row->career_service }}</span></td>
                                                                        <td class="center"><span class="editable civil_eligibility" id="{{ $row->id.'colrating' }}" >{{ $row->rating }}</span></td>
                                                                        <td class="center"><span class="editable civil_eligibility" id="{{ $row->id.'coldate_of_examination' }}" >{{ $row->date_of_examination }}</span></td>
                                                                        <td><span class="editable civil_eligibility" id="{{ $row->id.'colplace_examination' }}" >{{ $row->place_examination }}</span></td>
                                                                        <td class="center"><span class="editable civil_eligibility" id="{{ $row->id.'collicense_number' }}" >{{ $row->license_number }}</span></td>
                                                                        <td class="center"><span class="editable civil_eligibility" id="{{ $row->id.'coldate_of_validity' }}" >{{ $row->date_of_validity }}</span></td>
                                                                    </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table><br>
                                                                <a href="#" class="pull-right red" id="civilAdd"><i class="fa fa-plus"></i> Add Service Eligibility</a>
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
                                                                        <th class="center" colspan="2">INCLUSIVE DATES (mm/dd/yyyy)</th>
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
                                                                    <?php $workCount = 0; ?>
                                                                    @foreach($work_experience as $row)
                                                                        <?php $workCount++; ?>
                                                                        <tr id="">
                                                                            <td class="center"><span class="editable work_experience" id="{{ $row->id.'coldate_from' }}" >{{ $row->date_from }}</span></td>
                                                                            <td class="center"><span class="editable work_experience" id="{{ $row->id.'coldate_to' }}" >{{ $row->date_to }}</span></td>
                                                                            <td class="center"><span class="editable work_experience" id="{{ $row->id.'colposition_title' }}" >{{ $row->position_title }}</span></td>
                                                                            <td><span class="editable work_experience" id="{{ $row->id.'colcompany' }}" >{{ $row->company }}</span></td>
                                                                            <td class="center"><span class="editable work_experience" id="{{ $row->id.'colmonthly_salary' }}" >{{ $row->monthly_salary }}</span></td>
                                                                            <td class="center"><span class="editable work_experience" id="{{ $row->id.'colsalary_grade' }}" >{{ $row->salary_grade }}</span></td>
                                                                            <td class="center"><span class="editable work_experience" id="{{ $row->id.'colstatus_of_appointment' }}" >{{ $row->status_of_appointment }}</span></td>
                                                                            <td class="center"><span class="editable work_experience" id="{{ $row->id.'colgovernment_service' }}" >{{ $row->government_service }}</span></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <a href="#" class="pull-right red" id="workAdd"><i class="fa fa-plus"></i> Add Work Experience</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /#Work Experience -->

                                                <div id="voluntary_work" class="fade tab-pane">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3 class="lighter block green">Voluntary Work</h3>
                                                            <div class="form-group table-responsive">
                                                                <table class="table table-list table-hover table-striped">
                                                                    <thead>
                                                                    <tr class="info">
                                                                        <th class="center align-middle" rowspan="2">Name & Address of Organization (Write in full)</th>
                                                                        <th class="center align-middle" colspan="2">INCLUSIVE DATES (mm/dd/yyyy)</th>
                                                                        <th class="center align-middle" rowspan="2">Number of Hours</th>
                                                                        <th class="center align-middle" rowspan="2">Position/Nature of Work</th>
                                                                    </tr>
                                                                    <tr class="info">
                                                                        <th class="center">From</th>
                                                                        <th class="center">To</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="voluntary_append">
                                                                    <?php $voluntaryCount = 0; ?>
                                                                    @foreach($voluntary_work as $row)
                                                                        <?php $voluntaryCount++; ?>
                                                                        <tr id="">
                                                                            <td class="center align-middle"><span class="editable voluntary_work" id="voluntary{{ $row->id.'colname_of_organization' }}" >{{ $row->name_of_organization }}</span></td>
                                                                            <td class="center align-middle"><span class="editable voluntary_work" id="voluntary{{ $row->id.'coldate_from' }}" >{{ $row->date_from }}</span></td>
                                                                            <td class="center align-middle"><span class="editable voluntary_work" id="voluntary{{ $row->id.'coldate_to' }}" >{{ $row->date_to }}</span></td>
                                                                            <td class="center align-middle"><span class="editable voluntary_work" id="voluntary{{ $row->id.'colnumber_of_hours' }}" >{{ $row->number_of_hours }}</span></td>
                                                                            <td class="center align-middle"><span class="editable voluntary_work" id="voluntary{{ $row->id.'colnature_of_work' }}" >{{ $row->nature_of_work }}</span></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <a href="#" class="pull-right red" id="voluntaryAdd"><i class="fa fa-plus"></i> Add Voluntary Work</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /#VOLUNTARY WORK -->

                                                <div id="training_program" class="fade tab-pane">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3 class="lighter block green">Training Program</h3>
                                                            <div class="form-group table-responsive">
                                                                <table class="table table-list table-hover table-striped">
                                                                    <thead>
                                                                    <tr class="info">
                                                                        <th class="center align-middle" rowspan="2">Title of Learning & Development Interventions/Training Programs(Write in full)</th>
                                                                        <th class="center align-middle" colspan="2">INCLUSIVE DATES (mm/dd/yyyy)</th>
                                                                        <th class="center align-middle" rowspan="2">Number of Hours</th>
                                                                        <th class="center align-middle" rowspan="2">Type of ID(Managerial/Supervisor/Technical/etc)</th>
                                                                        <th class="center align-middle" rowspan="2">Sponsored By</th>
                                                                    </tr>
                                                                    <tr class="info">
                                                                        <th class="center">From</th>
                                                                        <th class="center">To</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="training_append">
                                                                    <?php $trainingCount = 0; ?>
                                                                    @foreach($training_program as $row)
                                                                        <?php $trainingCount++; ?>
                                                                        <tr id="">
                                                                            <td class="center align-middle"><span class="editable training_program" id="training{{ $row->id.'coltitle_of_learning' }}" >{{ $row->title_of_learning }}</span></td>
                                                                            <td class="center align-middle"><span class="editable training_program" id="training{{ $row->id.'coldate_from' }}" >{{ $row->date_from }}</span></td>
                                                                            <td class="center align-middle"><span class="editable training_program" id="training{{ $row->id.'coldate_to' }}" >{{ $row->date_to }}</span></td>
                                                                            <td class="center align-middle"><span class="editable training_program" id="training{{ $row->id.'colnumber_of_hours' }}" >{{ $row->number_of_hours }}</span></td>
                                                                            <td class="center align-middle"><span class="editable training_program" id="training{{ $row->id.'coltype_of_id' }}" >{{ $row->type_of_id }}</span></td>
                                                                            <td class="center align-middle"><span class="editable training_program" id="training{{ $row->id.'colsponsored_by' }}" >{{ $row->sponsored_by }}</span></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <a href="#" class="pull-right red" id="trainingAdd"><i class="fa fa-plus"></i> Add Training Program</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /#TRAINING PROGRAM -->

                                                <div id="other_information" class="fade tab-pane">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3 class="lighter block green">Other Information</h3>
                                                            <div class="form-group table-responsive">
                                                                <table class="table table-list table-hover table-striped">
                                                                    <thead>
                                                                    <tr class="info">
                                                                        <th class="center align-middle" >Special Skills & Hobbies</th>
                                                                        <th class="center align-middle" >Non-Academic Distinction/Recognition(Write in full)</th>
                                                                        <th class="center align-middle" >Membership in Association/Organinzation(Write in full)</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="other_append">
                                                                    <?php $otherCount = 0; ?>
                                                                    @foreach($other_information as $row)
                                                                        <?php $otherCount++; ?>
                                                                        <tr id="">
                                                                            <td class="center align-middle"><span class="editable other_information" id="other{{ $row->id.'colspecial_skills' }}" >{{ $row->special_skills }}</span></td>
                                                                            <td class="center align-middle"><span class="editable other_information" id="other{{ $row->id.'colrecognition' }}" >{{ $row->recognition }}</span></td>
                                                                            <td class="center align-middle"><span class="editable other_information" id="other{{ $row->id.'colorganization' }}" >{{ $row->organization }}</span></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <a href="#" class="pull-right red" id="otherAdd"><i class="fa fa-plus"></i> Add Training Program</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /#OTHER INFORMATION -->


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

            var childrenCount = "<?php echo $childrenCount; ?>";
            var childrenLimit = "<?php echo $childrenCount; ?>";
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
                    var chilAnimation = childrenName + childrenDOB;
                    event.preventDefault();
                    var childrenAppend =
                            '<div class="profile-info-row" id="'+chilAnimation+'">\
                                <div class="profile-info-name editable children" id="'+childrenName+'"></div>\
                                <div class="profile-info-value pull-left">\
                                    <span class="editable_radio" id="'+childrenDOB+'"></span>\
                                </div>\
                            </div>';
                    $("#children_append").append(childrenAppend);
                    $("#"+chilAnimation).hide().fadeIn();

                    text_editable();
                    editable_radio();


                } else {
                    event.preventDefault();
                    alert('Click column to input children..');
                }

            });


            //CIVIL ELIGIBILITY ADD
            var civilCount = "<?php echo $civilCount; ?>";
            var civilLimit = "<?php echo $civilCount; ?>";
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
                                <td class="center"><span class="editable civil_eligibility" id="'+'no_id'+"<?php echo str_random(10); ?>"+civilCount+'coldate_of_examination"></span></td>\
                                <td><span class="editable civil_eligibility" id="'+'no_id'+"<?php echo str_random(10); ?>"+civilCount+'colplace_examination"></span></td>\
                                <td class="center"><span class="editable civil_eligibility" id="'+'no_id'+"<?php echo str_random(10); ?>"+civilCount+'collicense_number"></span></td>\
                                <td class="center"><span class="editable civil_eligibility" id="'+'no_id'+"<?php echo str_random(10); ?>"+civilCount+'coldate_of_validity"></span></td>\
                            </tr>';
                    $("#civil_append").append(civilAppend);
                    $("#"+civilUnique_row).hide().fadeIn();

                    text_editable();
                    editable_radio();

                } else {
                    event.preventDefault();
                    alert('Click column to input children..');
                }
            });

            //WORK EXPERIENCE ADD
            var workCount = "<?php echo $workCount; ?>";
            $("#workAdd").on('click',function(event){

                workCount++;
                var workUnique_row = workCount+"<?php echo 'work'.str_random(10).date('Y-').$user->id.date('mdHis'); ?>";
                event.preventDefault();

                var workAppend =
                    '<tr id="'+workUnique_row+'">\
                                <td class="center"><span class="editable work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'coldate_from"></span></td>\
                                <td class="center"><span class="editable work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'coldate_to"></span></td>\
                                <td class="center"><span class="editable work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colposition_title"></span></td>\
                                <td><span class="editable work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colcompany"></span></td>\
                                <td class="center"><span class="editable work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colmonthly_salary"></span></td>\
                                <td class="center"><span class="editable work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colsalary_grade"></span></td>\
                                <td class="center"><span class="editable work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colstatus_of_appointment"></span></td>\
                                <td class="center"><span class="editable work_experience" id="'+'no_id'+"<?php echo str_random(10); ?>"+workCount+'colgovernment_service"></span></td>\
                            </tr>';
                $("#work_append").append(workAppend);
                $("#"+workUnique_row).hide().fadeIn();

                text_editable();
                editable_radio();

            });

            //VOLUNTARY WORK ADD
            //note.. carefull sa id unique.. true in where clause. (must have no-id)
            var voluntaryCount = "<?php echo $voluntaryCount; ?>";
            var voluntaryLimit = "<?php echo $voluntaryCount; ?>";
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
                                <td class="center align-middle"><span class="editable voluntary_work" id="'+"voluntaryno_id<?php echo str_random(10); ?>"+voluntaryCount+'coldate_from"></span></td>\
                                <td class="center align-middle"><span class="editable voluntary_work" id="'+"voluntaryno_id<?php echo str_random(10); ?>"+voluntaryCount+'coldate_to"></span></td>\
                                <td class="center align-middle"><span class="editable voluntary_work" id="'+"voluntaryno_id<?php echo str_random(10); ?>"+voluntaryCount+'colnumber_of_hours"></span></td>\
                                <td class="center align-middle"><span class="editable voluntary_work" id="'+"voluntaryno_id<?php echo str_random(10); ?>"+voluntaryCount+'colnature_of_work"></span></td>\
                            </tr>';
                    $("#voluntary_append").append(voluntaryAppend);
                    $("#"+voluntaryUnique_row).hide().fadeIn();

                    text_editable();
                    editable_radio();

                } else {
                    event.preventDefault();
                    alert('Click column to input children..');
                }
            });

            //TRAINING PROGRAM ADD
            //note.. carefull sa id unique.. true in where clause (must have no-id)
            var trainingCount = "<?php echo $trainingCount; ?>";
            $("#trainingAdd").on('click',function(event){

                trainingCount++;
                var trainingUnique_row = trainingCount+"<?php echo 'training'.str_random(10).date('Y-').$user->id.date('mdHis'); ?>";
                event.preventDefault();

                var trainingAppend =
                        '<tr id="'+trainingUnique_row+'">\
                                <td class="center align-middle"><span class="editable training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'coltitle_of_learning"></span></td>\
                                <td class="center align-middle"><span class="editable training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'coldate_from"></span></td>\
                                <td class="center align-middle"><span class="editable training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'coldate_to"></span></td>\
                                <td class="center align-middle"><span class="editable training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'colnumber_of_hours"></span></td>\
                                <td class="center align-middle"><span class="editable training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'coltype_of_id"></span></td>\
                                <td class="center align-middle"><span class="editable training_program" id="'+"trainingno_id<?php echo str_random(10); ?>"+trainingCount+'colsponsored_by"></span></td>\
                            </tr>';
                $("#training_append").append(trainingAppend);
                $("#"+trainingUnique_row).hide().fadeIn();

                text_editable();
                editable_radio();

            });

            //OTHER INFORMATION ADD
            //note.. carefull sa id unique.. true in where clause (must have no-id)
            var otherCount = "<?php echo $otherCount; ?>";
            $("#otherAdd").on('click',function(event){

                otherCount++;
                var otherUnique_row = otherCount+"<?php echo 'other'.str_random(10).date('Y-').$user->id.date('mdHis'); ?>";
                event.preventDefault();

                var otherAppend =
                        '<tr id="'+otherUnique_row+'">\
                                <td class="center align-middle"><span class="editable other_information" id="'+"otherno_id<?php echo str_random(10); ?>"+otherCount+'colspecial_skills"></span></td>\
                                <td class="center align-middle"><span class="editable other_information" id="'+"otherno_id<?php echo str_random(10); ?>"+otherCount+'colrecognition"></span></td>\
                                <td class="center align-middle"><span class="editable other_information" id="'+"otherno_id<?php echo str_random(10); ?>"+otherCount+'colorganization"></span></td>\
                            </tr>';
                $("#other_append").append(otherAppend);
                $("#"+otherUnique_row).hide().fadeIn();

                text_editable();
                editable_radio();

            });

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
                        //maxSize: 110000,//~100Kb

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
                        console.log(response);
                    }
                })
            }catch(e) {}
            //mao ni upload image


            //another option is using modals
            $('#avatar2').on('click', function(){
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
                                console.log(result);
                                last_gritter = $.gritter.add({
                                    title: 'Picture Updated!',
                                    text: 'Uploading to server.. successfully save..',
                                    class_name: 'gritter-info gritter-center',
                                });
                                $('#avatar2').get(0).src = "<?php echo asset('public/upload_picture')?>"+result.split("upload_picture")[1];
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


            text_editable();
            function text_editable(){
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
                                json = {
                                    "id" : this.id.split('col')[0],
                                    "userid": "<?php echo $user->piUserid ?>",
                                    "column" : this.id.split('col')[1].split('level')[0],
                                    "level" : this.id.split('level')[1],
                                    "value" : value,
                                    "unique_row" : $(this).parents(':eq(2)').attr('id'),
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
                            }
                            console.log(json);
                            $.post(url,json,function(result){
                                //console.log(result);
                                if(Class.includes('children')){
                                    childId = result; //get the primary key
                                    console.log(result);
                                }
                            });

                        },
                        error: function(errors) {
                            alert('slow internet connection..');
                        }
                    });
                });
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
                ]
            }];

            var columnId;
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
                            if(value != null){ //personal information sex,citizenship,civil_status
                                $("#"+this.id).html(value);
                                json = {
                                    "id" : "<?php echo $user->piId; ?>",
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "other_country" : $("#other_country").val(),
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "<?php echo asset('updatePersonalInformation'); ?>";
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

                                url = "{!! asset('updateChildren') !!}";

                            }

                            $.post(url,json,function(result){
                                console.log(result);
                                if(columnId == 'cdate_of_birth'){
                                    childId = result; //get the primary key
                                    console.log(result);
                                }
                            });

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

                return  [
                    {
                        "division" : division,
                        "section" : section,
                        "disbursement_type" : [
                            {value: "ATM", text: "ATM"},
                            {value: "CASH_CARD", text: "CASH CARD"},
                            {value: "NO_CARDS", text: "W/O LBP CARDS"},
                            {value: "UNDER_VTF", text: "UNDER VTF"}
                        ]
                        ,
                        "salary_charge" : division
                    }
                ];
            }
            console.log(source_func(6)[0].disbursement_type);
            console.log(source_func(6)[0].section);
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
                        source = source_func("<?php echo $user->salary_charge ?>")[0].salary_charge;
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
                            var json,url;
                            if(string.includes('personal_information')){
                                json = {
                                    "id" : this.id.split('col')[0],
                                    "column" : this.id.split('col')[1],
                                    "value" : value,
                                    "_token" : "<?php echo csrf_token(); ?>",
                                };
                                url = "{!! asset('updatePersonalInformation') !!}";
                            }

                            var id = this.id;
                            $.post(url,json,function(result){
                                console.log(result);
                                if(json.column == 'division_id'){
                                    filter_section(url,value,id);
                                }
                            });
                        },
                        error: function(errors) {
                            alert('slow internet connection..');
                        }
                    });
                });
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

                    if(name.split("colp")[1] == 'date_of_birth' || name.split("colc")[1] == 'date_of_birth'){
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

