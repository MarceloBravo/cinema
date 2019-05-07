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
                        <h4>Peliculas</h4>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <a id="btnNuevo" class="btn btn-default" href="/movies/create">Nuevo</a>
                        </div>
                        <div class="col-md-9"></div>
                        <div class="col-md-2">
                            <form id='formBuscar' method="post" action="/movies/filtrar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                <input type="text" id="txtFiltro" name="filtro" class="form-control" placeholder="Buscar" value="{{$filtro}}" onchange="filtrar()"/>
                            </form>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-condensed">
                            <thead>
                                <tr>                                    
                                    <th>Nombre</th>
                                    <th>Duración</th>
                                    <th>Género</th>                                    
                                    <th>Afiche</th>                                    
                                    <th class="text-center" style="width: 100px;">Aciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($movies as $movie)

                                <tr>                                    
                                    <td>{{ $movie->nombre }}</td>
                                    <td>{{ $movie->duracion }}</td>
                                    <td>{{ $movie->genero }}</td>
                                    <td>                                        
                                        <img src="/afiches/{{ $movie->afiche }} " class='preview' />
                                    </td>
                                    <td>
                                        {{link_to_route("movies.edit", $title="Editar", $parameters=$movie->id, $attributes=['class'=>'btn btn-primary btn-xs'])}}
                                    </td>
                                </tr>

                                @endforeach
                                
                                @if($filtro == "")
                                    {{ $movies->links() }}
                                @endif
                            </tbody>
                        </table>
                        
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

@section('style')
<link rel="stylesheet" href='{{ asset('css/mantenedor_peliculas.css') }}'/> 
@endsection