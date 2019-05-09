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
                    <h4>Peliculas</h4>
                    <ul class="card-actions">
                        <li>
                            <button type="button"><i class="ion-more"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="card-block">
                    <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/base_forms_validation.js) -->
                    <!-- For more examples please check https://github.com/jzaefferer/jquery-validation -->                    
                    {{ Form::model($pelicula,['id'=>'form', 'route'=>['movies.update',$pelicula->id], 'method'=>'PUT', 'files'=>true,'class'=>'js-validation-bootstrap form-horizontal']) }}
                        
                        <div class="form-group col-md-2">
                            <img id="imagePreview" name="imagePreview" src="../../afiches/{{ $pelicula->afiche }}" class='formAfiche'/>
                            <input type="hidden" id="aficheActual" name="aficheActual" value="{{ $pelicula->afiche }}" />
                        </div>
                        @include('movies.form')
                    {{ Form::close() }}
                    <form id='formDelete' method='post' action='/movies/{{ $pelicula->id }}'/>
                        <input type='hidden' name='_method' value='DELETE'/>
                        <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
                    </form>
                    <div class="form-group m-b-0 divButtons">
                        <div class="col-md-8 col-md-offset-4">
                            <button class="btn btn btn-primary" type="button" onclick="grabar()">Grabar</button>
                            <button class="btn btn btn-danger" type="button" onclick='eliminar()'>Eliminar</button>
                            <button id="btnCancelar" class="btn btn btn-default" type="button" onclick="cancelar('/movies')">Cancelar</button>
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

</div>
<!-- End Page Content -->


@endsection

@section('style')
    <link type="text/css" href="{{ asset('css/mantenedor_peliculas.css') }}" rel="stylesheet"/>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/upload_images.js') }}"></script>
@endsection

