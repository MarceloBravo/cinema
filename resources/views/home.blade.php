<?php $navHome = "active" ?>

@extends('layouts.principal')

@section('content')

@include('alerts.alerts')

<div class="header" style="background: url('../../afiches/{{ $config->imagen_portada }}') no-repeat 0px 0px;">
        <div class="top-header">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="images/{{ $config->imagen_app }}" alt="" /></a>
                <p>{{ $config->nombre_app }}</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="header-info">
            
            
            <h1>{{ $config->nombre_pelicula_portada }}</h1>            
            <p class="age"><a href="#">{{ $config->censura_pelicula_portada }}</a>{{$config->director_pelicula_portada }}</p>
            <p class="review">Nota	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;  {{ $config->calificacion_pelicula_portada }}</p>
            <p class="review reviewgo">Genero	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; {{ $config->genero }}</p>
            <p class="review">Fecha realización &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp; {{ $config->fecha_pelicula_portada }}</p>
            <p class="special">{{ $config->resena_pelicula_portada }}</p>
           <!--
            <a class="video" href="#"><i class="video1"></i>WATCH TRAILER</a>
            <a class="book" href="#"><i class="book1"></i>BOOK TICKET</a>
            -->
            <form action="home" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <p><input type="email" id="email" name="email" placeholder="Ingresa tu email" required class="form-control"/></p>
                <br/>
                <p><input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required class="form-control"/></p>
                <br/>
                <div class='form-group'>
                    <div class='col-md-4'>
                        <button type="submit" class="btn btn-app-purple">Ingresar</button>
                    </div>
                    <div class='col-md-8'>
                        <a class="lnkResetPwd" href="{{ url('/password/email')}}">¿Olvidastes tu contraseña?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="review-slider">
        <ul id="flexiselDemo1"
            @foreach($carrusel1 as $movie)
                <li><img src="afiches/{{ $movie->afiche }}" alt="" onclick="loadTriller('{{ $movie->triller }}')"/></li>
            @endforeach
        </ul>
        <script type="text/javascript">
            $(window).load(function () {

                $("#flexiselDemo1").flexisel({
                    visibleItems: 6,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: false,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 2
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 3
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 4
                        }
                    }
                });
            });
        </script>
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>	
    </div>
    <div class="video">
        <iframe id="iframeTriller" width="560" height="315" src="https://www.youtube.com/embed/boO2nQ3RJFs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <!-- <iframe  src="https://www.youtube.com/embed/2LqzF5WauAw" frameborder="0" allowfullscreen></iframe> -->
    </div>
    <div class="news">
        <div class="col-md-6 news-left-grid">
            <h3>{{ $config->titulo1 }}</h3>
            <h2>{{ $config->titulo2 }}</h2>
            <h4>{{ $config->titulo3 }}</h4>
            <!-- <a href="#"><i class="book"></i>BOOK TICKET</a> -->
            <p>{{ $config->titulo4 }}</p>
        </div>
        <div class="col-md-6 news-right-grid">
            <h3>Noticias</h3>
            @foreach($noticias as $news)
            <div class="news-grid">
                <h5>{{ $news->titulo }}</h5>
                <label>{{ date("d-m-Y", strtotime($news->fecha)) }}</label>
                <p>{{ $news->noticia }}</p>
            </div>
            @endforeach
            <!-- <a class="more" href="#">MORE</a> -->
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="more-reviews">
        <ul id="flexiselDemo2">
            @foreach($carrusel2 as $movie)            
                <li><img src="afiches/{{ $movie->afiche }}" alt=""/></li>
            @endforeach
        </ul>
        <script type="text/javascript">
            $(window).load(function () {

                $("#flexiselDemo2").flexisel({
                    visibleItems: 4,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: false,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 2
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 3
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 3
                        }
                    }
                });
            });
        </script>
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>	
    </div>	
                
@endsection

@section('style')
<link type="text/css" href="{{ asset('css/home.css') }}" rel="stylesheet"/>
@endsection

@section('script')
<script type="text/javascript" src="js/home.js"></script>

@endsection

                