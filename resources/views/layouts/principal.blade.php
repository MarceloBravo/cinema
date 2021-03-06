<!DOCTYPE html>
<html>
    <head>
        <title>Cinema A Entertainment Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>
        <link href="{{ asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- Custom Theme files -->
        <script src="{{ asset('js/jquery.min.js')}}"></script>
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Cinema Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        
        @yield('style')
    </head>
    <body>
        <!-- header-section-starts -->
        <div class="full">
            <div class="menu">
                <ul>
                    <li><a class="{{ (isset($navHome) ? $navHome : '') }}" href="{{ url('/') }}"><i class="home"></i></a></li>
                    <li><a class="{{ (isset($navVideos) ? $navVideos : '') }}" href="{{ url('/musica') }}"><div class="video"><i class="videos"></i><i class="videos1"></i></div></a></li>
                    <li><a class="{{ (isset($navReviews) ? $navReviews : '') }}" href="{{ url('/reviews') }}"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>                    
                    <li><a class="{{ (isset($navContacto) ? $navContacto : '') }}" href="{{ url('/contacto')}}"><div class="cnt"><i class="contact"></i><i class="contact1"></i></div></a></li>
                </ul>
            </div>
            <div class="main">
               
                @yield('content')
                	
                <div class="footer">
                    <h6>{{ $config->footer_title }} : </h6>
                    <p class="claim">{{ $config->footer_text }}</p>
                    <a href="{{ $config->footer_text2 }}">{{ $config->footer_text2 }}</a>
                    <div class="copyright">
                        <p> Template by  <a href="http://w3layouts.com">  W3layouts</a></p>
                    </div>
                </div>	
            </div>
        </div>
        <div class="clearfix"></div>
    </body>
    @yield('script')
</html>