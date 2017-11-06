<style>
    .active-nav{
        background-color: #0a97d6;
    }
</style>
<ul class="nav navbar-nav">
    @if(Auth::user()->usertype)
        <li class="{{ Request::segments()[0] == 'index' ? 'active-nav' : '' }}"><a href="{{ url('/') }}"><i class="ace-icon fa fa-home"></i> Home </a></li>
        <li class="{{ Request::segments()[0] == 'hrhList' ? 'active-nav' : '' }}"><a href="{{ url('/hrhList') }}"><i class="ace-icon fa fa-database"></i> Hrh List</a></li>
        <li class="{{ Request::segments()[0] == 'hrhType' ? 'active-nav' : '' }}"><a href="{{ url('/hrhType') }}"><i class="ace-icon fa fa-eye"></i> HRH Type</a></li>
        <li class="{{ Request::segments()[0] == 'pList' ? 'active-nav' : '' }}"><a href="{{ url('/pList') }}"><i class="ace-icon fa fa-asterisk"></i> Province</a></li>
        <li class="{{ Request::segments()[0] == 'mList' ? 'active-nav' : '' }}"><a href="{{ url('/mList') }}"><i class="ace-icon fa fa-flag"></i> Municipality</a></li>
        <li class="{{ Request::segments()[0] == 'sList' ? 'active-nav' : '' }}"><a href="{{ url('/sList') }}"><i class="ace-icon fa fa-eye"></i> Status of Employment</a></li>
    @else
        <li><a href="{{ url('/profile') }}"><i class="ace-icon fa fa-certificate"></i> Profile</a></li>
    @endif
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> Account<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ asset('resetpass')}}"><i class="fa fa-unlock"></i>&nbsp;&nbsp; Change Password</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i>&nbsp;&nbsp; Logout</a></li>
        </ul>
    </li>
</ul>