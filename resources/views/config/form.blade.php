<div class='form-group col-md-9'>
    <div class="form-group">
        {{ Form::label('lblPortada', 'Cargar imágen de portada:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            <input type='file' id='imagen_portada' name='imagen_portada' onchange='refreshImage(this)'/>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblMovie', 'Película:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('nombre_pelicula_portada',null,['class'=>'form-control', 'placelholder'=>'Ingresa el nombre de la pelicula']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblEdad', 'Edad:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('censura_pelicula_portada',null,['class'=>'form-control', 'placelholder'=>'Ingresa el rango de edad apto para ésta película']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblDirector', 'Director:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('director_pelicula_portada',null,['class'=>'form-control', 'placelholder'=>'Ingresa el nombre del director']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblNota', 'Nota:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('calificacion_pelicula_portada',null,['class'=>'form-control', 'placelholder'=>'Ingresa la nota que dan las crítica']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblFecha', 'Fecha:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('fecha_pelicula_portada',null,['class'=>'form-control', 'placelholder'=>'Escribe la fecha de realización']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblGenero', 'Genero:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::select('genre_id',$generos, null,['class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblResena', 'Reseña:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('resena_pelicula_portada',null,['class'=>'form-control', 'placelholder'=>'Ingresa una reseña para ésta película']) }}
        </div>
    </div>

</div>
