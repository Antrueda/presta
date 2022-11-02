<div class="form-group row">
    <div class="form-group col-md-4">
        {{ Form::label('registro', 'Fecha registro:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('registro', $todoxxxx['modeloxx']->registro, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('registro', null, ['class' => $errors->first('registro') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Fecha registro', 'maxlength' => '120']) }}
        @endif
        @if($errors->has('registro'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('registro') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('cedula', 'Cédula:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('cedula', $todoxxxx['modeloxx']->cedula, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('cedula', null, ['class' => $errors->first('cedula') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Cédula', 'maxlength' => '120', 'autofocus']) }}
        @endif
        @if($errors->has('cedula'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('cedula') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('nombres', 'Nombres:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('nombres', $todoxxxx['modeloxx']->nombres, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('nombres', null, ['class' => $errors->first('nombres') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Nombres', 'maxlength' => '120', 'autofocus']) }}
        @endif
        @if($errors->has('nombres'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('nombres') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('apellidos', 'Apellidos:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('apellidos', $todoxxxx['modeloxx']->apellidos, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('apellidos', null, ['class' => $errors->first('apellidos') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Apellidos', 'maxlength' => '120', 'autofocus']) }}
        @endif
        @if($errors->has('apellidos'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('apellidos') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('peso', 'Peso:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('peso', $todoxxxx['modeloxx']->peso, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('peso', null, ['class' => $errors->first('peso') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Peso', 'maxlength' => '120', 'autofocus']) }}
        @endif
        @if($errors->has('peso'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('peso') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('genero_id', 'Género:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('genero_id', $todoxxxx['generoxx'], $todoxxxx['modeloxx']->genero_id, ['class' => 'form-control-plaintext','id'=>'genero_id']) }}
        @else
        {{ Form::select('genero_id', $todoxxxx['generoxx'], null, ['class' => $errors->first('genero_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'genero_id']) }}
        @endif
        @if($errors->has('genero_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('genero_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('ep_id', 'Eps:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('ep_id', $todoxxxx['epsxxxxx'], $todoxxxx['modeloxx']->ep_id, ['class' => 'form-control-plaintext','id'=>'ep_id']) }}
        @else
        {{ Form::select('ep_id', $todoxxxx['epsxxxxx'], null, ['class' => $errors->first('ep_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'ep_id']) }}
        @endif
        @if($errors->has('ep_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ep_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('npt_id', 'Npt:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('npt_id', $todoxxxx['nptxxxxx'], $todoxxxx['modeloxx']->npt_id, ['class' => 'form-control-plaintext','id'=>'npt_id']) }}
        @else
        {{ Form::select('npt_id', $todoxxxx['nptxxxxx'], null, ['class' => $errors->first('npt_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'npt_id']) }}
        @endif
        @if($errors->has('npt_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('npt_id') }}
        </div>
        @endif
    </div>



    <div class="form-group col-md-4">
        {{ Form::label('cama', 'Cama:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('cama', $todoxxxx['modeloxx']->cama, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('cama', null, ['class' => $errors->first('cama') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Cama', 'maxlength' => '120', 'autofocus']) }}
        @endif
        @if($errors->has('cama'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('cama') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('servicio_id', 'Servicio:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('servicio_id', $todoxxxx['servicio'], $todoxxxx['modeloxx']->servicio_id, ['class' => 'form-control-plaintext','id'=>'servicio_id']) }}
        @else
        {{ Form::select('servicio_id', $todoxxxx['servicio'], null, ['class' => $errors->first('servicio_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'servicio_id']) }}
        @endif
        @if($errors->has('servicio_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('servicio_id') }}
        </div>
        @endif
    </div>



    <div class="form-group col-md-4">
        {{ Form::label('fechnaci', 'Fecha de Nacimiento:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('fechnaci', $todoxxxx['modeloxx']->fechnaci, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('fechnaci', null, ['class' => $errors->first('fechnaci') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Fecha de Nacimiento', 'maxlength' => '120', 'autofocus']) }}
        @endif
        @if($errors->has('fechnaci'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('fechnaci') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('edad', 'Edad:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="edad" class="form-control" style='height: 28px'></div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('departamento_id', 'Departamento:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('departamento_id', $todoxxxx['departam'], $todoxxxx['modeloxx']->departamento_id, ['class' => 'form-control-plaintext','id'=>'departamento_id']) }}
        @else
        {{ Form::select('departamento_id', $todoxxxx['departam'], null, ['class' => $errors->first('departamento_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'departamento_id']) }}
        @endif
        @if($errors->has('departamento_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('departamento_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('municipio_id', 'Municipio:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('municipio_id', $todoxxxx['municipi'], $todoxxxx['modeloxx']->municipio_id, ['class' => 'form-control-plaintext','id'=>'municipio_id']) }}
        @else
        {{ Form::select('municipio_id', $todoxxxx['municipi'], null, ['class' => $errors->first('municipio_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'municipio_id']) }}
        @endif
        @if($errors->has('municipio_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('municipio_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id, ['class' => 'form-control-plaintext','id'=>'sis_esta_id']) }}
        @else
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id']) }}
        @endif
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
