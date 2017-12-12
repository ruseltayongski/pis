    <?php
        $tranche = ["Second","Third","Fourth"];
    ?>
    <select name="salary_grade" id="salary_tranche" class="form-control" style="width: 100%" required>
        <option value="">Select Tranche</option>
        @foreach($tranche as $trancheIndex)
            <option value="{{ $trancheIndex }}">{{ $trancheIndex }}</option>
        @endforeach
    </select>
    <div class="space-6"></div>
    <select name="salary_grade" id="salary_grade" class="form-control" style="width: 100%" required>
        <option value="">Select Salary Grade</option>
        @foreach(range(1,33) as $salaryGradeIndex)
            <option value="{{ $salaryGradeIndex }}">{{ $salaryGradeIndex }}</option>
        @endforeach
    </select>
    <div class="space-6"></div>
    <select name="salary_step" id="salary_step" class="form-control" style="width: 100%" required>
        <option value="">Select Salary Step</option>
        @foreach(range(1,8) as $salaryStepIndex)
            <option value="{{ $salaryStepIndex }}">{{ $salaryStepIndex }}</option>
        @endforeach
    </select>

    <script type="text/javascript">
        $('.select2').css('width','100%').select2({allowClear:true});
    </script>