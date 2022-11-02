

<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('sucursal', 'Sucursal:', ['class' => 'control-label col-form-label-sm']) }}

        {{ Form::text('sucursal', null, ['class' => $errors->first('sucursal') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Sucursal', 'maxlength' => '120', 'autofocus']) }}

        @if($errors->has('sucursal'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sucursal') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}

        {{ Form::select('clinica_id', $todoxxxx['clinicai'], null, ['class' => $errors->first('clinica_id') ? 'form-control is-invalid select2' : 'form-control select2','style'=>"width: 100%;",'id'=>'clinica_id']) }}

        @if($errors->has('clinica_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('clinica_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('departamento_id', 'Departamento:', ['class' => 'control-label col-form-label-sm']) }}

        {{ Form::select('departamento_id', $todoxxxx['departam'], null, ['class' => $errors->first('departamento_id') ? 'form-control is-invalid select2' : 'form-control select2','style'=>"width: 100%;",'id'=>'departamento_id']) }}

        @if($errors->has('departamento_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('departamento_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('municipio_id', 'Municipio:', ['class' => 'control-label col-form-label-sm']) }}

        {{ Form::select('municipio_id', $todoxxxx['municipi'], null, ['class' => $errors->first('municipio_id') ? 'form-control is-invalid select2' : 'form-control select2','style'=>"width: 100%;",'id'=>'municipio_id']) }}
        @if($errors->has('municipio_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('municipio_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id, ['class' => 'form-control-plaintext','id'=>'sis_esta_id']) }}
        @else
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 'form-control is-invalid select2' : 'form-control select2','style'=>"width: 100%;",'id'=>'sis_esta_id']) }}
        @endif
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
