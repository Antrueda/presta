<div class="form-group row">
  <div class="form-group col-md-6">
    {{ Form::label('urangnpt_id', 'Npt:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
      {{ Form::select('urangnpt_id', $todoxxxx['mnptxxxx'], $todoxxxx['modeloxx']->urangnpt_id, ['class' => 'form-control-plaintext','id'=>'urangnpt_id']) }}
    @else
      {{ Form::select('urangnpt_id', $todoxxxx['mnptxxxx'], null, ['class' => $errors->first('urangnpt_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'urangnpt_id']) }}
    @endif
    @if($errors->has('urangnpt_id'))
    <div class="invalid-feedback d-block">
        {{ $errors->first('urangnpt_id') }}
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
