@extends('layouts.pis_app')
@section('content')
    <style>
        .drag_disabled{
            pointer-events: none;
        }
        .drag_enabled{
            pointer-events: all;
        }
    </style>
        <div class="main-content">
            <div class="main-content-inner">

                <div class="page-content">

                    <div class="page-header">
                        <h1>
                            Dashboard
                            <small>
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                overview &amp; stats
                            </small>
                        </h1>
                    </div><!-- /.page-header -->
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="row">

                                <div class="col-sm-7 infobox-container">
                                    <div class="infobox infobox-green" onclick="window.open('filter1/Permanent/Male','new_window');" style="cursor: pointer;">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-male"></i>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-data-number">{{ number_format((float)$dashboard->permanent_male, 0, '.', ',') }}</span>
                                            <div class="infobox-content">Permanent Male</div>
                                        </div>

                                    </div>

                                    <div class="infobox infobox-blue" onclick="window.open('filter1/Permanent/Female','new_window');" style="cursor: pointer;">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-female"></i>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-data-number">{{ number_format((float)$dashboard->permanent_female, 0, '.', ',') }}</span>
                                            <div class="infobox-content">Permanent Female</div>
                                        </div>

                                    </div>

                                    <div class="infobox infobox-pink" onclick="window.open('filter1/Job Order/Male','new_window');" style="cursor: pointer;">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-male"></i>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-data-number">{{ number_format((float)$dashboard->job_order_male, 0, '.', ',') }}</span>
                                            <div class="infobox-content">Job Order Male</div>
                                        </div>
                                    </div>

                                    <div class="infobox infobox-red" onclick="window.open('filter1/Job Order/Female','new_window');" style="cursor: pointer;">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-female"></i>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-data-number">{{ number_format((float)$dashboard->job_order_female, 0, '.', ',') }}</span>
                                            <div class="infobox-content">Job Order Female</div>
                                        </div>
                                    </div>

                                    <div class="infobox infobox-orange2" onclick="window.open('filter2/employee_status/1','new_window');" style="cursor: pointer;">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-check"></i>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-data-number">{{ number_format((float)$dashboard->active, 0, '.', ',') }}</span>
                                            <div class="infobox-content">ACTIVE</div>
                                        </div>
                                    </div>

                                    <div class="infobox infobox-blue2" onclick="window.open('filter2/employee_status/3','new_window');" style="cursor: pointer;">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-star"></i>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-data-number">{{ number_format((float)$dashboard->resigned, 0, '.', ',') }}</span>
                                            <div class="infobox-content">RESIGNED</div>
                                        </div>
                                    </div>

                                    <div class="space-6"></div>

                                    <div class="infobox infobox-green infobox-small infobox-dark" onclick="window.location='{{ route('excel-file',['type'=>'xls']) }}'" style="cursor: pointer;">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-download"></i>
                                        </div>
                                        <div class="infobox-data" >
                                            <div class="infobox-content">Downloads</div>
                                            <div class="infobox-content">{{ number_format((float)$dashboard->total_employee, 0, '.', ',') }}</div>
                                        </div>
                                    </div>
                                    <div class="infobox infobox-blue infobox-small infobox-dark" onclick="window.location='/pis/new_employee'" style="cursor: pointer;">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-user-plus"></i>
                                        </div>
                                        <div class="infobox-data" >
                                            <div class="infobox-content">Register</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-12-sm"></div>

                                <div class="col-sm-5">
                                    <div class="widget-box">
                                        <div class="widget-header widget-header-flat widget-header-small">
                                            <h5 class="widget-title">
                                                <i class="ace-icon fa fa-book"></i>
                                                Educational Background
                                            </h5>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <div id="piechart-placeholder"></div>

                                                <div class="hr hr8 hr-double"></div>

                                                <div class="clearfix">
                                                    <div class="grid3" onclick="window.open('filter3/education/background/3','new_window');" style="cursor: pointer;">
                                                        <span class="grey">
                                                            <i class="ace-icon fa fa-gavel fa-2x" style="color: #68BC31"></i>
                                                            &nbsp; Vocational
                                                            <small class="text-success" style="margin-left: 30%">{{ number_format((float)$dashboard->vocational, 0, '.', ',') }}</small>
                                                        </span>
                                                    </div>

                                                    <div class="grid3" onclick="window.open('filter3/education/background/4','new_window');" style="cursor: pointer;">
                                                        <span class="grey">
                                                            <i class="ace-icon fa fa-folder fa-2x " style="color: #2091CF"></i>
                                                            &nbsp; College
                                                            <small class="text-success" style="margin-left: 30%">{{ number_format((float)$dashboard->college, 0, '.', ',') }}</small>
                                                        </span>
                                                    </div>

                                                    <div class="grid3" onclick="window.open('filter3/education/background/5','new_window');" style="cursor: pointer;">
                                                        <span class="grey">
                                                            <i class="ace-icon fa fa-briefcase fa-2x" style="color: #AF4E96"></i>
                                                            &nbsp; Masteral
                                                            <small class="text-success" style="margin-left: 30%">{{ number_format((float)$dashboard->masteral, 0, '.', ',') }}</small>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- /.widget-main -->
                                        </div><!-- /.widget-body -->
                                    </div><!-- /.widget-box -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="widget-box transparent" id="recent-box">
                                        <div class="widget-header">
                                            <h4 class="widget-title lighter smaller">
                                                <i class="ace-icon fa fa-users orange"></i>RECENT MEMBERS
                                            </h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main padding-4">
                                                <div id="member-tab" class="tab-pane">
                                                    <div class="clearfix">
                                                        @foreach($recent as $user)
                                                            <div class="itemdiv memberdiv" onclick="window.open('/pis/pisProfile/{{$user->userid}}','new_window');">
                                                                <div class="user">
                                                                    <?php
                                                                        if(isset($user->picture)){
                                                                            $picture = asset('public/upload_picture/picture').'/'.$user->picture;
                                                                        } else {
                                                                            if($user->sex == 'Female')
                                                                                $picture = asset('public/assets_ace/images/avatars/female1.png');
                                                                            else
                                                                                $picture = asset('public/assets_ace/images/avatars/male1.png');
                                                                        }
                                                                    ?>
                                                                    <img alt="Bob Doe's avatar" src="{{ $picture }}" />
                                                                </div>

                                                                <div class="body">
                                                                    <div class="name">
                                                                        <a href="#">{{ ucfirst(strtolower($user->fname)) }}</a>
                                                                    </div>

                                                                    <div class="time">
                                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                                        <span class="green">
                                                                            <?php
                                                                                $date1 = $user->created_at;
                                                                                $date2 = date('Y-m-d H:i:s');
                                                                                $diff = abs(strtotime($date2) - strtotime($date1));
                                                                                echo \PIS\Http\Controllers\FileController::dateDuration($diff);
                                                                            ?>
                                                                        </span>
                                                                    </div>

                                                                    <div>
                                                                        <span class="label label-success label-sm arrowed-in">{{ $user->employee_status }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                </div><!-- /.#member-tab -->
                                            </div><!-- /.widget-main -->
                                        </div><!-- /.widget-body -->
                                    </div><!-- /.widget-box -->
                                </div><!-- /.col -->

                                <div class="col-sm-5">
                                    <div class="widget-header">
                                        <h4 class="widget-title lighter smaller">
                                            <i class="ace-icon fa fa-building blue"></i>Division/Section
                                        </h4>
                                    </div>
                                    <div class="dd dd-draghandle">
                                        <ol class="dd-list">
                                            @foreach(\PIS\Division::get() as $div)
                                            <li class="dd-item dd2-item" data-id="15">
                                                <div class="dd-handle dd2-handle">
                                                    <i class="normal-icon ace-icon fa fa-filter orange bigger-130"></i>
                                                    <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                                </div>
                                                <div class="dd2-content">{{ $div->description }}</div>

                                                <ol class="dd-list">
                                                    @foreach(\PIS\Section::where('division','=',$div->id)->get() as $sec)
                                                    <li class="dd-item dd2-item" data-id="16" onclick="window.open('/pis/filter4/section/{{$sec->id}}', 'new_window');" style="cursor: pointer;">
                                                        <div class="dd-handle dd2-handle">
                                                            <i class="normal-icon ace-icon fa fa-users red bigger-130"></i>

                                                            <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                                        </div>
                                                        <div class="dd2-content">{{ $sec->description }}</div>
                                                    </li>
                                                    @endforeach
                                                </ol>
                                            </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>

                            </div><!-- /.row -->

                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->

@endsection
@section('js')

    <script src="{{ asset('public/assets_ace/js/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('public/assets_ace/js/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('public/assets_ace/js/jquery.flot.resize.min.js') }}"></script>
    <script src="{{ asset('public/assets_ace/js/jquery.nestable.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(function($) {

            //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
            //but sometimes it brings up errors with normal resize event handlers
            $.resize.throttleWindow = false;

            var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
            var data = [
                { label: "VOCATIONAL",  data: "{{ $dashboard->vocational }}", color: "#68BC31"},
                { label: "COLLEGE",  data: "{{ $dashboard->college }}", color: "#2091CF"},
                { label: "MASTERAL",  data: "{{ $dashboard->masteral }}", color: "#AF4E96"}
            ]
            function drawPieChart(placeholder, data, position) {
                $.plot(placeholder, data, {
                    series: {
                        pie: {
                            show: true,
                            tilt:0.8,
                            highlight: {
                                opacity: 0.25
                            },
                            stroke: {
                                color: '#fff',
                                width: 2
                            },
                            startAngle: 2
                        }
                    },
                    legend: {
                        show: true,
                        position: position || "ne",
                        labelBoxBorderColor: null,
                        margin:[-30,15]
                    }
                    ,
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                })
            }
            drawPieChart(placeholder, data);

            /**
             we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
             so that's not needed actually.
             */
            placeholder.data('chart', data);
            placeholder.data('draw', drawPieChart);


            //pie chart tooltip example
            var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
            var previousPoint = null;

            placeholder.on('plothover', function (event, pos, item) {
                if(item) {
                    if (previousPoint != item.seriesIndex) {
                        previousPoint = item.seriesIndex;
                        var tip = item.series['label'] + " : " + item.series['percent']+'%';
                        $tooltip.show().children(0).text(tip);
                    }
                    $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
                } else {
                    $tooltip.hide();
                    previousPoint = null;
                }

            });

            $('.dd').nestable({});
            $('.dd').nestable('collapseAll');

        })
    </script>
@endsection