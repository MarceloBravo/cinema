<?php $navContacto = "active" ?>

@extends('layouts.principal')

@section('content')

@include('alerts.alerts')

<h3 class="head">CONTACTO</h3>
<p>Siempre podremos ayudarte</p>
<div class="contact-form">
    <form action="/contacto" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        
        <div class="col-md-6 contact-left">
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required/>
            <input type="text" id="email" name="email" placeholder="E-mail" required/>
            <input type="text" id="fono" name="fono" placeholder="Fono" required/>
        </div>
        <div class="col-md-6 contact-right">
            <textarea id="mensaje" name="mensaje" placeholder="Mensaje"></textarea>
            <input type="submit" value="Enviar"/>
        </div>
        <div class="clearfix"></div>
    </form>
</div>

@include('includes.maps')

@endsection