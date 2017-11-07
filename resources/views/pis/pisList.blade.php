@extends('layouts.pis_app')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                PIS LIST
            </h1>
        </div><!-- /.page-header -->
        <div class="space-10"></div>

        <form id="searchForm" method="GET" action="{{ asset('pisList') }}">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <input type="text" class="form-control" value="{{ Session::get('keyword') }}" id="search" name="keyword" placeholder="Search PIS..." autofocus/>
                        <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                    </span>
                    </label>
                </div>
                <div class="col-xs-12 col-md-6">
                    <button class="btn-sm btn btn-info">Search</button>
                </div>
            </div>
        </form>
        <div class="space-10"></div>

        <div class="tab-content no-border no-padding">
            <div id="test" class="tab-pane fade in active">
                <div class="posts">
                    <div class="row">
                        <div class="col-xs-12">
                            @include('pis.pisPagination')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- PAGE CONTENT ENDS -->

@endsection
@section('js')
    <script>

        //user information
        $("a[href='#pis_info']").on('click',function(){
            $('.modal-content').html(loadingState);
            var url = $(this).data('link');
            setTimeout(function(){
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $('.modal-content').html(data);
                    }
                });
            },700);
        });

    </script>
@endsection