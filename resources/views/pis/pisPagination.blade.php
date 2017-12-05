<?php
    use PIS\Section;
    use PIS\Division;
?>
@if(isset($personal_information) and count($personal_information) > 0)
    <div class="table-responsive">
        <table id="simple-table" class="table table-bordered table-hover">
            <thead>
            <tr class="info">
                <th>Employee ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Section / Division</th>
                <th>Sex</th>
                <th>Civil Status</th>
                <th>Options</th>
            </tr>
            </thead>

            <tbody>
            @foreach($personal_information as $user)
                <tr>
                    <td>
                        <a href="#pis_info" role="button" class="green" data-backdrop="static" data-link="{{ asset('pisInfo').'/'.$user->userid }}" data-toggle="modal" ><b class="green">{{ $user->userid }}</b></a>
                    </td>
                    <td>
                        <a href="#pis_info" role="button" data-backdrop="static" data-link="{{ asset('pisInfo').'/'.$user->userid }}" data-toggle="modal" ><b class="blue">@if($user->fname || $user->lname || $user->mname || $user->name_extension) {{ $user->fname.' '.$user->mname.' '.$user->lname.' '.$user->name_extension }} @else <i>NO NAME</i> @endif</b></a>
                    </td>
                    <td>
                        @if($user->designation_id) {{ \PIS\Designation::find($user->designation_id)->description }} @else {{ $user->position }} @endif
                    </td>
                    <td>
                        <label class="orange">@if(isset(Section::find($user->section_id)->description)) {{ Section::find($user->section_id)->description }} @else NO SECTION @endif</label>
                        <small><em>(@if(isset(Division::find($user->division_id)->description)) {{ Division::find($user->division_id)->description }} @else NO DIVISION @endif {{ ')' }}</em></small>
                    </td>
                    <td>
                        {{ $user->sex }}
                    </td>
                    <td>
                        {{ $user->civil_status }}
                    </td>
                    <td class="center">
                        @if(strpos($user->userid,'no_userid'))
                            NO USERID
                        @else
                            <a href="#" class="red delete" id="{{ $type.'delete'.$user->userid }}">
                                <i class="ace-icon fa fa-trash bigger-180"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $personal_information->links() }}
@else
    <div class="alert alert-danger" role="alert">PIS records are empty.</div>
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