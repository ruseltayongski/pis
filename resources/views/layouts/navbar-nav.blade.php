<style>
    .active-nav{
        background-color: #d62b6b;
    }
</style>
<ul class="nav navbar-nav">
    @if(Auth::user()->usertype)
    <li class="@if(isset(Request::segments()[0])) {{ Request::segments()[0] == 'excel' ? 'active-nav' : '' }} @endif"><a href="{{ url('/excel') }}"><i class="ace-icon fa fa-home"></i> Home</a></li>
    <li class="@if(isset(Request::segments()[0])) {{ Request::segments()[0] == 'pisList' ? 'active-nav' : '' }} @endif"><a href="{{ url('/pisList') }}"><i class="ace-icon fa fa-database"></i> PIS List</a></li>
    <li class="@if(isset(Request::segments()[0])) {{ Request::segments()[0] == 'salaryList' ? 'active-nav' : '' }} @endif"><a href="{{ url('/salaryList') }}"><i class="ace-icon fa fa-money"></i> Salary Grade</a></li>
    @else
        <li class="@if(isset(Request::segments()[0])) {{ Request::segments()[0] == 'pisProfile' ? 'active-nav' : '' }} @endif"><a href="{{ url('/pisProfile') }}"><i class="ace-icon fa fa-user"></i> Profile</a></li>
    @endif
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> Account<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ asset('resetpass')}}"><i class="fa fa-unlock"></i>&nbsp;&nbsp; Change Password</a></li>
            <li class="divider"></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>&nbsp;&nbsp; Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
</ul>