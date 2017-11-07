<div class="modal-body">
    <div class="align-center">
        <div class="info">
            <h3 class="lighter block green">{{ $user->fname.' '.$user->mname.' '.$user->lname.' '.$user->name_extension }}</h3>
            <div class="desc">{{ $user->position }}</div>
            <div class="desc">{{ $user->residential_address }}</div>
            <div class="desc">{{ $user->sex }}</div>
            <div class="desc">{{ $user->civil_status }}</div>
        </div>
    </div>
</div>

<div class="modal-footer no-margin-top">
    <a href="{{ asset('pisProfile').'/'.$user->id }}" class="btn btn-sm btn-info">
        <i class="ace-icon fa fa-heart-o"></i>
        View Profile
    </a>
</div>