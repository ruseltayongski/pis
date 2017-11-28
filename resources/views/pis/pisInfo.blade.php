<div class="modal-body">

    @if(strpos($user->userid,'no_userid'))
     <div class="align-center">
         <div class="info">
             <h3 class="lighter block green">{{ $user->fname.' '.$user->mname.' '.$user->lname.' '.$user->name_extension }}</h3>
             <div class="desc">{{ $user->position }}</div>
             <div class="desc">{{ $user->residential_address }}</div>
             <div class="desc">{{ $user->sex }}</div>
             <div class="desc">{{ $user->civil_status }}</div>
         </div>
         <div class="space-6"></div>
         <label class="block clearfix">
             <span class="block input-icon input-icon-right">
                 <input type="text" name="userid" class="form-control" placeholder="EMPLOYEE ID" required/>
                 <i class="ace-icon fa fa-eye"></i>
             </span>
         </label>
     </div>
    @else
    <div class="align-center">
        <div class="info">
            <h3 class="lighter block green">{{ $user->fname.' '.$user->mname.' '.$user->lname.' '.$user->name_extension }}</h3>
            <div class="desc">{{ $user->position }}</div>
            <div class="desc">{{ $user->residential_address }}</div>
            <div class="desc">{{ $user->sex }}</div>
            <div class="desc">{{ $user->civil_status }}</div>
        </div>
    </div>
    @endif

</div>

<div class="modal-footer no-margin-top">
    @if(strpos($user->userid,'no_userid'))
        <a href="{{ asset('pisProfile').'/'.$user->userid }}" class="btn btn-sm btn-success">
            <i class="ace-icon fa fa-send"></i>
            Add Employee ID
        </a>
        <a href="{{ asset('pisProfile').'/'.$user->userid }}" class="btn btn-sm btn-info">
            <i class="ace-icon fa fa-heart-o"></i>
            View Profile
        </a>
    @else
    <a href="{{ asset('pisProfile').'/'.$user->userid }}" class="btn btn-sm btn-info">
        <i class="ace-icon fa fa-heart-o"></i>
        View Profile
    </a>
    @endif
</div>