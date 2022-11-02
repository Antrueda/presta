<div class="form-group row">
    
<div class="form-group col-md-4">
        {{ Form::label('rangonpt_id', 'Rango:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('rangonpt_id', $todoxxxx['rangonpt'], $todoxxxx['modeloxx']->rangonpt_id, ['class' => 'form-control-plaintext','id'=>'rangonpt_id']) }}
        @else
        {{ Form::select('rangonpt_id', $todoxxxx['rangonpt'], null, ['class' => $errors->first('rangonpt_id') ? 'form-control is-invalid select2' : 'form-control select2','style'=>"width: 100%;",'id'=>'rangonpt_id']) }}
        @endif
        @if($errors->has('rangonpt_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('rangonpt_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('unidad_id', 'Unidad de Medida:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('unidad_id', $todoxxxx['unidadxx'], $todoxxxx['modeloxx']->unidad_id, ['class' => 'form-control-plaintext','id'=>'unidad_id']) }}
        @else
        {{ Form::select('unidad_id', $todoxxxx['unidadxx'], null, ['class' => $errors->first('unidad_id') ? 'form-control is-invalid select2' : 'form-control select2','style'=>"width: 100%;",'id'=>'unidad_id']) }}
        @endif
        @if($errors->has('unidad_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('unidad_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
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