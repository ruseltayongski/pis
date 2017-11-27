@extends('layouts.pis_app')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                PIS LIST
            </h1>
        </div><!-- /.page-header -->
        <div class="space-10"></div>
        <div class="clearfix">
            <ul class="nav nav-tabs padding-18" id="myTab">
                <?php
                $statusCount = 0;
                $counter = 0;
                $color = ['blue','orange','green','red','purple'];
                $badge = ['primary','warning','success','danger','purple'];
                $status = ["ALL","DUPLICATE"]
                ?>
                @foreach($status as $row)
                    <?php $statusCount++; ?>
                    <li class="@if($statusCount == 1){{ 'active' }}@endif">
                        <a data-toggle="tab" class="m-tab" href="#{{ $row }}">
                            <i class="{{ $color[$counter] }} ace-icon fa fa-question-circle bigger-120"></i>
                            {{ $row }}
                            <span class="badge badge-{{ $badge[$counter] }} badge-{{ $statusCount }}" id="count_{{ $row }}">{{ $countArray[$row] }}</span>
                            <?php
                            $counter++;
                            if($counter >= 5) $counter = 0;
                            ?>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="space-20"></div>
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
                <a href="#document_form" data-link="{{ asset('pisForm') }}" class="btn btn-info no-border btn-sm" data-dismiss="modal" data-backdrop="static" data-toggle="modal" data-target="#document_form">
                    <i class="fa fa-user-plus"></i>
                    Add User
                </a>
            </div>
        </div>
        <div class="space-10"></div>

        <div class="tab-content no-border no-padding">
            <?php $statusCount = 0; ?>
            @foreach($status as $row)
            <?php $statusCount++; ?>
            <div id="{{ $row }}" class="tab-pane fade @if($row == "ALL"){{ 'in active' }}@endif">
                <div class="posts_{{ $row }}">
                    <div class="row">
                        <div class="col-xs-12">
                            @include('pis.pisPagination')
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div><!-- PAGE CONTENT ENDS -->

@endsection
@section('js')
    <script>
        $("a[href='#document_form']").on('click',function(e){
            //$('#form_type').modal({show: false});
            $('.modal_title').html('Add New Employee');
            $('.modal_content').html(loadingState);
            var url = $(this).data('link');
            setTimeout(function(){
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $('.modal_content').html(data);
                        $('.select2').css('width','100%').select2({allowClear:true});
                    }
                });
            },700);
        });

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

        $("input[name='keyword']").on("keyup",function(e){
            console.log(this);
            this.focus();
            e.preventDefault();
            if(e.keyCode >= 48 && e.keyCode <= 90 || e.keyCode == 8){
                keyword = $("input[name='keyword']").val();
                getPosts(1,keyword);
            }
        });

        var type = 'ALL';
        var keyword = '';
        $(".m-tab").each(function(index){
            var href = $(this).attr('href');
            $("a[href='"+href+"']").on("click",function(){
                type = this.href.split('#')[1];
                $('.posts_'+type).html("<span>Loading....</span>");
                getPosts(1,keyword);
            });
        });

        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getPosts(page,keyword);
                }
            }
        });
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function (e) {
                getPosts($(this).attr('href').split('page=')[1],keyword);
                e.preventDefault();
            });
        });

        function getPosts(page,keyword) {
            $('.posts_'+type).html("<span>Loading....</span>");
            $.ajax({
                url : '?page=' + page + '&keyword=' + keyword + '&type=' + type,
                dataType: 'json',
            }).done(function (data) {
                //location.hash = page;
                setTimeout(function(){
                    $('.posts_'+type).html(data.view);
                    $("#count_"+type).html(data.personal_count);
                },700);
            }).fail(function (data) {
                console.log(data);
                alert('Posts could not be loaded.');
            });
        }

    </script>
@endsection