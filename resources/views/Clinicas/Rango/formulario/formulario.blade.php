<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('rcodigo_id', 'Rango:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('rcodigo_id', $todoxxxx['rangoxxx'], null, ['class' => $errors->first('rcodigo_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'rcodigo_id']) }}
        @if($errors->has('rcodigo_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('rcodigo_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('sis_clinica_id', 'Cínica:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('sis_clinica_id', $todoxxxx['clinicai'], null, ['class' => $errors->first('sis_clinica_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'sis_clinica_id']) }}
        @if($errors->has('sis_clinica_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_clinica_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id']) }}
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
