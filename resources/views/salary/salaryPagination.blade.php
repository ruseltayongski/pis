@if(isset($salary_grade) and count($salary_grade) > 0)
    <div class="table-responsive">
        <table id="simple-table" class="table table-bordered table-hover">
            <thead>
            <tr class="info">
                <th>Salary Tranche</th>
                <th>Salary Grade / Salary Step</th>
                <th>Salary Amount</th>
                <th>Option</th>
            </tr>
            </thead>

            <tbody>
            @foreach($salary_grade as $salary)
                <tr>
                    <td>
                        <b class="green">{{ $salary->salary_tranche }}</b>
                    </td>
                    <td>
                        <b class="orange">{{ $salary->salary_grade }}-{{ $salary->salary_step }}</b>
                    </td>
                    <td>
                        <b class="blue">{{ $salary->salary_amount }}</b>
                    </td>
                    <td class="center" width="5%">
                        <a href="#" class="red delete" id="{{ $tranche.'delete'.$salary->id }}">
                            <i class="ace-icon fa fa-trash bigger-180"></i>
                        </a>
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