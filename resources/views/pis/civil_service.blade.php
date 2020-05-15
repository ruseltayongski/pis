<div id="service_eligibility" class="fade tab-pane">
    <div class="row">
        <div class="alert alert-info">
            <i class="ace-icon fa fa-hand-o-right"></i> Note:<br>
            _ _ _ _ _ _ _&nbsp;&nbsp;EDITABLE SYMBOL<br>
            __________ &nbsp;&nbsp;NOT EDITABLE SYMBOL
        </div>
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
                    <th class="center" rowspan="2">Option</th>
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
                        <td class="center"><span class="editable_radio civil_eligibility" id="{{ $row->id.'coldate_of_examination' }}" >{{ $row->date_of_examination }}</span></td>
                        <td><span class="editable civil_eligibility" id="{{ $row->id.'colplace_examination' }}" >{{ $row->place_examination }}</span></td>
                        <td class="center"><span class="editable civil_eligibility" id="{{ $row->id.'collicense_number' }}" >{{ $row->license_number }}</span></td>
                        <td class="center"><span class="editable civil_eligibility" id="{{ $row->id.'coldate_of_validity' }}" >{{ $row->date_of_validity }}</span></td>
                        <td class="center"><span class="editable_radio civil_eligibility" id="{{ $row->id.'colcivilDelete' }}"><i class="fa fa-close"></i></span></td>
                    </tr>
                @endforeach
                <?php Session::put('civilCount',$civilCount) ?>
                </tbody>
            </table><br>
            <a href="#" class="pull-right red" id="civilAdd"><i class="fa fa-plus"></i> Add Service Eligibility</a>
        </div>
    </div>
</div><!-- /#Service Eligibility -->
