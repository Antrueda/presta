<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('sis_clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}

        {{ Form::select('sis_clinica_id', $todoxxxx['clinicid'], null, ['class' => $errors->first('sis_clinica_id') ?
    'form-control is-invalid select2' : 'form-control select2','id'=>'sis_clinica_id']) }}

        @if($errors->has('sis_clinica_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_clinica_id') }}
        </div>
        @endif
    </div>


    <div class="form-group col-md-6">
        {{ Form::label('name', 'Nombres:', ['class' => 'control-label col-form-label-sm']) }}

        {{ Form::text('name', null, ['class' => $errors->first('name') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Nombres', 'maxlength' => '120', 'autofocus']) }}
        @if($errors->has('name'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('documento', 'Cédula:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('documento', null, ['class' => $errors->first('documento') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Cédula', 'maxlength' => '120', 'autofocus']) }}
        @if($errors->has('documento'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('documento') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('telefono', 'Teléfono:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('telefono', null, ['class' => $errors->first('telefono') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Teléfono', 'maxlength' => '120', 'autofocus']) }}
        @if($errors->has('telefono'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('telefono') }}
        </div>
        @endif
    </div>


    <div class="form-group col-md-6">
        {{ Form::label('email', 'E-mail:', ['class' => 'control-label col-form-label-sm']) }}

        {{ Form::text('email', null, ['class' => $errors->first('email') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'E-mail', 'maxlength' => '120', 'autofocus']) }}

        @if($errors->has('email'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('password', 'Contraseña:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::password('password', ['class' => $errors->first('password') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Contraseña', 'maxlength' => '120', 'autofocus']) }}
        @if($errors->has('password'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id']) }}
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
