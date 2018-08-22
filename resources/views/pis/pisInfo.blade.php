<form class="form-horizontal form-submit" method="POST" action="{{ asset('/addUserid') }}">
    {{ csrf_field() }}
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
                     <input type="hidden" name="previousId" value="{{ $user->userid }}"/>
                     <input type="text" name="currentId" class="form-control" placeholder="EMPLOYEE ID" required/>
                     <i class="ace-icon fa fa-eye"></i>
                 </span>
             </label>
             <p class="alert-warning" id="userid_error"></p>
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
            <button type="submit" class="btn btn-sm btn-success">
                <i class="ace-icon fa fa-send"></i>
                Add Employee ID
            </button>
            <a href="{{ asset('pisProfile').'/'.$user->userid }}" class="btn btn-sm btn-info">
                <i class="ace-icon fa fa-heart-o"></i>
                View Profile
            </a>
        @else
        <button type="button" class="btn btn-sm btn-success">
            <i class="ace-icon fa fa-pencil"></i>
            Update USER ID
        </button>
        <a href="{{ asset('pisProfile').'/'.$user->userid }}" class="btn btn-sm btn-info">
            <i class="ace-icon fa fa-heart-o"></i>
            View Profile
        </a>
        @endif
    </div>
</form>
@if(strpos($user->userid,'no_userid'))
    <script>
        var userid_flag = false;
        $("input[name='currentId']").on("keyup",function(e){
            e.preventDefault();
            var element = $("input[name='currentId']");
            var userid = element.val();
            $.post("<?php echo asset('userid_trapping')?>", { "userid": element.val(), "_token": "<?php echo csrf_token(); ?>" }, function(result){
                if(result != ''){
                    $("#userid_error").html('Employee NO : '+userid+' is already exist in the database.');
                    last_gritter = $.gritter.add({
                        title: 'Warning!',
                        text: 'Employee NO : '+userid+' is already exist in the database.',
                        class_name: 'gritter-warning gritter-center',
                    });
                    userid_flag = true;
                } else {
                    $("#userid_error").html('');
                    userid_flag = false;
                }
            })

        });

        $('.form-submit').on('submit',function(){
            if(userid_flag){
                alert('ID NO already exist in the database.');
                $("input[name='currentId']").val('');
                $("input[name='currentId']").focus();
                return false;
            }
        });
    </script>
@endif
