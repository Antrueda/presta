<div class="form-group row">
  <div class="form-group col-md-6">
    {{ Form::label('dmarca_id', 'Marca:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
      {{ Form::select('dmarca_id', $todoxxxx['marcaxxx'], $todoxxxx['modeloxx']->dmarca_id, ['class' => 'form-control-plaintext','id'=>'dmarca_id']) }}
    @else
      {{ Form::select('dmarca_id', $todoxxxx['marcaxxx'], null, ['class' => $errors->first('dmarca_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'dmarca_id']) }}
    @endif
    @if($errors->has('dmarca_id'))
    <div class="invalid-feedback d-block">
        {{ $errors->first('dmarca_id') }}
    </div>
    @endif
  </div>


  <div class="form-group col-md-6">
    {{ Form::label('fechvenc', 'Fecha de Vencimiento:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('fechvenc', $todoxxxx['modeloxx']->fechvenc, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('fechvenc', null, ['class' => $errors->first('fechvenc') ? 'form-control  is-invalid' : 'form-control',
        'placeholder' => 'Fecha de Vencimiento', 'maxlength' => '120', 'readonly']) }}
    @endif
    @if($errors->has('fechvenc'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('fechvenc') }}
    </div>
    @endif
  </div>

  <div class="form-group col-md-6">
    {{ Form::label('inventar', 'Inventario:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('inventar', $todoxxxx['modeloxx']->inventar, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('inventar', null, ['class' => $errors->first('inventar') ? 'form-control  is-invalid' : 'form-control',
        'placeholder' => 'Inventario', 'maxlength' => '120', 'autofocus','onkeypress'=>'return filterFloat(event,this);'
        ]) }}
    @endif
    @if($errors->has('inventar'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('inventar') }}
    </div>
    @endif
  </div>
  <div class="form-group col-md-6">
    {{ Form::label('lotexxxx', 'Lote:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('lotexxxx', $todoxxxx['modeloxx']->lotexxxx, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('lotexxxx', null, ['class' => $errors->first('lotexxxx') ? 'form-control  is-invalid' : 'form-control',
        'placeholder' => 'Lote', 'maxlength' => '120', 'autofocus']) }}
    @endif
    @if($errors->has('lotexxxx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('lotexxxx') }}
    </div>
    @endif
  </div>

  <div class="form-group col-md-12">
    {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
      {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id,
      ['class' => 'form-control-plaintext select2','id'=>'sis_esta_id']) }}
    @else
      {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ?
      'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id']) }}
    @endif
    @if($errors->has('sis_esta_id'))
    <div class="invalid-feedback d-block">
        {{ $errors->first('sis_esta_id') }}
    </div>
    @endif
  </div>


</div>
