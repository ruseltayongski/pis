<div id="educational_background" class="fade tab-pane">
    <div class="row">
        <div class="alert alert-info">
            <i class="ace-icon fa fa-hand-o-right"></i> Note:<br>
            _ _ _ _ _ _ _&nbsp;&nbsp;EDITABLE SYMBOL<br>
            __________ &nbsp;&nbsp;NOT EDITABLE SYMBOL
        </div>
        <h3 class="lighter block green">Educational Background</h3>
        <div class="form-group table-responsive">
            <table class="table table-list table-hover table-striped">
                <thead>
                <tr class="info">
                    <th class="center">Education Type</th>
                    <th class="center">Name of School<br>(Write in full)</th>
                    <th class="center">Education/degree/course<br>(Write in full)</th>
                    <th class="center">Period of Attendance from</th>
                    <th class="center">Period of Attendance to</th>
                    <th class="center">Highest level/units earned<br>(if not graduated)</th>
                    <th class="center">Year Graduated</th>
                    <th class="center">Scholarship/academic<br> honor receive</th>
                    <th class="center">Option</th>
                </tr>
                </thead>
                <tbody id="education_append">
                <?php
                $education_exist = array();
                $educationalBackgroundRow = 0;
                ?>
                @foreach($educationalBackground as $row)
                    <?php
                    $education_exist[] = $row->level;
                    $educationalBackgroundRow++;
                    ?>
                    <tr id="">
                        <td class="center">
                            <?php
                            if(isset(\PIS\EducationType::find($row->level)->description)){
                                $educationTypeDescription = \PIS\EducationType::find($row->level)->description;
                                $educationTypeId = $row->id.'collevel'.$row->level;
                            } else {
                                $educationTypeDescription = '';
                                $educationTypeId = $row->id.'collevel'.$educationTypeDescription;
                            }
                            ?>
                            <span class="editable_select educational_background" id="{{ $educationTypeId }}">
                                                                                <?php
                                if($educationTypeDescription){
                                    echo $educationTypeDescription;
                                }
                                else {
                                    echo "<i><span class='red'>Empty</span></i>";
                                }
                                ?>
                                                                            </span>
                        </td>
                        <td class="center">
                            <span class="editable educational_background" id="{{ $row->id }}colname_of_school">{{ $row->name_of_school }}</span>
                        </td>
                        <td class="center">
                            <span class="editable educational_background" id="{{ $row->id }}coldegree_course">{{ $row->degree_course }}</span>
                        </td>
                        <td class="center">
                            <span class="editable educational_background" id="{{ $row->id }}colpoa_from">{{ $row->poa_from }}</span>
                        </td>
                        <td class="center">
                            <span class="editable educational_background" id="{{ $row->id }}colpoa_to">{{ $row->poa_to }}</span>
                        </td>
                        <td class="center">
                            <span class="editable educational_background" id="{{ $row->id }}colunits_earned">{{ $row->units_earned }}</span>
                        </td>
                        <td class="center">
                            <span class="editable educational_background" id="{{ $row->id }}colyear_graduated">{{ $row->year_graduated }}</span>
                        </td>
                        <td class="center">
                            <span class="editable educational_background" id="{{ $row->id }}colscholarship">{{ $row->scholarship }}</span>
                        </td>
                        <td class="center">
                            <span class="editable_radio civil_eligibility" id="{{ $row->id.'coleducationDelete' }}"><i class="fa fa-close"></i></span>
                        </td>
                    </tr>
                @endforeach
                @foreach($education_type as $eduType)
                    @if(!in_array($eduType->id,$education_exist))
                        <?php $educationalBackgroundRow++; ?>
                        <tr id="{{ $educationalBackgroundRow.'education'.str_random(10).date('Y-').$user->id.date('mdHis') }}">
                            <td class="center">
                                <span class="editable_select educational_background" id="{{ $educationalBackgroundRow.'collevel'.$eduType->id }}">{{ $eduType->description }}</span>
                            </td>
                            <td class="center">
                                <span class="editable educational_background" id="{{ $educationalBackgroundRow.'colname_of_school' }}"></span>
                            </td>
                            <td class="center">
                                <span class="editable educational_background" id="{{ $educationalBackgroundRow.'coldegree_course' }}"></span>
                            </td>
                            <td class="center">
                                <span class="editable educational_background" id="{{ $educationalBackgroundRow.'colpoa_from' }}"></span>
                            </td>
                            <td class="center">
                                <span class="editable educational_background" id="{{ $educationalBackgroundRow.'colpoa_to' }}"></span>
                            </td>
                            <td class="center">
                                <span class="editable educational_background" id="{{ $educationalBackgroundRow.'colunits_earned' }}"></span>
                            </td>
                            <td class="center">
                                <span class="editable educational_background" id="{{ $educationalBackgroundRow.'colyear_graduated' }}"></span>
                            </td>
                            <td class="center">
                                <span class="editable educational_background" id="{{ $educationalBackgroundRow.'colscholarship' }}"></span>
                            </td>
                            <td class="center">
                                <span class="editable_radio civil_eligibility" id="{{ 'no_id'.$eduType->id.'coleducationDelete' }}"><i class="fa fa-close"></i></span>
                            </td>
                        </tr>
                    @endif
                @endforeach
                <?php Session::put('educationalBackgroundRow',$educationalBackgroundRow); ?>
                </tbody>
            </table>
            <a href="#" class="pull-right red" id="educationAdd"><i class="fa fa-plus"></i> Add Educational Background</a>
        </div>
    </div>
</div><!-- /#education background -->