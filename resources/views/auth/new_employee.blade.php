@extends('layouts.pis_app')

@section('content')
    <style>
        input::-webkit-input-placeholder {
            font-size: 13px;
            line-height: 4;
        }
    </style>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="space-10"></div>
            <div class=" login-layout light-login">
                <div class="space-6"></div>
                <div class="position-relative">
                    <div id="login-box" class="login-box visible widget-box no-border">
                        <div class="widget-body">
                            <div class="widget-main form-group">
                                <div class="login-logo">
                                    <div class="center">
                                        <div class="col-sm-12">
                                            <h1>
                                                <img src="{{ asset('public/img/doh.png') }}" style="width: 15%"/>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="header green lighter bigger">
                                    <i class="ace-icon fa fa-users blue"></i>
                                    Personal Information System - Registration
                                </h4>
                                <div class="space-6"></div>
                                <form class="form-horizontal form-submit" method="POST" action="{{ asset('register') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="1" name="user_status">
                                    <input type="hidden" value="Active" name="employee_status">
                                    <fieldset>
                                        <div class="space-6"></div>
                                        <p class="purple">Employee Information (Required)</p>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select name="region" class="select2" onchange="filterUserid($(this))" data-placeholder="Select Work Region.">
                                                    <option value="{{ session('region') }}">{{ session('region') ? "Region ".explode('_',session('region'))[1] : '' }}</option>
                                                    @for($i=7;$i<=8;$i++)
                                                        @if('region_'.$i != session('region') )
                                                            <option value="region_{{ $i }}">Region {{ $i }}</option>
                                                        @endif
                                                    @endfor
                                                </select>
                                                @if ($errors->has('region'))
                                                    <small class="red"><b>{{ $errors->first('region') }}</b></small>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <select name="field_status" class="select2" data-placeholder="Select Work Field Status. " >
                                                    <?php $field_personnel = ["Office Personnel","HRH"]; ?>
                                                    <option value="{{ session('field_status') }}">{{ session('field_status') }}</option>
                                                    @for($i=0; $i<count($field_personnel); $i++)
                                                        @if($field_personnel[$i] != session('field_personnel') )
                                                            <option value="{{ $field_personnel[$i] }}">{{ $field_personnel[$i] }}</option>
                                                        @endif
                                                    @endfor
                                                </select>
                                                @if ($errors->has('field_status'))
                                                    <small class="red"><b>{{ $errors->first('field_status') }}</b></small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="space-6"></div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="block clearfix">
                                                    <input type="text" id="inputWarning" name="fname" value="{{ session('fname') }}" placeholder="Firstname" class="width-100" />
                                                    @if ($errors->has('fname'))
                                                        <small class="red"><b>{{ $errors->first('fname') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="block clearfix">
                                                    <input type="text" value="{{ session('mname') }}" name="mname" class="form-control" placeholder="Middlename" />
                                                    @if ($errors->has('mname'))
                                                        <small class="red"><b>{{ $errors->first('mname') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="block clearfix">
                                                    <input type="text" value="{{ session('lname') }}" name="lname" class="form-control" placeholder="Lastname" />
                                                    @if ($errors->has('lname'))
                                                        <small class="red"><b>{{ $errors->first('lname') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="block clearfix">
                                                    <input type="number" id="userid" name="userid" value="{{ session('userid') ? session('userid') : str_pad($last_userid7, 4, '0', STR_PAD_LEFT) }}" placeholder="Userid" class="width-100"/>
                                                    @if ($errors->has('userid'))
                                                        <small class="red"><b>{{ $errors->first('userid') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="sched_id" class="select2" data-placeholder="Select Work Schedule." >
                                                    @if(session('sched_id'))
                                                        <option value="{{ session('sched_id') }}">{{ \PIS\WorkSched::find(session('sched_id'))->description }}</option>
                                                    @else
                                                        <option value=""></option>
                                                    @endif
                                                    @foreach($sched as $row)
                                                        <option value="{{ $row->id }}">{{ $row->description }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('sched_id'))
                                                    <small class="red"><b>{{ $errors->first('sched_id') }}</b></small>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="job_status" class="select2" data-placeholder="Select Job Status" >
                                                    @if(session('job_status'))
                                                        @if(session('job_status') == 'Job Order')
                                                            <option value="Job Order">Job Order</option>
                                                            <option value="Permanent">Permanent</option>
                                                        @else
                                                            <option value="Permanent">Permanent</option>
                                                            <option value="Job Order">Job Order</option>
                                                        @endif
                                                    @else
                                                    <option value=""></option>
                                                    <option value="Job Order">Job Order</option>
                                                    <option value="Permanent">Permanent</option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('job_status'))
                                                    <small class="red"><b>{{ $errors->first('job_status') }}</b></small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-sm-4">
                                                <select name="designation_id" class="select2" data-placeholder="Select designation." >
                                                    @if( session('designation_id') )
                                                    <option value="{{ session('designation_id') }}">{{ \PIS\Designation::find(session('designation_id'))->description }}</option>
                                                    @else
                                                    <option value=""></option>
                                                    @endif
                                                    @foreach($designation as $row)
                                                        <option value="{{ $row->id }}">{{ $row->description }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('designation_id'))
                                                    <small class="red"><b>{{ $errors->first('designation_id') }}</b></small>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="division_id" onchange="filter_section($(this))"  class="select2" data-placeholder="Select division." >
                                                    @if( session('division_id') )
                                                        <option value="{{ session('division_id') }}">{{ \PIS\Division::find(session('division_id'))->description }}</option>
                                                    @else
                                                        <option value=""></option>
                                                    @endif
                                                    @foreach($division as $row)
                                                        <option value="{{ $row->id }}">{{ $row->description }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('division_id'))
                                                    <small class="red"><b>{{ $errors->first('division_id') }}</b></small>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="section_id" id="section" class="select2" style="width: 100%" data-placeholder="Select section." >
                                                    @if( session('section_id') )
                                                        <option value="{{ session('section_id') }}">{{ \PIS\Section::find(session('section_id'))->description }}</option>
                                                        @foreach(\PIS\Section::where('division',session('division_id'))->get() as $row)
                                                            <option value="{{ $row->id }}">{{ $row->description }}</option>
                                                        @endforeach
                                                    @else
                                                        <option value=""></option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('section_id'))
                                                    <small class="red"><b>{{ $errors->first('section_id') }}</b></small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="space-6"></div>
                                        <p> Other Information (Optional)</p>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input value="{{ session('date_of_birth') ? date('m/d/Y',strtotime(session('date_of_birth'))) : '' }}" name="date_of_birth" placeholder="Date of birth" class="form-control" type="text" onfocus="(this.type='date')" />
                                                        <i class="ace-icon fa fa-calendar"></i>
                                                    </span>
                                                    @if ($errors->has('date_of_birth'))
                                                        <small class="red"><b>{{ $errors->first('date_of_birth') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="blood_type" value="{{ session('blood_type') }}" class="form-control" placeholder="Blood Type" />
                                                    </span>
                                                    @if ($errors->has('blood_type'))
                                                        <small class="red"><b>{{ $errors->first('blood_type') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="height" value="{{ session('height') }}" class="form-control" placeholder="Height" />
                                                    </span>
                                                    @if ($errors->has('height'))
                                                        <small class="red"><b>{{ $errors->first('height') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="weight" value="{{ session('weight') }}" class="form-control" placeholder="Weight" />
                                                    </span>
                                                    @if ($errors->has('weight'))
                                                        <small class="red"><b>{{ $errors->first('weight') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>

                                        <div class="space-6"></div>
                                        <p>Government ID (Optional)</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="tin_no" value="{{ session('tin_no') }}" class="form-control" placeholder="TIN No." />
                                                    </span>
                                                    @if ($errors->has('tin_no'))
                                                        <small class="red"><b>{{ $errors->first('tin_no') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="phic_no" value="{{ session('phic_no') }}" class="form-control" placeholder="PhilHealth #" />
                                                    </span>
                                                    @if ($errors->has('phic_no'))
                                                        <small class="red"><b>{{ $errors->first('phic_no') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="gsis_pol" value="{{ session('gsis_pol') }}" class="form-control" placeholder="GSIS Policy #" />
                                                    </span>
                                                    @if ($errors->has('gsis_pol'))
                                                        <small class="red"><b>{{ $errors->first('gsis_pol') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="gsis_idno" value="{{ session('gsis_idno') }}" class="form-control" placeholder="GSIS ID #" />
                                                    </span>
                                                    @if ($errors->has('gsis_idno'))
                                                        <small class="red"><b>{{ $errors->first('gsis_idno') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>

                                        <div class="space-6"></div>
                                        <p>Residential Address (Optional)</p>
                                        <div class="row">
                                            <label class="block clearfix col-sm-4">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" name="r_barangay" value="{{ session('r_barangay') }}" class="form-control" placeholder="Barangay" />
                                                </span>
                                                @if ($errors->has('r_barangay'))
                                                    <small class="red"><b>{{ $errors->first('r_barangay') }}</b></small>
                                                @endif
                                            </label>
                                            <label class="block clearfix col-sm-4">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" name="r_municipality" value="{{ session('r_municipality') }}" class="form-control" placeholder="Municipality" />
                                                </span>
                                                @if ($errors->has('r_municipality'))
                                                    <small class="red"><b>{{ $errors->first('r_municipality') }}</b></small>
                                                @endif
                                            </label>
                                            <label class="block clearfix col-sm-4">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" name="r_province" value="{{ session('r_province') }}" class="form-control" placeholder="Province" />
                                                </span>
                                                @if ($errors->has('r_province'))
                                                    <small class="red"><b>{{ $errors->first('r_province') }}</b></small>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="block clearfix col-sm-3">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" name="rhouse_no" value="{{ session('rhouse_no') }}" class="form-control" placeholder="House Number" />
                                                </span>
                                                @if ($errors->has('rhouse_no'))
                                                    <small class="red"><b>{{ $errors->first('rhouse_no') }}</b></small>
                                                @endif
                                            </label>
                                            <label class="block clearfix col-sm-3">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" name="r_street" value="{{ session('r_street') }}" class="form-control" placeholder="Street" />
                                                </span>
                                                @if ($errors->has('r_street'))
                                                    <small class="red"><b>{{ $errors->first('r_street') }}</b></small>
                                                @endif
                                            </label>
                                            <label class="block clearfix col-sm-3">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" name="r_subdivision" value="{{ session('r_subdivision') }}" class="form-control" placeholder="Subdivision" />
                                                </span>
                                                @if ($errors->has('r_subdivision'))
                                                    <small class="red"><b>{{ $errors->first('r_subdivision') }}</b></small>
                                                @endif
                                            </label>
                                            <label class="block clearfix col-sm-3">
                                                <input type="number" name="rzip_code" value="{{ session('rzip_code') }}" class="form-control" placeholder="Zip Code" />
                                                @if ($errors->has('rzip_code'))
                                                    <small class="red"><b>{{ $errors->first('rzip_code') }}</b></small>
                                                @endif
                                            </label>
                                        </div>

                                        <div class="space-6"></div>
                                        <p> In Case of Emergency, please notify (Optional)</p>
                                        <div class="row">
                                            <label class="block clearfix col-sm-4">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" name="case_name" value="{{ session('case_name') }}" class="form-control" placeholder="Name" />
                                                </span>
                                                @if ($errors->has('case_name'))
                                                    <small class="red"><b>{{ $errors->first('case_name') }}</b></small>
                                                @endif
                                            </label>
                                            <label class="block clearfix col-sm-4">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" name="case_address" value="{{ session('case_address') }}" class="form-control" placeholder="Address" />
                                                </span>
                                                @if ($errors->has('case_address'))
                                                    <small class="red"><b>{{ $errors->first('case_address') }}</b></small>
                                                @endif
                                            </label>
                                            <label class="block clearfix col-sm-4">
                                                <span class="block input-icon input-icon-right">
                                                        <input type="text" name="case_contact" value="{{ session('case_contact') }}" class="form-control" placeholder="Contact #" />
                                                </span>
                                                @if ($errors->has('case_contact'))
                                                    <small class="red"><b>{{ $errors->first('case_contact') }}</b></small>
                                                @endif
                                            </label>
                                        </div>

                                        <div class="row center">
                                            <div class="col-md-4 ">
                                                <div class="social-or-login center">
                                                    <span class="bigger-110">Captcha Validation</span>
                                                </div>
                                                <div class="space-6"></div>
                                                {!! '<p>' . captcha_img() . '</p>' !!}
                                                <input type="text" name="captcha" class="width-100" placeholder="PLEASE RETYPE THE CODE ABOVE">
                                                @if ($errors->has('captcha'))
                                                    <small class="red"><b>{{ $errors->first('captcha') }}</b></small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="space-18"></div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <button type="reset" class="width-100 btn btn-sm">
                                                    <i class="ace-icon fa fa-refresh"></i>
                                                    <span class="bigger-110">Reset</span>
                                                </button>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="submit" class="width-100 btn btn-sm btn-success">
                                                    <span class="bigger-110">Register</span>
                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>

                            <div class="toolbar clearfix">
                                <div>
                                    <a href="{{ asset('/') }}" class="forgot-password-link">
                                        <i class="ace-icon fa fa-arrow-left"></i>
                                        Back to login
                                    </a>
                                </div>
                            </div>
                        </div><!-- /.widget-body -->

                    </div>

                </div><!-- /.position-relative -->
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('js')

    <script type="text/javascript">
        $('.select2').select2({
            width: "100%",
        });

        $("#date_of_birth").datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose:true,
            changeMonth: true,
            changeYear: true,
        });

        function filter_section(data){
            var element =  $('#section');
            element.val('').trigger('change');
            element.html('').select2({data: {id:null, text: null}});
            element.append(
                new Option("","", true, true)
            ).trigger('change');

            section_id = data.val();
            $.each(<?php echo $section;?>,function(x,section){
                if(section_id == section.division){
                    element.append(
                        new Option(section.description, section.id, true, true)
                    ).trigger('change');
                }
            });
        }

        var userid7 = "<?php echo str_pad($last_userid7, 4, '0', STR_PAD_LEFT); ?>";
        var userid8 = "<?php echo str_pad($last_userid8, 7, '0', STR_PAD_LEFT); ?>";
        
        function filterUserid(data){
            if(data.val() == 'region_8'){
                $("#userid").val(userid8);
            } else {
                $("#userid").val(userid7);
            }
        }


    </script>

@endsection
