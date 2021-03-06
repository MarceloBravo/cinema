@extends('layouts.admin')

@section('content')

@include('alerts.alerts')
@include('alerts.alertRequest')

<!-- Page Content -->
<div class="container-fluid p-y-md">
    <!-- Forms Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Bootstrap Forms Validation -->
            <div class="card">
                <div class="card-header">
                    <h4>Configuración</h4>
                    <ul class="card-actions">
                        <li>
                            <button type="button"><i class="ion-more"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="card-block">

                    <div class="card">    
                        <div class="card-block tab-content bg-white">
                            @include('config.tabs')
                            {{ Form::open(['id'=>'form', 'route'=>'config.store', 'method'=>'POST', 'files'=>true,'class'=>'js-validation-bootstrap form-horizontal']) }}

                            <!-- Portada -->
                            <div class="tab-pane fade fade-in in active" id="frontpage">
                                <div class="b-b m-b-md">
                                    <h2>Portada <small class="h5 text-muted">Configure la imágen y el texto principal de la portada</small></h2>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-3">
                                        <img id="imagePreview" name="imagePreview" src="" class='formAfiche'/>                        
                                    </div>
                                    @include('config.form')

                                </div>
                            </div>
                            <!-- Fin portada -->
                            
                            <!-- Titulares -->
                            <div class="tab-pane fade fade-in" id="titles">
                                <div class="b-b m-b-md">
                                    <h2>Titulares <small class="h5 text-muted">Ingrese el o los titulares a mostrar en la portada</small></h2>
                                </div>                            
                                @include('config.titulares')
                            </div>
                            <!-- Fin titulares -->
                            
                            <!-- Cabecera y pie de página -->
                            <div class="tab-pane fade fade-in" id="header_footer">
                                <div class="b-b m-b-md">
                                    <h2>Cabecera y pie de página <small class="h5 text-muted">Configure el texto a mostrar en la cabecera y pie de página del Fontend</small></h2>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <img id="logoPreview" name="logoPreview" src="" class='logoPreview'/>                        
                                    </div>
                                    @include('config.form_header_footer')
                                </div>
                            </div>
                            <!-- Fin cabecera y pie de página -->
                            {{ Form::close() }}

                        </div>
                    </div>

                    <div class="form-group m-b-0 divButtons">
                        <div class="col-md-8 col-md-offset-4">
                            <button class="btn btn btn-primary" type="button" onclick="grabar()">Grabar</button>
                            <button class="btn btn btn-danger" type="button" disabled>Eliminar</button>
                            <!-- <button id="btnCancelar" class="btn btn btn-default" type="button" onclick="cancelar('/movies')">Cancelar</button> -->
                        </div>
                    </div>


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
<link type="text/css" href='{{ asset('css/mantenedor_peliculas.css') }}' rel='stylesheet'/>
<link type="text/css" href='{{ asset('css/config.css') }}' rel='stylesheet'/>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/upload_images.js') }}"></script>
@endsection