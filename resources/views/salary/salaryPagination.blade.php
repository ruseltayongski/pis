<?php
use PIS\Section;
use PIS\Division;
?>
@if(isset($salary_grade) and count($salary_grade) > 0)
    <div class="table-responsive">
        <table id="simple-table" class="table table-bordered table-hover">
            <thead>
            <tr class="info">
                <th>Salary Tranche</th>
                <th>Salary Grade</th>
                <th>Salary Step</th>
                <th>Salary Amount</th>
                <th>Option</th>
            </tr>
            </thead>

            <tbody>
            @foreach($salary_grade as $salary)
                <tr>
                    <td>
                        {{ $salary->salary_tranche }}
                    </td>
                    <td>
                        {{ $salary->salary_grade }}
                    </td>
                    <td>
                        {{ $salary->salary_step }}
                    </td>
                    <td>
                        {{ $salary->salary_amount }}
                    </td>
                    <td class="center">
                        @if(strpos($salary->userid,'no_userid'))
                            NO USERID
                        @else
                            <a href="#" class="red delete" id="">
                                <i class="ace-icon fa fa-trash bigger-180"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $salary_grade->links() }}
@else
    <div class="alert alert-danger" role="alert">Salary grade records are empty.</div>
@endif

<script>
    //user information
    $("a[href='#pis_info']").on('click',function(){
        $('.modal_content').html(loadingState);
        var url = $(this).data('link');
        setTimeout(function(){
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('.modal_content').html(data);
                }
            });
        },700);
    });
</script>