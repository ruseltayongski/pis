<style>
    .select2-container {
        z-index: 2050;
    }
</style>
<div id="signup-box" class="signup-box widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <p class="alert-danger"><i class="ace-icon fa fa-asterisk"></i> (Asterisk) indicates required field </p>
            <form class="form-horizontal form-submit" method="POST" action="{{ asset('/register') }}">
                {{ csrf_field() }}
                <fieldset>
                    <i class="ace-icon fa fa-asterisk red"></i>
                    <select name="designation" class="select2" data-placeholder="Select designation." required>
                        <option value=""></option>
                        @foreach($designation as $row)
                            <option value="{{ $row->id }}">{{ $row->description }}</option>
                        @endforeach
                    </select>
                    <div class="space-6"></div>

                    <i class="ace-icon fa fa-asterisk red"></i>
                    <select name="division" id="division" class="select2" onchange="filter_section($(this))" data-placeholder="Select division." required>
                        <option value=""></option>
                        @foreach($division as $row)
                            <option value="{{ $row->id }}">{{ $row->description }}</option>
                        @endforeach
                    </select>
                    <div class="space-6"></div>

                    <i class="ace-icon fa fa-asterisk red"></i>
                    <select id="section" name="section" class="select2 section" data-placeholder="Select section." required>
                        <option value=""></option>
                    </select>
                    <div class="space-6"></div>

                    <i class="ace-icon fa fa-asterisk red"></i>
                    <select name="disbursement_type" class="select2 disbursement_type" data-placeholder="Select Disbursement Type" required>
                        <option value=""></option>
                        <option value="ATM">ATM</option>
                        <option value="CASH_CARD">CASH CARD</option>
                        <option value="NO_CARDS">W/O LBP CARDS</option>
                        <option value="UNDER_VTF">UNDER VTF</option>
                    </select>
                    <div class="space-6"></div>

                    <i class="ace-icon fa fa-asterisk red"></i>
                    <select name="salary_charge" class="select2 salary_charge" data-placeholder="Select Salary Charge" required>
                        <option value=""></option>
                        @foreach($division as $row)
                            <option value="{{ $row->id }}">{{ $row->description }}</option>
                        @endforeach
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

                    <div class="space-24"></div>
                    <div class="clearfix">
                        <button type="reset" class="width-30 pull-left btn btn-sm" data-dismiss="modal">
                            <i class="ace-icon fa fa-close"></i>
                            <span class="bigger-110">Close</span>
                        </button>

                        <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                            <span class="bigger-110">Register</span>

                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>

    </div><!-- /.widget-body -->
</div><!-- /.signup-box -->

<script type="text/javascript">

    function filter_section(data){

        console.log(data);
        var element =  $('.section');
        element.val('').trigger('change');
        element.html('').select2({data: {id:null, text: null}});
        element.append(
            new Option("","", true, true)
        ).trigger('change');

        $.each(<?php echo $section;?>,function(x,sectionAppend){
            if(data.val() == sectionAppend.division){
                console.log(sectionAppend.description);
                element.append(
                    new Option(sectionAppend.description, sectionAppend.id, true, true)
                ).trigger('change');
            }
        });

    }
    
</script>