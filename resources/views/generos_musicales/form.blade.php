<div class="form-group">
    {{ Form::label('lblGenero','Nombre',['class'=>'col-md-4 control-label'])}}
    <div class="col-md-7">
        {{ Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del género musical.'])}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('lblDescripcion','Descripción',['class'=>'col-md-4 control-label'])}}
    <div class="col-md-7">
        {{ Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Ingresa una descripción para el género musical'])}}
    </div>
</div>