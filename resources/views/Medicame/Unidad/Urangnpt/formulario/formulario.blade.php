<div class="form-group row">
    
<div class="form-group col-md-4">
        {{ Form::label('unidrang_id', 'Rango:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('unidrang_id', $todoxxxx['rangonpt'], $todoxxxx['modeloxx']->unidrang_id, ['class' => 'form-control-plaintext','id'=>'unidrang_id']) }}
        @else
        {{ Form::select('unidrang_id', $todoxxxx['rangonpt'], null, ['class' => $errors->first('unidrang_id') ? 'form-control is-invalid select2' : 'form-control select2','style'=>"width: 100%;",'id'=>'unidrang_id']) }}
        @endif
        @if($errors->has('unidrang_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('unidrang_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('npt_id', 'Unidad de Medida:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('npt_id', $todoxxxx['nptxxxxx'], $todoxxxx['modeloxx']->npt_id, ['class' => 'form-control-plaintext','id'=>'npt_id']) }}
        @else
        {{ Form::select('npt_id', $todoxxxx['nptxxxxx'], null, ['class' => $errors->first('npt_id') ? 'form-control is-invalid select2' : 'form-control select2','style'=>"width: 100%;",'id'=>'npt_id']) }}
        @endif
        @if($errors->has('npt_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('npt_id') }}
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