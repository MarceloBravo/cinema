<?php $navReviews = "active" ?>

@extends('layouts.principal')

@section('content')


<div class="review-content">
    <div class="top-header span_top">
        <div class="logo">
            <a href="index.html"><img src="images/logo.png" alt="" /></a>
            <p>Movie Theater</p>
        </div>
        <!--
        <div class="search v-search">            
            <form>
                <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'Search..';
                                                        }"/>
                <input type="submit" value="">
            </form>            
        </div>
        -->
        <div class="clearfix"></div>
    </div>
    <div class="reviews-section">
        <h3 class="head">Películas</h3>
        <div class="col-md-9 reviews-grids">
            
            @foreach($movies as $movie)
                                                        
            <div class="review">
                <div class="movie-pic">
                    <a href="/single/{{ $movie->id }}"><img src="afiches/{{ $movie->afiche }}" alt="" /></a>
                </div>
                
                
                <div class="review-info">
                    <a name="{{ $movie->nombre }}" class="span" href="single.html"><i>{{ $movie->nombre }}</i></a>
                    <p class="dirctr"><a href="">{{ $movie->director }}</a>{{ $movie->fecha }}</p>								
                    <p class="ratingview">Evaluación de la crítica:</p>
                    <div class="rating">
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                    </div>
                    <p class="ratingview">
                        &nbsp;3.5/5  
                    </p>
                    <div class="clearfix"></div>
                    <p class="ratingview c-rating">Promedio de la crítica:</p>
                    <div class="rating c-rating">
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                    </div> 	
                    <p class="ratingview c-rating">								
                        &nbsp; 3.3/5</p>
                    <div class="clearfix"></div>
                    <div class="yrw">
                        <!--
                        <div class="dropdown-button">           			
                            <select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
                                <option value="0">Your rating</option>	
                                <option value="1">1.Poor</option>
                                <option value="2">1.5(Below average)</option>
                                <option value="3">2.Average</option>
                                <option value="4">2.5(Above average)</option>
                                <option value="5">3.Watchable</option>
                                <option value="6">3.5(Good)</option>
                                <option value="7">4.5(Very good)</option>
                                <option value="8">5.Outstanding</option>
                            </select>
                        </div>                        
                        -->
                        <div class="wt text-center">
                            <a href="{{ $movie->triller }}" target="_blank">Ver el triller</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-3">Elenco:</label>
                        <label class="col-md-9">{{ $movie->reparto }}</label>    
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3">Dirección:</label>
                        <label class="col-md-9">{{ $movie->director }}</label>    
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3">Genero:</label>
                        <label class="col-md-9">{{ $movie->genero }}</label>    
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3">Duración:</label>
                        <label class="col-md-9">{{ $movie->duracion }}</label>    
                    </div>
                </div>
                <div class="clearfix"></div>
                
            </div>

            @endforeach                                                        
            {{ $movies->links() }}
        </div>
        

        <div class="col-md-3 side-bar">
            <div class="featured">
                <h3>En ésta página</h3>
                <ul>
                    @foreach($movies as $movie)
                    <li>
                        <a href="#{{ $movie->nombre }}"><img src="afiches/{{ $movie->afiche }}" alt="" /></a>
                        <p>{{ $movie->nombre }}</p>
                    </li>
                    @endforeach
                    <div class="clearfix"></div>
                </ul>
            </div>

            <div class="entertainment">
                <h3>Noticias</h3>
                @foreach($noticias as $news)
                <ul>
                    
                    <li class="ent">
                        <a href="#"><img src="news/{{ $news->imagen }}" alt="" /></a>
                    </li>
                    
                    <li>
                        <strong>{{ $news->titulo }}</strong>
                        <p> {{ date('d-m-Y',strtotime($news->fecha)) }}</p>
                        <p> {{ $news->noticia }}</p>

                    </li>
                    <div class="clearfix"></div>
                </ul>
                @endforeach                 
            </div>
            <div class="might">
                <h4>You might also like</h4>
                <div class="might-grid">
                    <div class="grid-might">
                        <a href="single.html"><img src="images/mi.jpg" class="img-responsive" alt=""> </a>
                    </div>
                    <div class="might-top">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
                        <a href="single.html">Lorem Ipsum <i> </i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="might-grid">
                    <div class="grid-might">
                        <a href="single.html"><img src="images/mi1.jpg" class="img-responsive" alt=""> </a>
                    </div>
                    <div class="might-top">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
                        <a href="single.html">Lorem Ipsum <i> </i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="might-grid">
                    <div class="grid-might">
                        <a href="single.html"><img src="images/mi2.jpg" class="img-responsive" alt=""> </a>
                    </div>
                    <div class="might-top">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
                        <a href="single.html">Lorem Ipsum <i> </i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="might-grid">
                    <div class="grid-might">
                        <a href="single.html"><img src="images/mi3.jpg" class="img-responsive" alt=""> </a>
                    </div>
                    <div class="might-top">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
                        <a href="single.html">Lorem Ipsum <i> </i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!---->
            <div class="grid-top">
                <h4>Archivos</h4>
                <ul>
                    @foreach($archivos as $file)
                        <li><a href="docs/{{ $file->ruta }}" download>{{ $file->archivo }} </a>{{ $file->descripcion }}</li>
                    @endforeach
                </ul>
            </div>
            <!---->

        </div>

        <div class="clearfix"></div>
    </div>
</div>
<div class="review-slider">
    <ul id="flexiselDemo1">
        @foreach($carrusel as $item)                                                        
            <li><img src="afiches/{{ $item->afiche }}" alt=""/></li>
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
                        visibleItems: 3
                    }
                }
            });
        });
    </script>
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>	
</div>

@endsection