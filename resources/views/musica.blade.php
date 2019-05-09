<?php $navVideos = "active" ?>

@extends('layouts.principal')

@section('content')

<div class="video-content">
    <div class="top-header span_top">
        <div class="logo">
            <a href="index.html"><img src="images/logo.png" alt="" /></a>
            <p>Movie Theater</p>
        </div>
        <div class="search v-search">
            <form id='formBuscar' method="post" action="/mnt_videos/filtrar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <input type="text" id="txtFiltro" name="filtro" class="form-control" placeholder="Buscar" value="{{$filtro}}" onchange="filtrar()"/>
            </form>
            <!--
            <form id="">
                <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'Search..';
                                                        }"/>
                <input type="submit" value="">
            </form>
            -->
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="right-content">
        <div class="right-content-heading">
            <div class="right-content-heading-left">
                <h3 class="head">Últimos videos</h3>
            </div>
        </div>
        <!-- pop-up-box --> 
        <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
        <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
        <script>
                                           $(document).ready(function () {
                                               $('.popup-with-zoom-anim').magnificPopup({
                                                   type: 'inline',
                                                   fixedContentPos: false,
                                                   fixedBgPos: true,
                                                   overflowY: 'auto',
                                                   closeBtnInside: true,
                                                   preloader: false,
                                                   midClick: true,
                                                   removalDelay: 300,
                                                   mainClass: 'my-mfp-zoom-in'
                                               });
                                           });
        </script>		

        <!--//pop-up-box -->

        <div class="content-grids">
            @foreach($videos as $video)
            <div class="content-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="{{ asset('img_video/'.$video->imagen) }}" title="{{ $video->nombre }}" /></a>
                <h3><p>{{ $video->nombre }}</p><p>{{ $video->artista }}</p><p>{{ $video->fecha_lanzamiento }}</p></h3>
                <ul>
                    <li><a href="#"><img src="/images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="/images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="/images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog{{ $video->id }}">Ver el video</a>
            </div>            
            <div id="small-dialog{{ $video->id }}" class="mfp-hide">
                <iframe  src="{{ $video->url }}" frameborder="0" allowfullscreen></iframe>
            </div>
            @endforeach
            
            <!--
            <div class="content-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/gridallbum2.jpg" title="allbum-name" /></a>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                <ul>
                    <li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
            </div>
            <div class="content-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/gridallbum3.jpg" title="allbum-name" /></a>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                <ul>
                    <li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
            </div>
            <div class="content-grid last-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/gridallbum4.jpg" title="allbum-name" /></a>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                <ul>
                    <li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
            </div>
            <div class="content-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/gridallbum5.jpg" title="allbum-name" /></a>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                <ul>
                    <li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
            </div>
            <div class="content-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/gridallbum6.jpg" title="allbum-name" /></a>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                <ul>
                    <li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
            </div>
            <div class="content-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/gridallbum7.jpg" title="allbum-name" /></a>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                <ul>
                    <li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
            </div>
            <div class="content-grid last-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/gridallbum8.jpg" title="allbum-name" /></a>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                <ul>
                    <li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
            </div>
            <div class="content-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/gridallbum9.jpg" title="allbum-name" /></a>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                <ul>
                    <li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
            </div>
            <div class="content-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/gridallbum10.jpg" title="allbum-name" /></a>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                <ul>
                    <li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
            </div>
            <div class="content-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/gridallbum11.jpg" title="allbum-name" /></a>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                <ul>
                    <li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
            </div>
            <div class="content-grid last-grid">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/gridallbum1.jpg" title="allbum-name" /></a>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                <ul>
                    <li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
                    <li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
                </ul>
                <a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
            </div>
            -->
            <div class="clearfix"> </div>
            <!---start-pagenation----->
            {{ $videos->links() }}
            <div class="clearfix"> </div>
            <!---End-pagenation----->
        </div>
    </div>
    <div class="clearfix"> </div>
</div>	

@endsection

@section('style')
<link type="text/css" href="{{ asset('css/home.css') }}" rel="stylesheet"/>
@endsection