<div class="form-group col-md-2">
    <img id="imagePreview" name="imagePreview" src="" class='formAfiche'/>                        
</div>
<div class='form-group col-md-10'>
    <div class="form-group">
        {{ Form::label('lblTitulo', 'Titulo:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('titulo',null,['class'=>'form-control', 'placelholder'=>'Ingresa el nombre de la pelicula']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblNoticia', 'Noticia:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('noticia',null,['class'=>'form-control', 'placelholder'=>'Ingresa la duración de la pelicula']) }}    
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblFecha', 'Fecha:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::date('fecha',(isset($noticia->fecha) ? Carbon\Carbon::parse($noticia->fecha)->format('Y-m-d') : null),['class'=>'form-control']) }}    
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblImagen', 'Imagen:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            <input type='file' id='imagen' name='imagen' onchange='refreshImage(this)'/>
        </div>
    </div>
</div>