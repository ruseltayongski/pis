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
                $status = ["ALL","DUPLICATE_ID","DUPLICATE_NAME","INACTIVE","PERMANENT","JOB_ORDER"];
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
                            if($counter > 4) $counter = 0;
                            ?>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="space-20"></div>
        <p class="alert alert-info"><i class="ace-icon fa fa-info"></i> type only to search keyword</p>
        <div class="row">
            <form action="" id="searchForm">
                <div class="col-xs-12 col-md-6">
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" value="{{ Session::get('keyword') }}" id="search" name="keyword" placeholder="Search PIS..." autofocus/>
                            <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                        </span>
                    </label>
                </div>
                <div class="col-xs-12 col-md-1">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-search icon-on-right bigger-110"></i> Search</button>
                </div>
                <div class="col-xs-12 col-md-5">
                    <a href="#document_form" data-link="{{ asset('pisForm') }}" class="btn btn-info no-border btn-sm" data-dismiss="modal" data-backdrop="static" data-toggle="modal" data-target="#document_form">
                        <i class="fa fa-user-plus"></i>
                        Add Employee
                    </a>
                </div>
            </form>
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


    <div id="dialog-confirm" class="hide">
        <div class="alert alert-info bigger-110">
            This employee will be deleted
        </div>

        <div class="space-6"></div>

        <p class="bigger-110 bolder center grey">
            <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
            Are you sure?
        </p>
    </div>

@endsection
@section('js')
    <script>
        jQuery(function($) {

            $("#searchForm").submit(function(e) {
                keyword = $("input[name='keyword']").val();
                getPosts(1,keyword);
                this.focus();
                return false;
            });

            $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
                _title: function(title) {
                    var $title = this.options.title || '&nbsp;';
                    if( ("title_html" in this.options) && this.options.title_html == true )
                        title.html($title);
                    else title.text($title);
                }
            }));

            //custom autocomplete (category selection)
            $.widget( "custom.catcomplete", $.ui.autocomplete, {
                _create: function() {
                    this._super();
                    this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
                },
                _renderMenu: function( ul, items ) {
                    var that = this, currentCategory = "";
                    $.each( items, function( index, item ) {
                        that._renderItemData( ul, item );
                        return index < 15;
                    });
                }
            });

            var personal_select = [];
            $.each(<?php echo $personal_select; ?>,function(x,data){
                personal_select.push({ label:data.fname+" "+data.lname+", "+data.mname , id:data.id });
            });

            $( "#search" ).catcomplete({
                delay: 0,
                source: personal_select,
                select: function(e, ui) {
                    keyword = ui.item.value;
                    getPosts(1,keyword);
                }
            });

            delete_row();
            function delete_row(){
                $(".delete").each(function(index){
                    $("#"+this.id).on('click', function(e) {
                        e.preventDefault();
                        var deleteId = this.id.split('delete')[1];
                        var $this = $(this).parents(':eq(1)');
                        console.log(this.id);
                        $( "#dialog-confirm" ).removeClass('hide').dialog({
                            resizable: false,
                            width: '320',
                            modal: true,
                            title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i></h4></div>",
                            title_html: true,
                            buttons: [
                                {
                                    html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete",
                                    "class" : "btn btn-danger btn-minier",
                                    click: function() {
                                        $( this ).dialog( "close" );
                                        $this.remove();
                                        Lobibox.notify('error',{
                                            msg:'Successfully Deleted!'
                                        });
                                        var url = "<?php echo asset('deletePersonalInformation'); ?>";
                                        var json = {
                                            "userid": deleteId,
                                            "_token": "<?php echo csrf_token(); ?>"
                                        };

                                        $.post(url,json,function(result){
                                            console.log(result);
                                        });

                                    }
                                }
                                ,
                                {
                                    html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
                                    "class" : "btn btn-minier",
                                    click: function() {
                                        $( this ).dialog( "close" );
                                    }
                                }
                            ]
                        });
                    });
                });
            }

            $("a[href='#document_form']").on('click',function(e){
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
                },500);
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

                var url = "<?php echo asset('pisList'); ?>";
                var json = {
                    "page" : page,
                    "keyword" : keyword,
                    "type" : type,
                    "_token" : "<?php echo csrf_token(); ?>"
                };

                $.ajax({
                    type: "POST",
                    url: url,
                    data: json,
                    success: function( data ) {
                        $('.posts_'+type).html(data.view);
                        delete_row();
                    }
                });
            }

        });

        @if(session()->has('addUserid'))
            Lobibox.notify('success',{
                msg:"<?php echo session()->get('addUserid'); ?>"
            });
        @endif
        @if(session()->has('addUser'))
        Lobibox.notify('success',{
            msg:"<?php echo session()->get('addUser'); ?>"
        });
        @endif
    </script>
@endsection