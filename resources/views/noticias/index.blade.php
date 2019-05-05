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
                        <h4>Noticias</h4>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <a id="btnNuevo" class="btn btn-default" href="/noticias/create">Nueva</a>
                        </div>
                        <div class="col-md-9"></div>
                        <div class="col-md-2">
                            <form id='formBuscar' method="post" action="/noticias/filtrar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                <input type="text" id="txtFiltro" name="filtro" class="form-control" placeholder="Buscar" value="{{$filtro}}"/>
                            </form>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-condensed">
                            <thead>
                                <tr>                                    
                                    <th>Titulo</th>
                                    <th>Fecha</th>
                                    <th>Noticia</th>
                                    <th>Imágen</th>
                                    <th class="text-center" style="width: 100px;">Aciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($noticias as $news)

                                <tr>                                    
                                    <td>{{ $news->titulo }}</td>
                                    <td>{{ date('d-m-Y',strtotime($news->fecha)) }}</td>
                                    <td>{{ $news->noticia }}</td>
                                    <td>                                        
                                        <img src="news/{{ $news->imagen }} " class='preview' />
                                    </td>
                                    <td>
                                        {{link_to_route("noticias.edit", $title="Editar", $parameters=$news->id, $attributes=['class'=>'btn btn-primary btn-xs'])}}
                                    </td>
                                </tr>

                                @endforeach

                                {{ $noticias->links() }}
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
<link type="text/css" href="{{ asset('css/news.css') }}" rel="stylesheet"/>
@endsection