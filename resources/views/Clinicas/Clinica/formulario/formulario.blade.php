

<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('clinica', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('clinica', null, ['class' => $errors->first('clinica') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Clínica', 'maxlength' => '120', 'autofocus']) }}
        @if($errors->has('clinica'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('clinica') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('nitxxxxx', 'Nit:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::number('nitxxxxx', null, ['class' => $errors->first('nitxxxxx') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Nit',  'autofocus']) }}
        @if($errors->has('nitxxxxx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('nitxxxxx') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('digiveri', 'DV:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('digiveri', null, ['class' => 'form-control','readonly'=>'readonly', 'placeholder' => 'DV']) }}
    </div>
    <div class="form-group col-md-6" >
        {{ Form::label('telefono', 'Teléfono:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::number('telefono', null, ['class' => $errors->first('telefono') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Teléfono',  'autofocus']) }}
        @if($errors->has('telefono'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('telefono') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 'form-control is-invalid select2' : 'form-control select2','style'=>"width: 100%;",'id'=>'sis_esta_id']) }}
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
