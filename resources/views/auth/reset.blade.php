@extends('layouts.principal')

@section('content')

@include('alerts.alerts')

<h3 class="head">Crear nueva contraseña</h3>
<div class="contact-form">
    <form action="/password/reset" method="post">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        
        <div class="col-md-6 contact-left">
            <p><input type="text" id="email" name="email" placeholder="E-mail" required/></p>            
            <p><input type="password" id="password" name="password" placeholder="Ingresa la nueva contraseña" required/></p>
            <p><input type="password" id="confirmPassword" name="confirmPassword" placeholder="Repite la nueva contraseña" required/></p> 
        </div>
        <div class="col-md-6 contact-right">            
            <input type="submit" value="Enviar link"/>
        </div>
        <div class="clearfix"></div>
    </form>
</div>

@include('includes.maps')

@endsection

@section('style')
<link type="text/css" href="{{ asset('css/resetPwd.css')}}" rel="stylesheet"/>
@endsection