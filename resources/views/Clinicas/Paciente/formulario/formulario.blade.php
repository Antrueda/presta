<div class="form-group row">
<div class="form-group col-md-12">
        {{ Form::label('sis_clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('sis_clinica_id', $todoxxxx['clinicai'], null, ['class' => $errors->first('sis_clinica_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'sis_clinica_id']) }}
        @if($errors->has('sis_clinica_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_clinica_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="registro" class="control-label col-form-label-sm">Fecha registro<strong> (<i>YYYY-MM-DD</i>)</strong>:</label>
        {{ Form::text('registro', null, ['class' => $errors->first('registro') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Fecha registro','readonly', 'id'=>'registro','maxlength' => '120','autocomplete'=>'off']) }}
        @if($errors->has('registro'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('registro') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('cedula', 'Cédula:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('cedula', null, ['class' => $errors->first('cedula') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Cédula', 'maxlength' => '120', 'autofocus']) }}
        @if($errors->has('cedula'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('cedula') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('nombres', 'Nombres:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('nombres', null, ['class' => $errors->first('nombres') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Nombres', 'maxlength' => '120', 'autofocus']) }}
        @if($errors->has('nombres'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('nombres') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('apellidos', 'Apellidos:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('apellidos', null, ['class' => $errors->first('apellidos') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Apellidos', 'maxlength' => '120', 'autofocus']) }}
        @if($errors->has('apellidos'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('apellidos') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('peso', 'Peso:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('peso', null, ['class' => $errors->first('peso') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Peso', 'maxlength' => '120', 'autofocus']) }}
        @if($errors->has('peso'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('peso') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('genero_id', 'Género:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('genero_id', $todoxxxx['generoxx'], null, ['class' => $errors->first('genero_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'genero_id']) }}
        @if($errors->has('genero_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('genero_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('ep_id', 'EPS:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('ep_id', $todoxxxx['epsxxxxx'], null, ['class' => $errors->first('ep_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'ep_id']) }}
        @if($errors->has('ep_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ep_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('npt_id', 'NPT:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('npt_id', $todoxxxx['nptxxxxx'], null, ['class' => $errors->first('npt_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'npt_id']) }}
        @if($errors->has('npt_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('npt_id') }}
        </div>
        @endif
    </div>



    <div class="form-group col-md-4">
        {{ Form::label('cama', 'Cama:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('cama', null, ['class' => $errors->first('cama') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Cama', 'maxlength' => '120', 'autofocus']) }}
        @if($errors->has('cama'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('cama') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('servicio_id', 'Servicio:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('servicio_id', $todoxxxx['servicio'], null, ['class' => $errors->first('servicio_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'servicio_id']) }}
        @if($errors->has('servicio_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('servicio_id') }}
        </div>
        @endif
    </div>



    <div class="form-group col-md-4">
        <label for="fechnaci" class="control-label col-form-label-sm">Fecha de Nacimiento<strong> (<i>YYYY-MM-DD</i>)</strong>:</label>
        {{ Form::text('fechnaci', null, ['class' => $errors->first('fechnaci') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Fecha de Nacimiento', 'id'=>'fechnaci',
         'readonly','maxlength' => '120', 'autofocus']) }}
        @if($errors->has('fechnaci'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('fechnaci') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('edad', 'Edad:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="edad" class="form-control"></div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('departamento_id', 'Departamento:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('departamento_id', $todoxxxx['departam'], null, ['class' => $errors->first('departamento_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'departamento_id']) }}
        @if($errors->has('departamento_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('departamento_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('municipio_id', 'Municipio:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('municipio_id', $todoxxxx['municipi'], null, ['class' => $errors->first('municipio_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'municipio_id']) }}
        @if($errors->has('municipio_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('municipio_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
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
