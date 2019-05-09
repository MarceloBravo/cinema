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
                    <h4>Géneros musicales</h4>
                    <ul class="card-actions">
                        <li>
                            <button type="button"><i class="ion-more"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="card-block">
                    <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/base_forms_validation.js) -->
                    <!-- For more examples please check https://github.com/jzaefferer/jquery-validation -->
                    {{ Form::open(['id'=>'form','route'=>'generos_musicales.store','method'=>'POST','class'=>'js-validation-bootstrap form-horizontal'])}}
                        
                        @include('generos_musicales.form')
                    
                        <div class="form-group m-b-0 divFormButtons">
                            <div class="col-md-8 col-md-offset-4">
                                <button class="btn btn btn-primary" type="button" onclick="grabar()">Grabar</button>
                                <button class="btn btn btn-danger" type="button" disabled>Eliminar</button>
                                <button id="btnCancelar" class="btn btn btn-default" type="button" onclick="cancelar('/generos_musicales')">Cancelar</button>
                            </div>
                        </div>
                    {{ Form::close()}}
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