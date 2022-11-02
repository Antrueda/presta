<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('servicio', 'Servicio:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('servicio', $todoxxxx['modeloxx']->servicio, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('servicio', null, ['class' => $errors->first('servicio') ?
        'form-control  is-invalid' : 'form-control', 'placeholder' => 'Servicio', 'maxlength' => '120', 'autofocus']) }}
        @endif
        @if($errors->has('servicio'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('servicio') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id, ['class' => 'form-control-plaintext','id'=>'sis_esta_id']) }}
        @else
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id']) }}
        @endif
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
