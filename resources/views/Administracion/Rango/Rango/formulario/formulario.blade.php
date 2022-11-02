<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('ranginic', 'Rango Desde:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::number('ranginic', $todoxxxx['modeloxx']->ranginic, ['class' => 'form-control-plaintext',
        'style'=>'height: 28px']) }}
        @else
        {{ Form::number('ranginic', null, ['class' => $errors->first('ranginic') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Rango Desde',
         'autofocus','onkeypress'=>'return filterFloat(event,this);']) }}
        @endif
        @if($errors->has('ranginic'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ranginic') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('rangfina', 'Rango Hasta:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::number('rangfina', $todoxxxx['modeloxx']->rangfina, ['class' => 'form-control-plaintext',
        'style'=>'height: 28px']) }}
        @else
        {{ Form::number('rangfina', null, ['class' => $errors->first('rangfina') ?
        'form-control  is-invalid' : 'form-control', 'placeholder' => 'Rango Hasta',  'autofocus'
        ,'onkeypress'=>'return filterFloat(event,this);',
        ]) }}
        @endif
        @if($errors->has('rangfina'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('rangfina') }}
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
