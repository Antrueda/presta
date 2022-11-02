<div class="form-group row">
  <div class="form-group col-md-4">
    {{ Form::label('marcaxxx', 'Marca:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('marcaxxx', $todoxxxx['modeloxx']->marcaxxx, ['class' => 'form-control-plaintext' ]) }}
    @else
        {{ Form::text('marcaxxx', null, ['class' => $errors->first('marcaxxx') ?
        'form-control  is-invalid' : 'form-control', 'placeholder' => 'Marca', 'maxlength' => '120', 'autofocus']) }}
    @endif
    @if($errors->has('marcaxxx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('marcaxxx') }}
    </div>
    @endif
  </div>


  <div class="form-group col-md-4">
    {{ Form::label('reginvim', 'Registro Invima:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('reginvim', $todoxxxx['modeloxx']->reginvim, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('reginvim', null, ['class' => $errors->first('reginvim') ?
        'form-control  is-invalid' : 'form-control', 'placeholder' => 'Registro Invima', 'maxlength' => '120', 'autofocus']) }}
    @endif
    @if($errors->has('reginvim'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('reginvim') }}
    </div>
    @endif
  </div>


  <div class="form-group col-md-4">
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
