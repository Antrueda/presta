<div class="form-group row">
    <div class="form-group col-md-6" >
        {{ Form::label('rnpt_id', 'Npt Rango:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('rnpt_id', $todoxxxx['nptidxxx'], $todoxxxx['modeloxx']->rnpt_id, ['class' => 'form-control-plaintext','id'=>'rnpt_id']) }}
        @else
        {{ Form::select('rnpt_id', $todoxxxx['nptidxxx'], null, ['class' => $errors->first('rnpt_id') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'rnpt_id','style'=>'width: 100%']) }}
        @endif
        @if($errors->has('rnpt_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('rnpt_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6" >
        {{ Form::label('condicio_id', 'Condición:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('condicio_id', $todoxxxx['condicio'], $todoxxxx['modeloxx']->condicio_id, ['class' => 'form-control-plaintext','id'=>'condicio_id']) }}
        @else
        {{ Form::select('condicio_id', $todoxxxx['condicio'], null, ['class' => $errors->first('condicio_id') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'condicio_id','style'=>'width: 100%']) }}
        @endif
        @if($errors->has('condicio_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('condicio_id') }}
        </div>
        @endif
    </div>
    
    
    <div class="form-group col-md-12" >
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