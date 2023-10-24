<div id="survey" class="fade tab-pane">
    <div class="row">
        <h3 class="lighter block green">Survey</h3>
        <div class="widget-box transparent">
            <div class="widget-body">
                <div class="widget-main">
                    <div id="profile-feed-1" class="profile-feed">
                        <div class="row">
                            <div class="profile-activity">
                                <div>
                                    <i class="pull-left thumbicon fa fa-pencil-square-o btn-blue no-hover"></i>
                                    Are you related by consanguinity or affinity to the appointing or recommending authority, or to the
                                    chief of bureau or office or to the person who has immediate supervision over you in the Office,
                                    Bureau or Department where you will be apppointed,
                                </div>
                                <div class="margin-left-50">
                                    <b class="purple">
                                        a. within the third degree?
                                    </b>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="orange editable_radio survey" id="{{ $user->piUserid }}colconsanguinity_a">{{ $user->consanguinity_a }}</span>
                                </div>
                                <div class="margin-left-50">
                                    <b class="purple">
                                        b. within the fourth degree (for Local Government Unit - Career Employees)?
                                    </b>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="orange editable_radio survey" id="{{ $user->piUserid }}colconsanguinity_b">{{ $user->consanguinity_b }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="profile-activity">
                                <i class="pull-left thumbicon fa fa-pencil-square-o btn-blue no-hover"></i>
                                <div>
                                    <b class="purple">
                                        a. Have you ever been found guilty of any administrative offense?
                                    </b>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="orange editable_radio survey" id="{{ $user->piUserid }}coloffense_a">{{ $user->offense_a }}</span>
                                </div>
                                <div>
                                    <b class="purple">
                                        b. Have you been criminally charged before any court?
                                    </b>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="orange editable_radio survey" id="{{ $user->piUserid }}coloffense_b">{{ $user->offense_b }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="profile-activity">
                                <div>
                                    <i class="pull-left thumbicon fa fa-pencil-square-o btn-blue no-hover"></i>
                                    <b class="purple">
                                        Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?
                                    </b>
                                    <div class="space-1"></div>
                                    <span class="orange editable_radio survey" id="{{ $user->piUserid }}colconvicted">{{ $user->convicted }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="profile-activity">
                                <div>
                                    <i class="pull-left thumbicon fa fa-pencil-square-o btn-blue no-hover"></i>
                                    <b class="purple">
                                        Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?
                                    </b>
                                    <div class="space-1"></div>
                                    <span class="orange editable_radio survey margin-left-50" id="{{ $user->piUserid }}colseparated">{{ $user->separated }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="profile-activity">
                                <i class="pull-left thumbicon fa fa-pencil-square-o btn-blue no-hover"></i>
                                <div>
                                    <b class="purple">
                                        a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?
                                    </b>
                                    &nbsp;&nbsp;&nbsp;
                                    <div class="space-1"></div>
                                    <span class="orange editable_radio survey" id="{{ $user->piUserid }}colgovernment_a">{{ $user->government_a }}</span>
                                </div>
                                <div class="margin-left-50">
                                    <b class="purple">
                                        b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?
                                    </b>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="orange editable_radio survey" id="{{ $user->piUserid }}colgovernment_b">{{ $user->government_b }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="profile-activity">
                                <div>
                                    <i class="pull-left thumbicon fa fa-pencil-square-o btn-blue no-hover"></i>
                                    <b class="purple">
                                        Have you acquired the status of an immigrant or permanent resident of another country?
                                    </b>
                                    <div class="space-1"></div>
                                    <span class="orange editable_radio survey" id="{{ $user->piUserid }}colimmigrant">{{ $user->immigrant }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="profile-activity">
                                <div>
                                    <i class="pull-left thumbicon fa fa-pencil-square-o btn-blue no-hover"></i>
                                    Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
                                </div>
                                <div class="margin-left-50">
                                    <b class="purple">
                                        a. Are you a member of any indigenous group?
                                    </b>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="orange editable_radio survey" id="{{ $user->piUserid }}colindigenous_a">{{ $user->indigenous_a }}</span>
                                </div>
                                <div class="margin-left-50">
                                    <b class="purple">
                                        b. Are you a person with disability?
                                    </b>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="orange editable_radio survey" id="{{ $user->piUserid }}colindigenous_b">{{ $user->indigenous_b }}</span>
                                </div>
                                <div class="margin-left-50">
                                    <b class="purple">
                                        c. Are you a solo parent?
                                    </b>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="orange editable_radio survey" id="{{ $user->piUserid }}colindigenous_c">{{ $user->indigenous_c }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h5 class="lighter block blue">REFERENCES <small class="red">(Person not related by consanguinity or affinity to applicant/appointee)</small></h5>
        <div class="form-group table-responsive">
            <table class="table table-list table-hover table-striped">
                <thead>
                <tr class="info">
                    <th width="40%">NAME</th>
                    <th width="30%">ADDRESS</th>
                    <th width="30%">TEL/CELL NO</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $reference_name = ["reference_name_a","reference_name_b","reference_name_c"];
                $reference_address = ["reference_address_a","reference_address_b","reference_address_c"];
                $reference_tel = ["reference_tel_a","reference_tel_b","reference_tel_c"];

                // foreach(range(0,2) as $index){
                //     if(isset($reference_name)) {
                //     $new = $reference_name[$index];    
                //     echo $user->$new;
                //     }
                // }
                ?>
                @foreach(range(0,2) as $index)
                   <tr>
                        @if(isset($reference_name))
                            <?php $name = $reference_name[$index]; ?>
                                <td><span class="editable survey" id="{{ $user->piUserid }}col{{ $reference_name[$index] }}">{{ $user->$name }}</span></td>
                        @endif
                        @if(isset($reference_address))
                            <?php $address = $reference_address[$index]; ?>    
                                <td><span class="editable survey" id="{{ $user->piUserid }}col{{ $reference_address[$index]}}">{{ $user->$address }}</span></td>
                        @endif
                        @if(isset($reference_tel))
                            <?php $tel = $reference_tel[$index]; ?>  
                                <td><span class="editable survey" id="{{ $user->piUserid }}col{{ $reference_tel[$index]}}">{{ $user->$tel }}</span></td>
                        @endif
                    </tr> 
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <h5 class="lighter block blue">Government Issued ID <small class="red">(i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.) PLEASE INDICATE ID Number and Date of Issuance)</small></h5>
        <div class="form-group table-responsive">
            <table class="table table-list table-hover table-striped">
                <thead>
                <tr class="info">
                    <th>Government Issued ID</th>
                    <th>ID/License/Passport No</th>
                    <th>Place of Issuance</th>
                    <th>Date of Issuance</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><span class="editable survey" id="{{ $user->piUserid }}colgovernment_id">{{ $user->government_id }}</span></td>
                    <td><span class="editable survey" id="{{ $user->piUserid }}colpassport_no">{{ $user->passport_no }}</span></td>
                    <td><span class="editable survey" id="{{ $user->piUserid }}colplace_insurance">{{ $user->place_insurance }}</span></td>
                    <td><span class="editable survey" id="{{ $user->piUserid }}coldate_insurance">{{ $user->date_insurance }}</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div><!-- /#SURVEY-->