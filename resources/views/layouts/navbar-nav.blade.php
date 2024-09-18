<style>
    .active-nav{
        background-color: #dcd4d4;
    }
    .navbar .navbar-nav>li>a {
        font-size: 13px;
        color: #353333 !important;
        text-shadow: 0 1px 0 rgba(0,0,0,.25);
    }
</style>
<ul class="nav navbar-nav">
    @if(Auth::user()->usertype)
        <li class="@if(isset(Request::segments()[0])) {{ Request::segments()[0] == 'excel' ? 'active-nav' : '' }} @endif"><a href="{{ url('/excel') }}"><i class="ace-icon fa fa-home"></i> Home</a></li>
        <li class="@if(isset(Request::segments()[0])) {{ Request::segments()[0] == 'pisList' ? 'active-nav' : '' }} @endif"><a href="{{ url('/pisList') }}"><i class="ace-icon fa fa-database"></i> PIS List</a></li>
        <!--
        <li class="@if(isset(Request::segments()[0])) {{ Request::segments()[0] == 'salaryList' ? 'active-nav' : '' }} @endif"><a href="{{ url('/salaryList') }}"><i class="ace-icon fa fa-money"></i> Salary Grade</a></li>
        -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-money"></i> Salary Grade<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li class="@if(isset(Request::segments()[0]) && isset(Request::segments()[1]) && isset(Request::segments()[2])) {{ Request::segments()[0].Request::segments()[1].Request::segments()[2] == '2019' ? 'active-nav' : '' }} @endif"><a href="{{ asset('salary/grade/2019') }}"><i class="fa fa-money"></i>&nbsp;&nbsp; 2019</a></li>
                <li class="divider"></li>
                <li class="@if(isset(Request::segments()[0]) && isset(Request::segments()[1]) && isset(Request::segments()[2])) {{ Request::segments()[0].Request::segments()[1].Request::segments()[2] == 'salarygradeFirst' ? 'active-nav' : '' }} @endif"><a href="{{ asset('salary/grade/First') }}"><i class="fa fa-money"></i>&nbsp;&nbsp; First Tranche</a></li>
                <li class="divider"></li>
                <li class="@if(isset(Request::segments()[0]) && isset(Request::segments()[1]) && isset(Request::segments()[2])) {{ Request::segments()[0].Request::segments()[1].Request::segments()[2] == 'salarygradeSecond' ? 'active-nav' : '' }} @endif"><a href="{{ asset('salary/grade/Second') }}"><i class="fa fa-money"></i>&nbsp;&nbsp; Second Tranche</a></li>
                <li class="divider"></li>
                <li class="@if(isset(Request::segments()[0]) && isset(Request::segments()[1]) && isset(Request::segments()[2])) {{ Request::segments()[0].Request::segments()[1].Request::segments()[2] == 'salarygradeThird' ? 'active-nav' : '' }} @endif"><a href="{{ asset('salary/grade/Third') }}"><i class="fa fa-money"></i>&nbsp;&nbsp; Third Tranche</a></li>
                <li class="divider"></li>
                <li class="@if(isset(Request::segments()[0]) && isset(Request::segments()[1]) && isset(Request::segments()[2])) {{ Request::segments()[0].Request::segments()[1].Request::segments()[2] == 'salarygradeFourth' ? 'active-nav' : '' }} @endif"><a href="{{ asset('salary/grade/Fourth') }}"><i class="fa fa-money"></i>&nbsp;&nbsp; Fourth Tranche</a></li>
            </ul>
        </li>
    @else
        <li class="@if(isset(Request::segments()[0])) {{ Request::segments()[0] == 'pisProfile' ? 'active-nav' : '' }} @endif"><a href="{{ url('/pisProfile') }}"><i class="ace-icon fa fa-user"></i> Profile</a></li>
    @endif
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> Account<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ asset('/change/password') }}"><i class="fa fa-unlock"></i>&nbsp;&nbsp; Change Password</a></li>
            <li class="divider"></li>
            <li>
                <!-- 
                <a href="#" onclick="pisLogout()"><i class="fa fa-sign-out"></i>&nbsp;&nbsp; Logout</a>
                <form id="logout-form" action="https://pis.cvchd7.com/logout" method="POST" style="display: none;">
                </form> -->
                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>&nbsp;&nbsp; Logout</a>
                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                </form>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-laptop"></i> Systems<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" class="system-link" data-system="dts"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Document Tracking System</a></li>
            <li class="divider"></li>
            <li><a href="#" class="system-link" data-system="payroll"><i class="fa fa-building"></i>&nbsp;&nbsp; Payroll</a></li>
        </ul>
    </li>
</ul>

<script>
    function pisLogout() {
        event.preventDefault();
        $.get("https://pis.cvchd7.com/logout1",function() {
            window.location.href="https://pis.cvchd7.com/";
        });
    }
    $(document).ready(function() {
        $('.system-link').click(function(e) {
            e.preventDefault(); // Prevent default link behavior

            var systemValue = $(this).data('system'); // Get the system value from data attribute

            // Redirect to the controller route with the system value as a query parameter
            window.location.href = "{{ url('/flush-session-dts') }}" + "?system=" + systemValue;
        });
    });
</script>