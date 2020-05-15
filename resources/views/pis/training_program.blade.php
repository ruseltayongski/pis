<div id="training_program" class="fade tab-pane">
    <div class="row">
        <div class="alert alert-info">
            <i class="ace-icon fa fa-hand-o-right"></i> Note:<br>
            _ _ _ _ _ _ _&nbsp;&nbsp;EDITABLE SYMBOL<br>
            __________ &nbsp;&nbsp;NOT EDITABLE SYMBOL
        </div>
        <h3 class="lighter block green">Training Program</h3>


        <div class="form-group table-responsive">
            <table class="table table-list table-hover table-striped">
                <thead>
                <tr class="info">
                    <th class="center align-middle" rowspan="2">Title of Learning & Development Interventions/Training Programs(Write in full)</th>
                    <th class="center align-middle" colspan="2">INCLUSIVE DATES (mm/dd/yyyy)</th>
                    <th class="center align-middle" rowspan="2">Number of Hours</th>
                    <th class="center align-middle" rowspan="2">Type of ID<br>(Managerial/Supervisor/<br>Technical/etc)</th>
                    <th class="center align-middle" rowspan="2">Sponsored By</th>
                    <th class="center align-middle" rowspan="2">Upload Certificate</th>
                    <th class="center align-middle" rowspan="2">Option</th>
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
                    <tr>
                        <td class="center align-middle"><span class="editable training_program" id="training{{ $row->id.'coltitle_of_learning' }}" >{{ $row->title_of_learning }}</span></td>
                        <td class="center align-middle"><span class="editable_radio training_program" id="training{{ $row->id.'coltdate_from' }}" >{{ $row->date_from }}</span></td>
                        <td class="center align-middle"><span class="editable_radio training_program" id="training{{ $row->id.'coltdate_to' }}" >{{ $row->date_to }}</span></td>
                        <td class="center align-middle"><span class="editable training_program" id="training{{ $row->id.'colnumber_of_hours' }}" >{{ $row->number_of_hours }}</span></td>
                        <td class="center align-middle"><span class="editable training_program" id="training{{ $row->id.'coltype_of_id' }}" >{{ $row->type_of_id }}</span></td>
                        <td class="center align-middle"><span class="editable training_program" id="training{{ $row->id.'colsponsored_by' }}" >{{ $row->sponsored_by }}</span></td>
                        <td class="center align-middle">
                            <span class="editable_certificate training_program" data-link="{{ $row->certificate }}" id="training{{ $row->id.'colcertificate' }}" >
                                @if($row->certificate)
                                    <span class="label label-info label-sm arrowed-in arrowed-in-right">
                                        <span class="inline position-relative">
                                            <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                                <i class="ace-icon fa fa-certificate light-green"></i>
                                                &nbsp;
                                                <span class="white" style="font-size:5.5pt;">View Certificate</span>
                                            </a>
                                        </span>
                                    </span>
                                @else
                                    <a href="#" class="user-title-label dropdown-toggle editable-empty" data-toggle="dropdown">
                                        Empty
                                    </a>
                                @endif
                            </span>
                        </td>
                        <td class="center align-middle"><span class="editable_radio training_program" data-link="{{ $row->certificate }}" id="{{ $row->id.'coltrainingDelete' }}"><i class="fa fa-close"></i></span></td>
                    </tr>
                @endforeach
                <?php Session::put('trainingCount',$trainingCount); ?>
                </tbody>
            </table>
            <a href="#" class="pull-right red" id="trainingAdd"><i class="fa fa-plus"></i> Add Training Program</a>
        </div>
    </div>
</div><!-- /#TRAINING PROGRAM -->