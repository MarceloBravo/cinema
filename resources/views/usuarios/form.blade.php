<div class="form-group">
    {{ Form::label('lblEmail', 'Nombre',['class'=>'col-md-4 control-label']) }}
    <div class="col-md-7">
        {{ Form::text('name',null,['id'=>'usuario','class'=>'form-control','placeholder'=>'Ingresa el nombre de usuario']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('lblEmail', 'Email',['class'=>'col-md-4 control-label']) }}
    <div class="col-md-7">
        {{ Form::text('email',null,['id'=>'email','class'=>'form-control','placeholder'=>'Ingresa el correo electrónico']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('lblRol', 'Rol',['class'=>'col-md-4 control-label']) }}
    <div class="col-md-7">
        {{ Form::select("rol_id", $roles, null, ["id"=>"id_rol", "class"=>"form-control"])}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('lblPassword','Password',['class'=>'col-md-4 control-label']) }}
    <div class="col-md-7">
        {{ Form::password('password',null, ['id'=>'password', 'class'=>'form-control','placeholder'=>'Ingrese una contraseña']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('lblPassword','Confirmación de contraseña',['class'=>'col-md-4 control-label']) }}
    <div class="col-md-7">
        {{ Form::password('confirm-password', null, ['id'=>'confirm-password', 'class'=>'Vuelva a ingresar la contraseña'])}}
    </div>
</div>