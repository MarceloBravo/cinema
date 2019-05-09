<div class='form-group col-md-9'>
    <div class="form-group">
        {{ Form::label('lblLogoApp', 'Logo de la página:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            <input type='file' id='imagen_app' name='imagen_app' onchange='refreshLogo(this)'/>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblNombreApp', 'Nombre de la pág.:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('nombre_app',null,['class'=>'form-control', 'placelholder'=>'Ingresa el nombre de la pelicula']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblFooterTitle', 'Título pie de pág.:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('footer_title',null,['class'=>'form-control', 'placelholder'=>'Ingresa el nombre de la pelicula']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblText', 'Texto :', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('footer_text',null,['class'=>'form-control', 'placelholder'=>'Ingresa el rango de edad apto para ésta película']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblText2', 'E-mail:', ['class'=>'col-md-4 control-label']) }}
        <div class="col-md-7">
            {{ Form::text('footer_text2',null,['class'=>'form-control', 'placelholder'=>'Ingresa el nombre del director']) }}
        </div>
    </div>

</div>
