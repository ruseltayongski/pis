@extends('layouts.pis_app')

@section('content')
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
                                                <img src="{{ asset('public/img/logo.png') }}" />
                                                <br>
                                                <b>DOHROH7&nbsp;</b>PIS VERSION 2.1
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="header green lighter bigger">
                                    <i class="ace-icon fa fa-users blue"></i>
                                    Registration
                                </h4>
                                <div class="space-6"></div>
                                <form class="form-horizontal form-submit" method="POST" action="{{ asset('register') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ 'PIS'.uniqid().date('mdyhis').'no_userid' }}" name="userid"/>
                                    <input type="hidden" value="1" name="user_status">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" id="inputWarning" name="fname" value="{{ session('fname') }}" placeholder="Firstname" class="width-100" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                    @if ($errors->has('fname'))
                                                        <small class="red"><b>{{ $errors->first('fname') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" value="{{ session('mname') }}" name="mname" class="form-control" placeholder="Middlename" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                    @if ($errors->has('mname'))
                                                        <small class="red"><b>{{ $errors->first('mname') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" value="{{ session('lname') }}" name="lname" class="form-control" placeholder="Lastname" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                    @if ($errors->has('lname'))
                                                        <small class="red"><b>{{ $errors->first('lname') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="date_of_birth" id="date_of_birth" value="<?php if(session('date_of_birth')) echo session('date_of_birth'); else echo date('m/d/Y', strtotime('-20 years'));?>" class="form-control" placeholder="Birth Date" />
                                                    </span>
                                                    @if ($errors->has('date_of_birth'))
                                                        <small class="red"><b>{{ $errors->first('date_of_birth') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" value="{{ session('email_address') }}" name="email_address" class="form-control" placeholder="Email" />
                                                    </span>
                                                    @if ($errors->has('email_address'))
                                                        <small class="red"><b>{{ $errors->first('email_address') }}</b></small>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                        <div class="space-4"></div>

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
                                                    @else
                                                        <option value=""></option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('section_id'))
                                                    <small class="red"><b>{{ $errors->first('section_id') }}</b></small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="space-8"></div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="residential_address" class="form-control" placeholder="Address"/>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="blood_type" class="form-control" placeholder="Blood Type" />
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="height" class="form-control" placeholder="Height" />
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="weight" class="form-control" placeholder="Weight" />
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="tin_no" class="form-control" placeholder="TIN No." />
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="phicno" class="form-control" placeholder="PhilHealth #" />
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="gsis_polno" class="form-control" placeholder="GSIS Policy #" />
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="gsis_idno" class="form-control" placeholder="GSIS ID #" />
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="space-6"></div>
                                        <p> In Case of Emergency, please notify: </p>

                                        <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                <input type="text" name="case_name" class="form-control" placeholder="Name" />
                                            </span>
                                        </label>

                                        <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                <input type="text" name="case_address" class="form-control" placeholder="Address" />
                                            </span>
                                        </label>

                                        <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                    <input type="text" name="case_contact" class="form-control" placeholder="Contact #" />
                                            </span>
                                        </label>

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

            $.each(<?php echo $section;?>,function(x,section){
                if(data.val() == section.division){
                    element.append(
                        new Option(section.description, section.id, true, true)
                    ).trigger('change');
                }
            });
        }

    </script>

@endsection
