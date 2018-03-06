<?php
use PIS\Section;
use PIS\Division;
?>
<html>
<div class="table-responsive">
    <table id="simple-table" class="table table-bordered table-hover">
        <thead>
        <tr class="info">
            <th>Employee ID</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Section / Division</th>
            <th>Job Status</th>
            <th>System Created</th>
        </tr>
        </thead>

        <tbody>
        @foreach($personal_information as $user)
            <tr>
                <td>
                    {{ $user->userid }}
                </td>
                <td>
                    @if($user->fname || $user->lname || $user->mname || $user->name_extension) {{ $user->fname.' '.$user->lname.' '.$user->name_extension }} @else <i>NO NAME</i> @endif
                </td>
                <td>
                    @if($user->designation_id) {{ \PIS\Designation::find($user->designation_id)->description }} @else {{ $user->position }} @endif
                </td>
                <td>
                    <label class="orange">@if(isset(Section::find($user->section_id)->description)) {{ Section::find($user->section_id)->description }} @else NO SECTION @endif</label>
                    <small><em>(@if(isset(Division::find($user->division_id)->description)) {{ Division::find($user->division_id)->description }} @else NO DIVISION @endif {{ ')' }}</em></small>
                </td>
                <td><small>Job Order</small></td>
                <td><small>{{ $user->remarks }}</small></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</html>