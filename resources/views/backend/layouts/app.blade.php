<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title> {{ env('APP_NAME')}} - {{$title??""}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link rel="shortcut icon" href="{{static_asset('admin/upload_image/logo.png')}}"/>
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/> -->
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet" type="text/css"/>

    <link href="{{ static_asset('admin/font-awesome-master/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ static_asset('admin/global/plugins/simple-line-icons/simple-line-icons.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ static_asset('admin/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ static_asset('admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ static_asset('admin/layouts/layout/css/themes/Jquery_ui.css') }}" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="{{ static_asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ static_asset('admin/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ static_asset('admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ static_asset('admin/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ static_asset('admin/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ static_asset('admin/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet"
          type="text/css"/>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />

    <link href="{{ static_asset('admin/global/css/components.min.css') }}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{ static_asset('admin/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!--        scroll start-->
    <link rel="stylesheet" href="{{ static_asset('admin/mScrollbar/q_jquery.mCustomScrollbar.min.css') }}">
    <!--scroll end-->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- Data table -->
    <link href="{{ static_asset('admin/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ static_asset('admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}"
          rel="stylesheet" type="text/css"/>
    <!-- Data table -->
    <link href="{{ static_asset('admin/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ static_asset('admin/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet"
          type="text/css" id="style_color"/>
    <!-- smoothness start -->
    <link href="{{ static_asset('admin/layouts/layout/css/themes/smoothness_jquery-ui.css') }}" rel="stylesheet"
          type="text/css"/>
    <!-- smoothness end -->
    <link href="{{ static_asset('admin/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Choose start -->
    <link rel="stylesheet" href="{{ static_asset('admin/css/chosen.min.css') }}"/>
    <!-- Choose end -->
    <script src="{{ static_asset('admin/global/plugins/jquery.min.js') }}" type="text/javascript"></script>

    <link rel="stylesheet" media="all" href="{{ static_asset('admin/sweet_alert/swal.css') }}"/>
    <link href="{{ static_asset('admin/global/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{ static_asset('admin/sweet_alert/swal.js') }}"></script>
    <!--    jquery_ui start-->
    <script src="{{ static_asset('admin/layouts/layout/scripts/jquery-1.12.4.js') }}"
            type="text/javascript"></script>
    <script src="{{ static_asset('admin/layouts/layout/scripts/jquery-ui.js') }}" type="text/javascript"></script>
    <!--    jquery_ui end-->
    <!--        scroll start-->
    <script src="{{ static_asset('admin/mScrollbar/q_jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!--        scroll end-->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ static_asset('admin/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ static_asset('admin/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ static_asset('admin/global/plugins/datatables/datatables.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ static_asset('admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"
            type="text/javascript"></script>

    <script src="{{ static_asset('admin/pages/scripts/table-datatables-rowreorder.min.js')}}" type="text/javascript"></script>
    <link href="{{ static_asset('admin/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <script src="{{ static_asset('admin/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script>
    <!--     datepicker start-->
    <script src="{{ static_asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ static_asset('admin/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ static_asset('admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"
            type="text/javascript"></script>
    <!--         datepicker end     -->
    <noscript><style type="text/css">#loading { display: none; }</style></noscript>
    <script type="text/javascript">
        $(document).ready(function () { $('.pull-right, .pull-left').addClass('flip'); });
    </script>
    <script type="text/javascript">
        $(window).load(function () {
            $("#loading").fadeOut("slow");
        });
    </script>


{{-- magnify --}}
<style>
    * {box-sizing: border-box;}

    .img-magnifier-container {
      position:relative;
    }

    .img-magnifier-glass {
      position: absolute;
      border: 3px solid #000;
      border-radius: 50%;
      cursor: none;
      /*Set the size of the magnifier glass:*/
      width: 100px;
      height: 100px;
    }
    </style>
    <script>
    function magnify(imgID, zoom) {
      var img, glass, w, h, bw;
      img = document.getElementById(imgID);
      /*create magnifier glass:*/
      glass = document.createElement("DIV");
      glass.setAttribute("class", "img-magnifier-glass");
      /*insert magnifier glass:*/
      img.parentElement.insertBefore(glass, img);
      /*set background properties for the magnifier glass:*/
      glass.style.backgroundImage = "url('" + img.src + "')";
      glass.style.backgroundRepeat = "no-repeat";
      glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
      bw = 3;
      w = glass.offsetWidth / 2;
      h = glass.offsetHeight / 2;
      /*execute a function when someone moves the magnifier glass over the image:*/
      glass.addEventListener("mousemove", moveMagnifier);
      img.addEventListener("mousemove", moveMagnifier);
      /*and also for touch screens:*/
      glass.addEventListener("touchmove", moveMagnifier);
      img.addEventListener("touchmove", moveMagnifier);
      function moveMagnifier(e) {
        var pos, x, y;
        /*prevent any other actions that may occur when moving over the image*/
        e.preventDefault();
        /*get the cursor's x and y positions:*/
        pos = getCursorPos(e);
        x = pos.x;
        y = pos.y;
        /*prevent the magnifier glass from being positioned outside the image:*/
        if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
        if (x < w / zoom) {x = w / zoom;}
        if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
        if (y < h / zoom) {y = h / zoom;}
        /*set the position of the magnifier glass:*/
        glass.style.left = (x - w) + "px";
        glass.style.top = (y - h) + "px";
        /*display what the magnifier glass "sees":*/
        glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
      }
      function getCursorPos(e) {
        var a, x = 0, y = 0;
        e = e || window.event;
        /*get the x and y positions of the image:*/
        a = img.getBoundingClientRect();
        /*calculate the cursor's x and y coordinates, relative to the image:*/
        x = e.pageX - a.left;
        y = e.pageY - a.top;
        /*consider any page scrolling:*/
        x = x - window.pageXOffset;
        y = y - window.pageYOffset;
        return {x : x, y : y};
      }
    }
    </script>



    <style type="text/css">

        .toast-top-full-width {
            top: 80px;

        }

        .toast-top-right {
            top: 80px;

        }

        @media all and (max-width: 240px) {
            .toast-top-full-width {

            }
        }

        @media all and (min-width: 241px) and (max-width: 320px) {
            .toast-top-full-width {

            }
        }

        @media all and (min-width: 321px) and (max-width: 480px) {
            .toast-top-full-width {

            }
        }

        @media print {
            @page {
                margin-top: 0;
                margin-bottom: 0;
            }

            body {
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .noPrint {
                display: none;
            }

            strong {
                font-weight: normal !important;
            }
        }

        @media print {
            .noPrint {
                display: none;
            }

            strong {
                font-weight: normal !important;
            }
        }

        @media print {
            a[href]:after {
                content: none !important;
            }
        }
        .dataTable{
            width: 100% !important;
        }
        table.dataTable thead th, table.dataTable thead td {
            padding: 8px 5px;
            border-bottom: 1px solid #111;
          /*  background-color: #32c5d2;*/
        }
        .no-padding-right{
            padding-right: 0px !important;
        }
    </style>
    @yield('css')

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }


        function confirmSwat() {
            $('#subBtn').prop('disabled', true);
            $('#subBtn').button('loading');
            let closestForm = $('#subBtn').closest('form');
            let pass = 1;
            $('closestForm.required-form').find('input, select').each(function () {
                if ($(this).prop('required')) {
                    if ($(this).val() === "") {
                        pass = 0;
                        $(this).addClass("has-error");
                        $(this).closest(".form-group").addClass("has-error")
                        return false;
                    }
                }
            });
            if (pass === 1) {
                swal({
                        title: "Are you sure ?",
                        text: "You won't be able to revert this!",
                        showCancelButton: true,
                        confirmButtonColor: '#73AE28',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes',
                        cancelButtonText: "No",
                        closeOnConfirm: true,
                        closeOnCancel: true,
                        type: 'success'
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $("#publicForm").submit();
                        } else {
                            $('#subBtn').prop('disabled', false);
                            $('#subBtn').button('reset');
                            return false;
                        }
                    });
            } else {
                error_required_field();
                $('#subBtn').prop('disabled', false);
                $('#subBtn').button('reset');
                return false;
            }

        }

        function error_required_field(message) {
            if(message==null){
                var msg = 'Please fill_all_the_required_fields';
            }else{
                var msg = message;
            }


            toastr.error(msg);
        }
        function ValidationMessage(msg) {


            swal({

                    title: msg,
                    //text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonColor: '#73AE28',

                    confirmButtonText: 'Yes',


                    closeOnConfirm: true,



                    type: 'warning'

                },

                function (isConfirm) {

                    if (isConfirm) {

                        //$("#publicForm").submit();

                    } else {

                        // return false;

                    }

                });

        }

    </script>
</head>
<!-- END HEAD -->
<body class="page-header-fixed page-sidebar-closed-hide-logo">
<div id="loading"></div>
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
@include('backend.includes.header')
<!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"></div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
    @include('backend.includes.sidebar')
    <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- background: rgb(234, 233, 234);min-height: 886px; -->
            <div class="page-content" style="">
                <!-- BEGIN PAGE HEADER-->
                <!-- BEGIN THEME PANEL -->

                <!-- END THEME PANEL -->
                <!-- BEGIN PAGE TITLE-->
            @include('backend.includes.message')

            <!-- END PAGE TITLE-->
                <!-- BEGIN PAGE BAR -->
            @include('backend.includes.breadcrumbs')
            <!-- END PAGE BAR -->
                <!-- END PAGE HEADER-->
                @yield('content')

                @include('backend.includes.modal')
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>

        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2021 &copy; Company
            <a target="_blank" href=""></a> &nbsp;|&nbsp;

        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
</div>


<script src="{{ static_asset('admin/global/plugins/bootstrap/js/bootstrap.min.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<script src="{{ static_asset('admin/global/plugins/moment.min.js') }}" type="text/javascript"></script>

<script src="{{ static_asset('admin/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/counterup/jquery.waypoints.min.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/counterup/jquery.counterup.min.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/amcharts/amcharts/amcharts.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/amcharts/amcharts/serial.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/amcharts/amcharts/pie.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/amcharts/amcharts/radar.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/amcharts/amcharts/themes/light.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/amcharts/amcharts/themes/patterns.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/amcharts/amcharts/themes/chalk.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/amcharts/ammap/ammap.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/amcharts/amstockcharts/amstock.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/fullcalendar/fullcalendar.min.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/horizontal-timeline/horizontal-timeline.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/flot/jquery.flot.resize.min.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/flot/jquery.flot.categories.min.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript') }}"></script>
<script src="{{ static_asset('admin/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}"
        type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ static_asset('admin/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/layouts/global/scripts/quick-sidebar.min.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/js/chosen.jquery.min.js') }}"></script>


<script src="{{ static_asset('admin/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"
        type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/jquery-validation/js/additional-methods.min.js') }}"
        type="text/javascript"></script>
<!--        select2-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js" integrity="sha256-CtKylYan+AJuoH8jrMht1+1PMhMqrKnB8K5g012WN5I=" crossorigin="anonymous"></script>

<!-- chosen start -->
<script src="https://cdn.jsdelivr.net/jquery.loadingoverlay/latest/loadingoverlay.min.js"></script>
<script src="{{ static_asset('admin/global/plugins/ladda/spin.min.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/global/plugins/ladda/ladda.min.js') }}" type="text/javascript"></script>
<script src="{{ static_asset('admin/pages/scripts/ui-buttons-spinners.min.js') }}" type="text/javascript"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>







@if($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            var msg = '{{ $error }}';
            toastr.error(msg);
        </script>
    @endforeach
@endif

@if(session('error'))
    <script>
        var msg = '{{ session('error') }}';

        toastr.error(msg);
    </script>
@endif
@if(session('fail'))
    <script>
        var msg = '{{ session('fail') }}';

        toastr.error(msg);
    </script>
@endif
@if(session('success'))
    <script>
        var msg = '{{ session('success') }}';
        toastr.success(msg);
    </script>
@endif
<script>
    $(document).ready(function () {
        let table = $('.datatable').DataTable({
            serverSide: false,
            processing: true,
            deferRender: true,
            bLengthChange: true,
            searchDelay: 500,
            pageLength: 30,


        });
        $(".chosen-select").chosen({allow_single_deselect: true});
        $('#clickmewow').click(function () {
            $('#radio1003').attr('checked', 'checked');
        });
        $('.date-picker').datepicker({
            //minDate: new Date(),
            // startDate: '0d',
            autoclose: true,
            todayHighlight: true
        });
    });
    $(document).on("keypress", ".decimal", function () {
        $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            resetFieldStyle(this);
            event.preventDefault();
        }
    });
    // Handle validation errors by highlighting the field and showing an error message
    function handleValidationError(button, element, errorMessage) {
        button.prop('disabled', false).button('reset');
        $(element).css('border', '1px solid red').focus();
        toastr.error(errorMessage);
    }

    // Reset the border style for a field to its default state
    function resetFieldStyle(element) {
        $(element).css('border', '');
    }
</script>
@yield('script')
@stack('custom-scripts')


<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function (event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = label;

            if (input.length) {
                input.val(log);
            } else {
                if (log) ;
            }

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    });
    function file_validation(selectObject) {
        var id = selectObject.id;

        const fi = document.getElementById(id);
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (var i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 500) {
                    alert(
                        "File too Big, please select a file less than 500 Kb");
                    id = '#' + id;
                    $(id).val('');
                }
            }
        }
    }
</script>

<!-- End -->
</body>

</html>
