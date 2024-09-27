<div id="work_experience" class="fade tab-pane">
    <div class="row">
        <div class="alert alert-info">
            <i class="ace-icon fa fa-hand-o-right"></i> Note:<br>
            _ _ _ _ _ _ _&nbsp;&nbsp;EDITABLE SYMBOL<br>
            __________ &nbsp;&nbsp;NOT EDITABLE SYMBOL
        </div>
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
                    <th class="center" rowspan="2">Option</th>
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
                        <td class="center"><span class="editable_radio work_experience" id="{{ $row->id.'coldate_from' }}" >{{ $row->date_from }}</span></td>
                        <td class="center td_workDateto"><span class="editable_radio work_experience" id="{{ $row->id.'coldate_to' }}" >{{ $row->date_to }}</span></td>
                        <td class="center"><span class="editable work_experience" id="{{ $row->id.'colposition_title' }}" >{{ $row->position_title }}</span></td>
                        <td><span class="editable work_experience" id="{{ $row->id.'colcompany' }}" >{{ $row->company }}</span></td>
                        <td class="center">
                            <span class="<?php if(Auth::user()->usertype)echo 'editable'; ?> blue work_experience" id="{{ $row->id.'colmonthly_salary' }}" >
                                @if($row->salary_grade)
                                    <b><u>{{ $row->monthly_salary }}</u></b>
                                @elseif(!Auth::user()->usertype && !$row->salary_grade)
                                    <?php echo '<span class="red">'.'Please contact hr to update your monthly salary'.'</span>' ?>
                                @endif
                            </span>
                        </td>
                        <td class="center">
                            <span class="<?php if(Auth::user()->usertype) echo 'editable_radio'; else echo '';?> work_experience" id="{{ $row->id.'colsalary_grade' }}" >
                                <?php
                                if(Auth::user()->usertype)
                                    echo $row->salary_grade;
                                else{
                                    if($row->salary_grade)
                                        echo '<b><u>'.$row->salary_grade.'</u></b>';
                                    else
                                        echo '<span class="red">'.'Please go to hr to update your salary grade'.'</p>';
                                }
                                ?>
                            </span>
                        </td>
                        <td class="center"><span class="editable_select work_experience" id="{{ $row->id.'colstatus_of_appointment' }}" >{{ $row->status_of_appointment }}</span></td>
                        <td class="center"><span class="editable_radio work_experience" id="{{ $row->id.'colgovernment_service' }}" >{{ $row->government_service }}</span></td>
                            @if($row->date_to != "Present")
                             <td class="center"><span class="editable_radio work_experience" id="{{ $row->id.'colworkDelete' }}"><i class="fa fa-close"></i></span></td>
                            @endif
                    </tr>
                @endforeach
                <?php Session::put('workCount',$workCount) ?>
                </tbody>
            </table>
                <a href="#" class="pull-right red" id="workAdd"><i class="fa fa-plus"></i> Add Work Experience</a>
        </div>
    </div>
</div><!-- /#Work Experience -->
<script type="text/javascript">
    
</script>