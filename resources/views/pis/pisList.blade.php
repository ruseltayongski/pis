@extends('layouts.pis_app')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                PIS LIST
            </h1>
        </div><!-- /.page-header -->
        <div class="space-10"></div>
        @if(isset($personal_information) and count($personal_information) > 0)
            <div class="clearfix">
                <ul class="nav nav-tabs padding-18" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" class="m-tab" href="#test">
                            <i class="purple ace-icon fa fa-question-circle bigger-120"></i>
                            hello world
                            <span class="badge badge-purple">20</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="space-20"></div>
            <form id="searchForm">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" value="{{ Session::get('keyword') }}" id="search" name="keyword" placeholder="Search municipality..." autofocus/>
                            <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                        </span>
                        </label>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <!-- CODE HERE -->
                    </div>
                </div>
            </form>
            <div class="space-10"></div>

            <div class="tab-content no-border no-padding">
                <div id="test" class="tab-pane fade in active">
                    <div class="posts">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1>sample test!</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger" role="alert">HRH records are empty.</div>
        @endif
    </div><!-- PAGE CONTENT ENDS -->

@endsection
@section('js')

@endsection