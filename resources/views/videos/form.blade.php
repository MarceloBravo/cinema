<div class='form-group col-md-10'>
    <div class="form-group">
        {{ Form::label('lblGenero','Nombre',['class'=>'col-md-4 control-label'])}}
        <div class="col-md-7">
            {{ Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del género musical.'])}}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblArtista','Artista',['class'=>'col-md-4 control-label'])}}
        <div class="col-md-7">
            {{ Form::text('artista',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Ingresa e nombre del artista'])}}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblDescripcion','Reseña',['class'=>'col-md-4 control-label'])}}
        <div class="col-md-7">
            {{ Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Ingresa una descripción del video'])}}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblGenero','Genero',['class'=>'col-md-4 control-label'])}}
        <div class="col-md-7">
            {{ Form::select('genero_id',$generos, null,['id'=>'genero_id','class'=>'form-control','placeholder'=>'Selecciona el género musical'])}}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblUrl','URL',['class'=>'col-md-4 control-label'])}}
        <div class="col-md-7">
            {{ Form::text('url',null,['id'=>'url','class'=>'form-control','placeholder'=>'Ingresa una descripción para el género musical'])}}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblFechaLanzamiento','Fecha de lanzamiento',['class'=>'col-md-4 control-label'])}}
        <div class="col-md-7">
            {{ Form::text('fecha_lanzamiento',null,['id'=>'fechaLanzamiento','class'=>'form-control','placeholder'=>'Ingresa una descripción para el género musical'])}}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblImagen','Imágen',['class'=>'col-md-4 control-label'])}}
        <div class="col-md-7">
            {{ Form::file('imagen',['id'=>'imagen','class'=>'form-control','placeholder'=>'Agrega una imágen para el video','onchange'=>'refreshImage(this)'])}}
        </div>
    </div>
</div>