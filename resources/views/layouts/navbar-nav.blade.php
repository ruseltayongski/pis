<style>
    .active-nav{
        background-color: #d62b6b;
    }
</style>
<ul class="nav navbar-nav">
    <li class="{{ Request::segments()[0] == 'excel' ? 'active-nav' : '' }}"><a href="{{ url('/excel') }}"><i class="ace-icon fa fa-home"></i> Home </a></li>
    <li class="{{ Request::segments()[0] == 'pisList' ? 'active-nav' : '' }}"><a href="{{ url('/pisList') }}"><i class="ace-icon fa fa-database"></i> PIS List</a></li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> Account<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ asset('resetpass')}}"><i class="fa fa-unlock"></i>&nbsp;&nbsp; Change Password</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i>&nbsp;&nbsp; Logout</a></li>
        </ul>
    </li>
</ul>