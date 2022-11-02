<div class="form-group row">
    <div class="form-group col-md-6" >
        {{ Form::label('npt_id', 'Npt:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('npt_id', $todoxxxx['nptidxxx'], $todoxxxx['modeloxx']->npt_id, ['class' => 'form-control-plaintext','id'=>'npt_id']) }}
        @else
        {{ Form::select('npt_id', $todoxxxx['nptidxxx'], null, ['class' => $errors->first('npt_id') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'npt_id','style'=>'width: 100%']) }}
        @endif
        @if($errors->has('npt_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('npt_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6" >
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id, ['class' => 'form-control-plaintext','id'=>'sis_esta_id']) }}
        @else
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id','style'=>'width: 100%']) }}
        @endif
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>