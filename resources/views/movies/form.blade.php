<div class='form-group col-md-10'>
    <div class="form-group">
        {{ Form::label('lblNombre', 'Nombre:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
        {{ Form::text('nombre', null,['class'=>'form-control', 'placelholder'=>'Ingresa el nombre de la pelicula']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblDuracion', 'Duración:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
        {{ Form::text('duracion', null,['class'=>'form-control', 'placelholder'=>'Ingresa la duración de la pelicula']) }}    
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblReparto', 'Reparto:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
        {{ Form::text('reparto', null,['class'=>'form-control', 'placelholder'=>'Ingresa la lista de actores de la pelicula']) }}    
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblDirector', 'Director:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
        {{ Form::text('director', null,['class'=>'form-control', 'placelholder'=>'Ingresa el nombre del director']) }}    
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblAfiche', 'Afiche:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::file('afiche', ['onchange'=>'refreshImage(this)'])}}
            <!-- <input type='file' id='afiche' name='afiche' onchange='refreshImage(this)'/> -->
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblGenero', 'Genero:', ['class'=>'col-md-4 control-label'])}}
        <div class="col-md-7">
        {{ Form::select('genre_id', $generos, null, ['id'=>'genero_id', 'class'=>'form-control'])}}    
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblTriller', 'Triller:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
        {{ Form::text('triller', null,['class'=>'form-control', 'placelholder'=>'Ej.: www.trillerpelicula.com']) }}    
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('lblFecha', 'Fecha de lanzamiento:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
        {{ Form::text('fecha', null,['class'=>'form-control', 'placelholder'=>'Ej.: 7 de Noviembre de 20XX']) }}    
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('lblResumen', 'Resumen:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
        {{ Form::text('resumen', null, ['class'=>'form-control', 'placelholder'=>'Ingresa una reseña de la pelicula.']) }}    
        </div>
    </div>
</div>