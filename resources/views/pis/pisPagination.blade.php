@if(isset($personal_information) and count($personal_information) > 0)
    <div class="table-responsive">
        <table id="simple-table" class="table table-bordered table-hover">
            <thead>
            <tr class="info">
                <th>Name</th>
                <th>Userid</th>
                <th>Position</th>
                <th>Residential Address</th>
                <th>Sex</th>
                <th>Civil Status</th>
            </tr>
            </thead>

            <tbody>
            @foreach($personal_information as $user)
                <tr>
                    <td>
                        <a href="#pis_info" role="button" class="green" data-backdrop="static" data-userid="{{ $user->fname.' '.$user->mname.' '.$user->lname.' '.$user->name_extension }}" data-link="{{ asset('pisInfo').'/'.$user->id }}" data-toggle="modal" ><b class="green">{{ $user->fname.' '.$user->mname.' '.$user->lname.' '.$user->name_extension }}</b></a>
                    </td>
                    <td>
                        {{ $user->userid }}
                    </td>
                    <td>
                        {{ $user->position }}
                    </td>
                    <td>
                        {{ $user->residential_address }}
                    </td>
                    <td>
                        {{ $user->sex }}
                    </td>
                    <td>
                        {{ $user->civil_status }}
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