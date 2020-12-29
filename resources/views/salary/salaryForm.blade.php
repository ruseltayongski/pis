<style>
    .select2-selection__clear{
        margin-right: 10%;
    }
</style>
<div id="signup-box" class="signup-box widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <form class="form-horizontal form-submit" method="POST" action="{{ asset('/salaryAdd') }}">
                {{ csrf_field() }}
                <fieldset>

                    <input type="text" class="form-control" name="salary_tranche" value="{{ $tranche }} Tranche" readonly>
                    <div class="space-6"></div>

                    <select name="salary_grade" class="select2" data-placeholder="Select Salary Grade" required>
                        <option value=""></option>
                        @foreach(range(1,33) as $index)
                            <option value="{{ $index }}">{{ $index }}</option>
                        @endforeach
                    </select>
                    <div class="space-6"></div>

                    <select name="salary_step" class="select2" data-placeholder="Select Salary Step" required>
                        <option value=""></option>
                        @foreach(range(1,8) as $index)
                            <option value="{{ $index }}">{{ $index }}</option>
                        @endforeach
                    </select>
                    <div class="space-6"></div>

                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="number" name="salary_amount" class="form-control" placeholder="Salary Amount" required/>
                            <i class="ace-icon fa fa-money"></i>
                        </span>
                    </label>

                    <div class="space-24"></div>
                    <div class="clearfix">
                        <button type="reset" class="width-30 pull-left btn btn-sm" data-dismiss="modal">
                            <i class="ace-icon fa fa-close"></i>
                            <span class="bigger-110">Close</span>
                        </button>

                        <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                            <span class="bigger-110">Submit</span>

                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>

    </div><!-- /.widget-body -->
</div><!-- /.signup-box -->

<script type="text/javascript">

</script>