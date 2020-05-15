<div id="family_background" class="tab-pane fade">
    <div class="row">
        <div class="alert alert-info">
            <i class="ace-icon fa fa-hand-o-right"></i> Note:<br>
            _ _ _ _ _ _ _&nbsp;&nbsp;EDITABLE SYMBOL<br>
            __________ &nbsp;&nbsp;NOT EDITABLE SYMBOL
        </div>
        <h3 class="lighter block green">Family Background</h3>
        <div class="profile-user-info-row row">
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
                    <div class="profile-info-name">Business Name:</div>
                    <div class="profile-info-value">
                        <span class="editable family_background" id="{{ $user->piUserid }}colsbadd">{{ $user->sbadd }}</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name">Business Address:</div>
                    <div class="profile-info-value">
                        <span class="editable family_background" id="{{ $user->piUserid }}colsbname">{{ $user->sbname }}</span>
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
        <div class="profile-user-info-row row">
            <div class="profile-user-info profile-user-info-striped" id="children_append">
                <div class="profile-info-row">
                    <div class="profile-info-name warning"><b><i>NAME of CHILDREN (Write full name):</i></b></div>
                    <div class="profile-info-value pull-left">
                        <span class="editable_picker"><b><i>DATE OF BIRTH (mm/dd/yyyy)</i></b></span>
                    </div>
                    <div class="profile-info-value pull-right">
                        <b><i>Options</i></b>
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
                        <div class="pull-right" style="margin-right:5%;">
                            <span class="editable_radio children" id="{{ 'c_id'.$row->id.'colchildrenDelete' }}"><i class="fa fa-close"></i></span>
                        </div>
                    </div>
                @endforeach
                <?php Session::put('childrenCount',$childrenCount) ?>
            </div>
        </div>
        <div style="padding-right: 3%;padding-top: 1%">
            <a href="#" class="pull-right red" id="childrenAdd"><i class="fa fa-plus"></i> Add Children</a>
        </div>

        <h5 class="lighter block blue">Name of parent</h5>
        <div class="profile-user-info-row row">
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
                    <div class="profile-info-name">Mother Surname:</div>
                    <div class="profile-info-value">
                        <span class="editable family_background" id="{{ $user->piUserid }}colms">{{ $user->ms }}</span>
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
    </div><!-- /.row -->
</div><!-- /#family background -->