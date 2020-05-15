<div id="other_information" class="fade tab-pane">
    <div class="row">
        <div class="alert alert-info">
            <i class="ace-icon fa fa-hand-o-right"></i> Note:<br>
            _ _ _ _ _ _ _&nbsp;&nbsp;EDITABLE SYMBOL<br>
            __________ &nbsp;&nbsp;NOT EDITABLE SYMBOL
        </div>
        <h3 class="lighter block green">Other Information</h3>
        <div class="form-group table-responsive">
            <table class="table table-list table-hover table-striped">
                <thead>
                <tr class="info">
                    <th class="center align-middle" >Special Skills & Hobbies</th>
                    <th class="center align-middle" >Non-Academic Distinction/Recognition(Write in full)</th>
                    <th class="center align-middle" >Membership in Association/Organinzation(Write in full)</th>
                    <th class="center align-middle" >Option</th>
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
                        <td class="center align-middle"><span class="editable_radio other_information" id="{{ $row->id.'colotherDelete' }}" ><i class="fa fa-close"></i></span></td>
                    </tr>
                @endforeach
                <?php Session::put('otherCount',$otherCount); ?>
                </tbody>
            </table>
            <a href="#" class="pull-right red" id="otherAdd"><i class="fa fa-plus"></i> Add Training Program</a>
        </div>
    </div>
</div><!-- /#OTHER INFORMATION -->