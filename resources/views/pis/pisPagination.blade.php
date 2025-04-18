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
                <th>Age</th>
                <th>Civil Status</th>
                <th>Employee Status</th>
                <th>Options</th>
            </tr>
            </thead>

            <tbody>
            @foreach($personal_information as $user)
                <tr>
                    <td>
                        <a href="#pis_info" role="button" class="green" data-backdrop="static" data-id="{{ $user->userid }}" data-toggle="modal" >
                            <b class="green">
                                @if(strpos($user->userid,'no_userid'))
                                    NO USERID
                                @else
                                    {{ $user->userid }}
                                @endif
                            </b>
                        </a>
                    </td>
                    <td><a href="#pis_info" role="button" data-backdrop="static" data-id="{{ $user->userid }}" data-toggle="modal" ><b class="blue">@if($user->fname || $user->lname || $user->mname || $user->name_extension) {{ $user->fname.' '.$user->mname.' '.$user->lname.' '.$user->name_extension }} @else <i>NO NAME</i> @endif</b></a></td>
                    <td>
                        @if($designation = \PIS\Designation::find($user->designation_id)) {{ $designation->description }} @else {{ $user->position }} @endif
                    </td>

                    <td>
                        <label class="orange">@if(isset(Section::find($user->section_id)->description)) {{ Section::find($user->section_id)->description }} @else NO SECTION @endif</label>
                        <small><em>(@if(isset(Division::find($user->division_id)->description)) {{ Division::find($user->division_id)->description }} @else NO DIVISION @endif {{ ')' }}</em></small>
                    </td>
                    <td>
                        {{ $user->sex }}
                    </td>
                    <td>
                        @if($user->date_of_birth)
                            {{ \Carbon\Carbon::parse($user->date_of_birth)->age }}
                        @else
                            <i></i>
                        @endif
                    </td>
                                        <td>
                        {{ $user->civil_status }}
                    </td>
                    <td>
                        @if( $user->job_status == 'Job Order' )
                            <b class="green">{{ $user->job_status }}</b>
                         @else
                            <b class="purple">{{ $user->job_status }}</b>
                        @endif
                    </td>
                    <!-- <td class="center">
                        @if(strpos($user->userid,'no_userid'))
                            NO USERID
                        @else
                            <a href="#" class="red delete" id="{{ $type.'delete'.$user->userid }}">
                                <i class="ace-icon fa fa-trash bigger-180"></i>
                            </a>
                            
                        @endif
                    </td> -->

                <td class="center">
                    @if(strpos($user->userid, 'no_userid'))
                        NO USERID
                    @else
                        <a href="#" class="red delete d-inline mr-2" id="{{ $type.'delete'.$user->userid }}" title="REMOVE">
                            <i class="ace-icon fa fa-trash bigger-150"></i>
                        </a>
                        <a href="#" class="set-inactive d-inline mr-2" id="{{ $type.'inactive'.$user->userid }}" title="INACTIVE">
                            <i class="ace-icon fa fa-eye-slash bigger-150 text-warning"></i>
                        </a>
                        <!-- <a href="#" title="PRINT COE" onclick="alert('Route not yet set up!');" class="d-inline">
                            <i class="ace-icon fa fa-file-pdf-o bigger-150"></i>
                        </a> -->
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
        //var url = "{{ asset('pisInfo') }}"+"/"+$(this).data('id');
        var url = "/pis/pisInfo/" + $(this).data('id');
        console.log("{{ route('pis.info', ['userid' => '']) }}"+"/"+$(this).data('id'));
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