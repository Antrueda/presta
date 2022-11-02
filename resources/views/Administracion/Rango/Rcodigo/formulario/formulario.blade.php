<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('rcondici_id', 'Codición:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('rcondici_id', $todoxxxx['condicio'], $todoxxxx['modeloxx']->rcondici_id,
        ['class' => 'form-control-plaintext','id'=>'rcondici_id']) }}
        @else
        {{ Form::select('rcondici_id', $todoxxxx['condicio'], null, ['class' => $errors->first('rcondici_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'rcondici_id','style'=>'width: 100%']) }}
        @endif
        @if($errors->has('rcondici_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('rcondici_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('codiprod', 'Código Word Office:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('codiprod', $todoxxxx['modeloxx']->codiprod, ['class' => 'form-control-plaintext','style'=>"height: 35px" ]) }}
        @else
        {{ Form::text('codiprod', null, ['class' => $errors->first('codiprod') ? 'form-control  is-invalid' : 'form-control',
            'placeholder' => 'Código Word Office', 'maxlength' => '120', 'autofocus']) }}
        @endif
        @if($errors->has('codiprod'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('codiprod') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('descripc', 'Descripción Rango:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('descripc', $todoxxxx['modeloxx']->descripc, ['class' => 'form-control-plaintext','style'=>"height: 35px" ]) }}
        @else
        {{ Form::text('descripc', null, ['class' => $errors->first('descripc') ? 'form-control  is-invalid' : 'form-control',
            'placeholder' => 'Descripción Rango', 'maxlength' => '120', 'autofocus']) }}
        @endif
        @if($errors->has('descripc'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('descripc') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
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
