@extends('layouts.principal')

@section('content')

<div class="single-content">
    <div class="top-header span_top">
    <div class="logo">
            <a href="index.html"><img src="/images/logo.png" alt="" /></a>
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
        <h3 class="head">Película</h3>
        <div class="col-md-9 reviews-grids">
            <div class="review">
                <div class="movie-pic">
                    <img src="/afiches/{{ $movie->afiche }}" alt="" />
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
            <div class="story-review">
                <h4>Resumen</h4>
                <p>Hitoria:<i> {{ $movie->resumen }}</i></p>
            </div>
        </div>
        

        <div class="clearfix"></div>
    </div>
</div>


@endsection