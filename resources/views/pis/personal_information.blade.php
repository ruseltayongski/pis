<div id="personal_information" class="tab-pane fade in active row">
    <div class="alert alert-info">
        <i class="ace-icon fa fa-hand-o-right"></i> Note:<br>
        _ _ _ _ _ _ _&nbsp;&nbsp;EDITABLE SYMBOL<br>
        __________ &nbsp;&nbsp;NOT EDITABLE SYMBOL
    </div>
    <h3 class="lighter block green">Personal Information</h3>
    <div class="profile-user-info-row">
        <div class="profile-user-info-row profile-user-info-striped">


            <div class="profile-info-row">
                <div class="profile-info-name">Field Status</div>
                <div class="profile-info-value">
                    <span class="editable_select personal_information" id="{{ $user->piId }}colfield_status">
                        <?php
                            try{
                                if($user->field_status){
                                    echo '<b><u>'.$user->field_status.'</u></b>';
                                }
                                else {
                                    echo "<i><span class='red'>Empty</span></i>";
                                }
                            }catch(Exception $e){
                                echo $e.message();
                            }
                        ?>  
                    </span>
                </div>
            </div> 

            <div class="profile-info-row">
                <div class="profile-info-name">Designation</div>
                <div class="profile-info-value">
                    <span class="editable_select personal_information" id="{{ $user->piId }}coldesignation_id"><?php if(isset(\PIS\Designation::find($user->designation_id)->description)) echo \PIS\Designation::find($user->designation_id)->description; else echo 'NO DESIGNATION' ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name">Job Status</div>
                <div class="profile-info-value">
                    <span class="@if( Auth::user()->usertype ) editable_select @endif personal_information" id="{{ $user->piId }}coljob_status">
                        <?php
                        if(!Auth::user()->usertype && !$user->job_status)
                            echo "<span class='red'>Please go to hr to update your job status</span>";
                        else {
                            if($user->job_status){
                                echo '<b><u>'.$user->job_status.'</u></b>';
                            }
                            else {
                                echo "<i><span class='red'>Empty</span></i>";
                            }
                        }
                        ?>
                    </span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name">Division</div>
                <div class="profile-info-value">
                    <span class="editable_select personal_information" id="{{ $user->piId }}coldivision_id">@if($user->division_id){{ \PIS\Division::find($user->division_id)->description }}@endif</span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name">Section</div>
                <div class="profile-info-value">
                    <span class="editable_select personal_information" id="{{ $user->piId }}colsection_id">@if(isset(\PIS\Section::find($user->section_id)->description)){{ \PIS\Section::find($user->section_id)->description }}@endif</span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name">Disbursement Type</div>
                <div class="profile-info-value">
                    <span class="editable_select personal_information" id="{{ $user->piId }}coldisbursement_type">
                        <?php
                        if($user->disbursement_type == 'CASH_CARD')
                            echo 'CASH CARD';
                        elseif ($user->disbursement_type == 'NO_CARDS')
                            echo 'W/O LBP CARDS';
                        elseif ($user->disbursement_type == 'UNDER_VTF')
                            echo 'UNDER VTF';
                        else
                            echo $user->disbursement_type;
                        ?>
                    </span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name">@if( Auth::user()->usertype )<small>value of salary charge will change when you change the job status </small> - @endif Salary Charge</div>
                <div class="profile-info-value">
                    <span class="@if( Auth::user()->usertype ) editable_select @endif personal_information" id="{{ $user->piId }}colsalary_charge">
                        <?php
                        if(!Auth::user()->usertype && !$user->salary_charge)
                            echo "<span class='red'>Please go to hr to update your salary charge</span>";
                        else {
                            if($user->salary_charge){
                                echo '<b><u>'.$user->salary_charge.'</u></b>';
                            }
                            else {
                                echo "<i><span class='red'>Empty</span></i>";
                            }
                        }
                        ?>
                    </span>
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
                <div class="profile-info-name"> LBP ACCOUNT NUMBER</div>
                <div class="profile-info-value">
                    <span class="<?php if(Auth::user()->usertype && Auth::user()->username == "0007")  echo 'editable'; else echo ''; ?> personal_information" id="{{ $user->piId }}colaccount_number">
                        <?php
                        if(Auth::user()->usertype && Auth::user()->username == "0007"){
                            if($user->account_number){
                                echo '<b><u>'.$user->account_number.'</u></b>';
                            }
                            else {
                                echo "<i><span class='red'>Empty</span></i>";
                            }
                        }
                        else{
                            echo "<span class='red'>Please go to cashier section to update your account number</span>";
                        }
                        ?>
                    </span>
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
                <div class="profile-info-name"> PHIC NO. </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colphicno">{{ $user->phicno }}</span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> CITIZENSHIP: </div>
                <div class="profile-info-value">
                    <span class="editable_radio personal_information" id="{{ $user->piId }}colcitizenship">{{ $user->citizenship }}</span>
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

    <h3 class="lighter block blue">Residential Address</h3>
    <div class="row">
        <div class="profile-user-info profile-user-info-striped">

            <div class="profile-info-row">
                <div class="profile-info-name"> House/Block/Lot No: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colRHouseNo">{{ $user->RHouseNo }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Street: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colRStreet">{{ $user->RStreet }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Sitio: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colRSitio">{{ $user->Rsitio }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Subdivision/Village: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colRSubdivision">{{ $user->RSubdivision }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Barangay: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colRBarangay">{{ $user->RBarangay }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> City / Municipality: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colRMunicipality">{{ $user->RMunicipality }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Province: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colRProvince">{{ $user->RProvince }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Zip Code: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colRZip_code">{{ $user->RZip_code }}</span>
                </div>
            </div>

        </div>
    </div>

    <h3 class="lighter block blue">Permanent Address</h3>
    <div class="row">
        <div class="profile-user-info profile-user-info-striped">

            <div class="profile-info-row">
                <div class="profile-info-name"> House/Block/Lot No: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colPHouseNo">{{ $user->PHouseNo }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Street: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colPStreet">{{ $user->PStreet }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Sitio: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colPSitio">{{ $user->Psitio }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Subdivision/Village: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colPSubdivision">{{ $user->PSubdivision }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Barangay: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colPBarangay">{{ $user->PBarangay }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> City / Municipality: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colPMunicipality">{{ $user->PMunicipality }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Province: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colPProvince">{{ $user->PProvince }}</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Zip Code: </div>
                <div class="profile-info-value">
                    <span class="editable personal_information" id="{{ $user->piId }}colPZip_code">{{ $user->PZip_code }}</span>
                </div>
            </div>

        </div>
    </div>
</div><!-- /#personal information -->