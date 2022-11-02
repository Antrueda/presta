<div class="form-group col-md-6">
        {{ Form::label('created_at', 'FECHA Y HORA DE REGISTRO', ['class' => 'control-label col-form-label-sm']) }}
        <div id="created_at" class="form-control form-control-sm">
            {{$todoxxxx["fechcrea"]}}
        </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('created_at', 'FECHA Y HORA DE ACTUALIZACI&Oacute;N', ['class' => 'control-label col-form-label-sm']) }}
        <div id="updated_at" class="form-control form-control-sm">
            {{$todoxxxx["fechedit"]}}
        </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('created_at', 'USUARIO QUE REGISTR&Oacute;', ['class' => 'control-label col-form-label-sm']) }}
        <div id="user_crea_id" class="form-control form-control-sm">
            {{$todoxxxx["usercrea"]}}
        </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('created_at', 'USUARIO QUE ACTUALIZ&Oacute;', ['class' => 'control-label col-form-label-sm']) }}
        <div id="user_edita_id" class="form-control form-control-sm">
            {{$todoxxxx["useredit"]}}
        </div>
    </div>
