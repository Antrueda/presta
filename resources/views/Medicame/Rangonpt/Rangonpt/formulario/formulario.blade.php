

<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('randesde', 'Rango Incia:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::number('randesde', $todoxxxx['modeloxx']->randesde, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('randesde', null, ['class' => $errors->first('randesde') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Rango Incia','step'=>"0.11", 'min'=>0, 'maxlength' => '120', 'autofocus','onkeypress'=>'return filterFloat(event,this);']) }}
        @endif
        @if($errors->has('randesde'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('randesde') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('ranhasta', 'Rango Finaliza:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::number('ranhasta', $todoxxxx['modeloxx']->ranhasta, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('ranhasta', null, ['class' => $errors->first('ranhasta') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Rango Finaliza','step'=>"0.1",  'min'=>0.1,'autofocus','onkeypress'=>'return filterFloat(event,this);']) }}
        @endif
        @if($errors->has('ranhasta'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ranhasta') }}
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
