<div id="voluntary_work" class="fade tab-pane">
    <div class="row">
        <div class="alert alert-info">
            <i class="ace-icon fa fa-hand-o-right"></i> Note:<br>
            _ _ _ _ _ _ _&nbsp;&nbsp;EDITABLE SYMBOL<br>
            __________ &nbsp;&nbsp;NOT EDITABLE SYMBOL
        </div>
        <h3 class="lighter block green">Voluntary Work</h3>
        <div class="form-group table-responsive">
            <table class="table table-list table-hover table-striped">
                <thead>
                <tr class="info">
                    <th class="center align-middle" rowspan="2">Name & Address of Organization (Write in full)</th>
                    <th class="center align-middle" colspan="2">INCLUSIVE DATES (mm/dd/yyyy)</th>
                    <th class="center align-middle" rowspan="2">Number of Hours</th>
                    <th class="center align-middle" rowspan="2">Position/Nature of Work</th>
                    <th class="center align-middile" rowspan="2">Option</th>
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
                        <td class="center align-middle"><span class="editable_radio voluntary_work" id="voluntary{{ $row->id.'colvdate_from' }}" >{{ $row->date_from }}</span></td>
                        <td class="center align-middle"><span class="editable_radio voluntary_work" id="voluntary{{ $row->id.'colvdate_to' }}" >{{ $row->date_to }}</span></td>
                        <td class="center align-middle"><span class="editable voluntary_work" id="voluntary{{ $row->id.'colnumber_of_hours' }}" >{{ $row->number_of_hours }}</span></td>
                        <td class="center align-middle"><span class="editable voluntary_work" id="voluntary{{ $row->id.'colnature_of_work' }}" >{{ $row->nature_of_work }}</span></td>
                        <td class="center"><span class="editable_radio voluntary_work" id="{{ $row->id.'colvoluntaryDelete' }}"><i class="fa fa-close"></i></span></td>
                    </tr>
                @endforeach
                <?php Session::put('voluntaryCount',$voluntaryCount); ?>
                </tbody>
            </table>
            <a href="#" class="pull-right red" id="voluntaryAdd"><i class="fa fa-plus"></i> Add Voluntary Work</a>
        </div>
    </div>
</div><!-- /#VOLUNTARY WORK -->