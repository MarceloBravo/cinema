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
                    <h4>Noticias</h4>
                    <ul class="card-actions">
                        <li>
                            <button type="button"><i class="ion-more"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="card-block">
                    <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/base_forms_validation.js) -->
                    <!-- For more examples please check https://github.com/jzaefferer/jquery-validation -->
                    {{ Form::Model($noticia, ['id'=>'form', 'route'=>['noticias.update', $noticia->id], 'method'=>'PUT', 'files'=>true,'class'=>'js-validation-bootstrap form-horizontal']) }}

                        <div class="form-group col-md-2">
                            <img id="imagePreview" name="imagePreview" src="../../news/{{ $noticia->imagen }}" class='formAfiche'/>
                            <input type="hidden" id="imgActual" name="imgActual" value="{{ $noticia->imagen }}" />
                        </div>
                        @include('noticias.form')
                    
                    {{ Form::close() }}    
                    <form id="formDelete" action="/noticias/{{ $noticia->id }}" method="POSST">
                        <input type="hidden" name="_method" value="DELETE"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    </form>
                    <div class="form-group m-b-0 divButtons">
                        <div class="col-md-8 col-md-offset-4">
                            <button class="btn btn btn-primary" type="button" onclick="grabar()">Grabar</button>
                            <button class="btn btn btn-danger" type="button" onclick="eliminar()">Eliminar</button>
                            <button id="btnCancelar" class="btn btn btn-default" type="button" onclick="cancelar('/noticias')">Cancelar</button>
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

    <!-- Terms Modal -->
    <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin">
            <div class="modal-content">
                <div class="card m-b-0">
                    <div class="card-header bg-app bg-inverse">
                        <h4>Terms &amp; Conditions</h4>
                        <ul class="card-actions">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-block">
                        <h4 class="m-t">1. <strong>General</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta.
                            Integer fermentum tincidunt auctor.</p>
                        <h4>2. <strong>Account</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta.
                            Integer fermentum tincidunt auctor.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-app" type="button" data-dismiss="modal"><i class="ion-checkmark"></i> Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Terms Modal -->
</div>
<!-- End Page Content -->

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/upload_images.js') }}"></script>
@endsection

@section('style')
<link type='text/css' href="{{ asset('css/mantenedor_peliculas.css') }}" rel="stylesheet"/>
@endsection