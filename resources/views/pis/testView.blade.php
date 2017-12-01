<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Restyling jQuery UI Widgets and Elements" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- wewewewewewe -->
    <link rel="stylesheet" href="{{ asset('public/assets_ace/css/bootstrap.min.css') }}" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="{{ asset('public/assets_ace/css/jquery-ui.min.css') }}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('public/assets_ace/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

    <link rel="stylesheet" href="{{ asset('public/assets_ace/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets_ace/css/ace-rtl.min.css') }}" />
    <script src="{{ asset('public/assets_ace/js/ace-extra.min.js') }}"></script>
</head>
    <body>
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="row">

            <div class="col-sm-6">
                <h3 class="header blue lighter smaller">
                    <i class="ace-icon fa fa-list-alt smaller-90"></i>
                    Dialogs
                </h3>
                <a href="#" id="id-btn-dialog2" class="btn btn-info btn-sm">Confirm Dialog</a>
                <a href="#" id="id-btn-dialog1" class="btn btn-purple btn-sm">Modal Dialog</a>

                <div id="dialog-message" class="hide">
                    <p>
                        This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.
                    </p>

                    <div class="hr hr-12 hr-double"></div>

                    <p>
                        Currently using
                        <b>36% of your storage space</b>.
                    </p>
                </div><!-- #dialog-message -->

                <div id="dialog-confirm" class="hide">
                    <div class="alert alert-info bigger-110">
                        These items will be permanently deleted and cannot be recovered.
                    </div>

                    <div class="space-6"></div>

                    <p class="bigger-110 bolder center grey">
                        <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                        Are you sure?
                    </p>
                </div><!-- #dialog-confirm -->
            </div><!-- ./span -->
        </div><!-- ./row -->
    </body>
</html>

<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('public/assets_ace/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>

<script src="{{ asset('public/assets_ace/js/jquery-2.1.4.min.js') }}"></script>

<script src="{{ asset('public/assets_ace/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->
<script src="{{ asset('public/assets_ace/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/assets_ace/js/jquery.ui.touch-punch.min.js') }}"></script>

<!-- acwewewpts -->
<script src="{{ asset('public/assets_ace/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('public/assets_ace/js/ace.min.js') }}"></script>

<script>
    jQuery(function($) {

        $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
            _title: function(title) {
                var $title = this.options.title || '&nbsp;'
                if( ("title_html" in this.options) && this.options.title_html == true )
                    title.html($title);
                else title.text($title);
            }
        }));

        $( "#id-btn-dialog2" ).on('click', function(e) {
            console.log('rtayong');
            e.preventDefault();

            $( "#dialog-confirm" ).removeClass('hide').dialog({
                resizable: false,
                width: '320',
                modal: true,
                title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Empty the recycle bin?</h4></div>",
                title_html: true,
                buttons: [
                    {
                        html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete all items",
                        "class" : "btn btn-danger btn-minier",
                        click: function() {
                            console.log('legendary');
                            $( this ).dialog( "close" );
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
</script>

