@extends('layouts.admin')

@section('content')

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
                    <form id="form" class="js-validation-bootstrap form-horizontal" action="/generos" method="POST">
                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="usuario">Genero: <span class="text-orange">*</span></label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" id="genero" name="genero" placeholder="Ingresa el nombre del género." />
                            </div>
                        </div>
                        <div class="form-group m-b-0 divFormButtons">
                            <div class="col-md-8 col-md-offset-4">
                                <button class="btn btn btn-primary" type="button" onclick="grabar()">Grabar</button>
                                <button class="btn btn btn-danger" type="button" disabled>Eliminar</button>
                                <button id="btnCancelar" class="btn btn btn-default" type="button" onclick="cancelar('/generos')">Cancelar</button>
                            </div>
                        </div>
                    </form>
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
<script src="{{asset('js/generic.js')}}"></script>
@endsection