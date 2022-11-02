<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('orden_id', 'Orden:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('orden_id', $todoxxxx['rangoxxx'], null, ['class' => $errors->first('orden_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'orden_id']) }}
        @if($errors->has('orden_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('orden_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('clinica_id', 'Cínica:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('clinica_id', $todoxxxx['clinicai'], null, ['class' => $errors->first('clinica_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'clinica_id']) }}
        @if($errors->has('clinica_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('clinica_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('quimfarm_id', 'Químico Farmacéutico:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('quimfarm_id', $todoxxxx['quimfarm'], null, ['class' => $errors->first('quimfarm_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'quimfarm_id']) }}
        @if($errors->has('quimfarm_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('quimfarm_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id']) }}
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
