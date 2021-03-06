@extends('layouts.admin')

@section('content')


<main class="app-layout-content formTable">

    <!-- Page Content -->
    <div class="container-fluid p-y-md">
        <div class="row">
            
            @include('alerts.alerts')

            <div class="col-lg-12">
                <!-- Condensed Table -->
                <div class="card">
                    <div class="card-header">
                        <h4>Repositorio</h4>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <a id="btnNuevo" class="btn btn-default" href="/repository/create">Nuevo</a>
                        </div>
                        <div class="col-md-9"></div>
                        <div class="col-md-2">
                            <form id='formBuscar' method="post" action="/usuarios/filtrar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                <input type="text" id="txtFiltro" name="filtro" class="form-control" placeholder="Buscar" value="{{$filtro}}"/>
                            </form>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-condensed">
                            <thead>
                                <tr>                                    
                                    <th>Nombre</th>
                                    <th>Archivo (Descargar)</th>
                                    <th class="text-center" style="width: 100px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($archivos as $item)

                                <tr>                                    
                                    <td>{{ $item->archivo }}</td>
                                    <td><a href='docs/{{ $item->ruta }}' download>{{ $item->ruta }}</a></td>
                                    <td>
                                        {{link_to_route("repository.edit", $title="Editar", $parameters=$item->id, $attributes=['class'=>'btn btn-primary btn-xs'])}}                              
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                        {{ $archivos->links()}}
                    </div>
                    <!-- .card-block -->
                </div>
                <!-- .card -->
                <!-- End Condensed Table -->
            </div>
            <!-- .col-lg-6 -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container-fluid -->
    <!-- End Page Content -->

</main>


@endsection