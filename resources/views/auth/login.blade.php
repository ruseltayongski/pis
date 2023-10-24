@extends('layouts.pis_app')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="space-20"></div>
        <div class="space-20"></div>
        <div class="login-logo">
            <div class="center">
                <h1>
                    <img src="{{ asset('public/img/doh.png') }}" style="width: 10%" />
                    <br />
                    <b style="font-weight:bolder;"><label style="font-size: 17pt;">DOH-CVCHD PIS 4.5</label></b>
                </h1>
            </div>
        </div>
        <div class="login-container login-layout light-login">
            <div class="space-6"></div>
            <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <h4 class="header blue lighter bigger">
                                <i class="ace-icon fa fa-coffee green"></i>
                                Please Enter Your Information
                            </h4>

                            <div class="space-6"></div>

                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <fieldset>
                                    <label class="block clearfix {{ $errors->has('username') ? ' has-error' : '' }}">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="username" class="form-control" value="{{ Session::get('username') }}" placeholder="Username"/>
                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                            <i class="ace-icon fa fa-user"></i>
                                        </span>
                                    </label>

                                    <label class="block clearfix {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <span class="block input-icon input-icon-right">
                                            <input type="password" name="password" class="form-control" placeholder="Password" />
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                            <i class="ace-icon fa fa-lock"></i>
                                        </span>
                                    </label>

                                    @if(session('addEmployee'))
                                        <div class="alert alert-success">
                                            <i class="fa fa-check"></i> {{ session('addEmployee') }}
                                        </div>
                                    @endif

                                    <div class="space"></div>

                                    <div class="clearfix">
                                        <label class="inline">
                                            <input type="checkbox" class="ace" {{ old('remember') ? 'checked' : '' }}/>
                                            <span class="lbl"> Remember Me</span>
                                        </label>

                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                            <i class="ace-icon fa fa-key"></i>
                                            <span class="bigger-110">Login</span>
                                        </button>
                                    </div>

                                    @if(isset($test))
                                        <div class="has-feedback text-center alert-danger">
                                            {{ $test }}
                                        </div>
                                            @endif

                                    <div class="center">
                                        <a href="{{ asset('public/manual/pis_manual.pdf') }}" target="_blank"><h3 class="green">PIS MANUAL</h3></a>
                                    </div>

                                    <div class="space-4"></div>
                                </fieldset>
                            </form>
                        </div><!-- /.widget-main -->

                        <div class="toolbar clearfix">
                            <div>
                                <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                    <i class="ace-icon fa fa-arrow-left"></i>
                                    I forgot my password
                                </a>
                            </div>
                            <!--
                            <div>
                                <a href="{{ asset('/new_employee') }}" class="user-signup-link">
                                    Register
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </div>
                            -->
                        </div>

                    </div><!-- /.widget-body -->
                </div><!-- /.login-box -->

                <div id="forgot-box" class="forgot-box widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <h4 class="header red lighter bigger">
                                <i class="ace-icon fa fa-key"></i>
                                Retrieve Password
                            </h4>

                            <div class="space-6"></div>
                            <p>
                                Enter your email and to receive instructions
                            </p>

                            <form>
                                <fieldset>
                                    <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                <input type="email" class="form-control" placeholder="Email" />
                                                <i class="ace-icon fa fa-envelope"></i>
                                            </span>
                                    </label>

                                    <div class="clearfix">
                                        <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                            <i class="ace-icon fa fa-lightbulb-o"></i>
                                            <span class="bigger-110">Send Me!</span>
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div><!-- /.widget-main -->

                        <div class="toolbar center">
                            <a href="#" data-target="#login-box" class="back-to-login-link">
                                Back to login
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div><!-- /.widget-body -->
                </div><!-- /.forgot-box -->

                <div id="signup-box" class="signup-box widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">

                            <h4 class="header green lighter bigger">
                                <i class="ace-icon fa fa-users blue"></i>
                                New Employee
                            </h4>

                            <div class="space-6"></div>
                            <p> Enter your details to begin: </p>
                            <p class="alert-danger"><i class="ace-icon fa fa-asterisk"></i> (Asterisk) indicates required field </p>

                            <form class="form-horizontal form-submit" method="POST" action="{{ asset('register') }}">
                                {{ csrf_field() }}
                                <fieldset>
                                    <i class="ace-icon fa fa-asterisk red"></i>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="userid" class="form-control" placeholder="ID NO." required/>
                                        </span>
                                    </label>
                                    <p class="alert-warning" id="userid_error"></p>

                                    <i class="ace-icon fa fa-asterisk red"></i>
                                    <select name="designation" class="select2" data-placeholder="Select designation." required>
                                        <option value=""></option>
                                        @foreach($designation as $row)
                                            <option value="{{ $row->id }}">{{ $row->description }}</option>
                                        @endforeach
                                    </select>
                                    <div class="space-6"></div>

                                    <i class="ace-icon fa fa-asterisk red"></i>
                                    <select name="division" onchange="filter_section($(this))"  class="select2" data-placeholder="Select division." required>
                                        <option value=""></option>
                                        @foreach($division as $row)
                                            <option value="{{ $row->id }}">{{ $row->description }}</option>
                                        @endforeach
                                    </select>
                                    <div class="space-6"></div>

                                    <i class="ace-icon fa fa-asterisk red"></i>
                                    <select id="section" name="section" class="select2" style="width: 100%" data-placeholder="Select section." required>
                                        <option value=""></option>
                                    </select>
                                    <div class="space-6"></div>

                                    <i class="ace-icon fa fa-asterisk red"></i>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="fname" class="form-control" placeholder="Firstname" required/>
                                        </span>
                                    </label>

                                    <i class="ace-icon fa fa-asterisk red"></i>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="mname" class="form-control" placeholder="Middlename" required/>
                                        </span>
                                    </label>

                                    <i class="ace-icon fa fa-asterisk red"></i>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="lname" class="form-control" placeholder="Lastname" required/>
                                        </span>
                                    </label>

                                    <i class="ace-icon fa fa-asterisk red"></i>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="address" class="form-control" placeholder="Address" required/>
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="blood_type" class="form-control" placeholder="Blood Type" />
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="height" class="form-control" placeholder="Height" />
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="weight" class="form-control" placeholder="Weight" />
                                        </span>
                                    </label>

                                    <i class="ace-icon fa fa-asterisk red"></i>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="tin_no" class="form-control" placeholder="TIN No." required/>
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="gsis_polno" class="form-control" placeholder="GSIS Policy #" />
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="gsis_idno" class="form-control" placeholder="GSIS ID #" />
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="phicno" class="form-control" placeholder="PhilHealth #" />
                                        </span>
                                    </label>

                                    <i class="ace-icon fa fa-asterisk red"></i>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="date_of_birth" class="form-control" placeholder="Birth Date" required/>
                                        </span>
                                    </label>

                                    <i class="ace-icon fa fa-asterisk red"></i>
                                    <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                <input type="email" name="email" class="form-control" placeholder="Email" required/>
                                            </span>
                                    </label>

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

                                    <label class="block">
                                        <input type="checkbox" class="ace" />
                                            <span class="lbl">
                                                I accept the
                                                <a href="#">User Agreement</a>
                                            </span>
                                    </label>

                                    <div class="space-24"></div>

                                    <div class="clearfix">
                                        <button type="reset" class="width-30 pull-left btn btn-sm">
                                            <i class="ace-icon fa fa-refresh"></i>
                                            <span class="bigger-110">Reset</span>
                                        </button>

                                        <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                                            <span class="bigger-110">Register</span>

                                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                        <div class="toolbar center">
                            <a href="#" data-target="#login-box" class="back-to-login-link">
                                <i class="ace-icon fa fa-arrow-left"></i>
                                Back to login
                            </a>
                        </div>
                    </div><!-- /.widget-body -->
                </div><!-- /.signup-box -->
                @if(session()->has('passwordChange'))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i> {{ session()->get('passwordChange') }}
                    </div>
                @endif
            </div><!-- /.position-relative -->

        </div>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('js')

    <script type="text/javascript">
        // $('.select2').select2({
        //     width: "100%",
        // });

        // function filter_section(data){
        //     var element =  $('#section');
        //     element.val('').trigger('change');
        //     element.html('').select2({data: {id:null, text: null}});
        //     element.append(
        //             new Option("","", true, true)
        //     ).trigger('change');

        //     $.each(<?php echo $section;?>,function(x,section){
        //         if(data.val() == section.division){
        //             element.append(
        //                     new Option(section.description, section.id, true, true)
        //             ).trigger('change');
        //         }
        //     });
        // }

        // jQuery(function($) {

        //     var userid_flag = false;
        //     $("input[name='userid']").on("keyup",function(e){
        //         e.preventDefault();
        //         var element = $("input[name='userid']");
        //         var userid = element.val();
        //         $.post("<?php echo asset('userid_trapping')?>", { "userid": element.val(), "_token": "<?php echo csrf_token(); ?>" }, function(result){
        //             if(result != ''){
        //                 $("#userid_error").html('ID NO : '+userid+' is already exist in the database.');
        //                 userid_flag = true;
        //             } else {
        //                 $("#userid_error").html('');
        //                 userid_flag = false;
        //             }
        //         })

        //     });

        //     $('.form-submit').on('submit',function(){
        //         if(userid_flag){
        //             alert('ID NO already exist in the database.');
        //             $("input[name='userid']").val('');
        //             $("input[name='userid']").focus();
        //             return false;
        //         }
        //     });

        //     $(document).on('click', '.toolbar a[data-target]', function(e) {
        //         e.preventDefault();
        //         var target = $(this).data('target');
        //         $('.widget-box.visible').removeClass('visible');//hide others
        //         $(target).addClass('visible');//show target
        //     });
        // });

        // //you don't need this, just used for changing background
        // jQuery(function($) {
        //     $('#btn-login-dark').on('click', function(e) {
        //         $('body').attr('class', 'login-layout');
        //         $('#id-text2').attr('class', 'white');
        //         $('#id-company-text').attr('class', 'blue');

        //         e.preventDefault();
        //     });
        //     $('#btn-login-light').on('click', function(e) {
        //         $('body').attr('class', 'login-layout light-login');
        //         $('#id-text2').attr('class', 'grey');
        //         $('#id-company-text').attr('class', 'blue');

        //         e.preventDefault();
        //     });
        //     $('#btn-login-blur').on('click', function(e) {
        //         $('body').attr('class', 'login-layout blur-login');
        //         $('#id-text2').attr('class', 'white');
        //         $('#id-company-text').attr('class', 'light-blue');

        //         e.preventDefault();
        //     });

        // });
    </script>

@endsection
