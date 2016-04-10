<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/plugins/metisMenu/dist/metisMenu.min.css">
	<link rel="stylesheet" href="/assets/plugins/dist/css/sb-admin-2.css">
    @yield('css')
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="/admin">sarthakkhanal.com</a>
            </div>
            <!--toolbar-->
            @yield('toolbar')
            <!--end toolbar-->
            <!--menu -->
            @include('menu')
       		<!-- end: menu -->
        </nav>
       
		<!-- start: PAGE -->
		<div id="page-wrapper">	
		  
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                               {!! Session::get('success') !!} 
                            </div>
                   @elseif(Session::has('message'))
                    <div class="alert alert-info">
                                {!! Session::get('message') !!}
                            </div>
                    @elseif(Session::has('error'))
                    <div class="alert alert-danger">
                                {!! Session::get('error') !!}
                            </div>
                    @endif 
          @yield('content')
        </div>
		<!-- end: PAGE -->	
	</div>
		
	<script src="/assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
	<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/plugins/metisMenu/dist/metisMenu.min.js"></script>
    <script src="/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>   
    <script src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        var runDatePicker = function() {
        $('.date-picker').datepicker({
            autoclose: true
        });
        };
        runDatePicker();
        $(document).ready(function() {
            
            $(".input-mask-phone").mask('+(999) 99-9999999');
            $(".input-mask-mobile").mask('(+999) 9999999999');
            $(".date-picker").mask('99-99-9999');
            $(window).bind("load resize", function() {
                topOffset = 50;
                width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
                if (width < 768) {
                    $('div.navbar-collapse').addClass('collapse');
                    topOffset = 100; // 2-row-menu
                } else {
                    $('div.navbar-collapse').removeClass('collapse');
                }

                height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
                height = height - topOffset;
                if (height < 1) height = 1;
                if (height > topOffset) {
                    $("#page-wrapper").css("min-height", (height) + "px");
                }
            });

            var url = window.location;
            var element = $('ul.nav a').filter(function() {
                return this.href == url || url.href.indexOf(this.href) == 0;
            }).addClass('active').parent().parent().addClass('in').parent();
            if (element.is('li')) {
                element.addClass('active');
            }
        });
    </script>
	@yield('javascript')
		
</body>