@extends('layouts.admin')

@section('content')

@include('alerts.alertRequest')
<!-- Page Content -->
<div class="container-fluid p-y-md">
    <!-- Forms Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Bootstrap Forms Validation -->
            <div class="card">
                <div class="card-header">
                    <h4>Géneros</h4>
                    <ul class="card-actions">
                        <li>
                            <button type="button"><i class="ion-more"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="card-block">
                    <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/base_forms_validation.js) -->
                    <!-- For more examples please check https://github.com/jzaefferer/jquery-validation -->
                    {{ Form::model($genero, ['id'=>'form','route'=>['generos.update',$genero->id],'method'=>'PUT', 'class'=>'js-validation-bootstrap form-horizontal']) }}
                    
                        @include('generos.form')
                        
                    {{ Form::close() }}
                    
                    <form id="formDelete" action="/generos/{{ $genero->id }}" method="post">                        
                        <input type="hidden" name='_method' value='DELETE'>
                        <input type="hidden" name='_token' value="{{ csrf_token() }}"> 
                    </form>
                        <div class="form-group m-b-0 divFormButtons">
                            <div class="col-md-8 col-md-offset-4">
                                <button class="btn btn btn-primary" type="button" onclick="grabar()">Grabar</button>
                                <button class="btn btn btn-danger" type="button" onclick="eliminar()">Eliminar</button>
                                <button id="btnCancelar" class="btn btn btn-default" type="button" onclick="cancelar('/generos')">Cancelar</button>
                            </div>
                        </div>
                    
                </div>
                <!-- .card-block -->
            </div>
            <!-- .card -->
            <!-- Bootstrap Forms Validation -->
        </div>
        

    </div>
    <!-- .row -->
    <!-- End Forms Row -->

    @include('modals.modals')
</div>
<!-- End Page Content -->

@endsection

@section('script')
<script src="{{asset('js/generic.js')}}"></script>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/generic.css')}}" />
@endsection