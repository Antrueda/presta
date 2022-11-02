<?php 



//codigo php



?>


























<div class="form-group row">
  <div class="form-group col-md-4">
    {{ Form::label('mmarca_id', 'Marca:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
      {{ Form::select('mmarca_id', $todoxxxx['marcaxxx'], $todoxxxx['modeloxx']->mmarca_id, ['class' => 'form-control-plaintext','id'=>'mmarca_id']) }}
    @else
      {{ Form::select('mmarca_id', $todoxxxx['marcaxxx'], null, ['class' => $errors->first('mmarca_id') ? 'form-control is-invalid' : 'form-control','id'=>'mmarca_id']) }}
    @endif
    @if($errors->has('mmarca_id'))
    <div class="invalid-feedback d-block">
        {{ $errors->first('mmarca_id') }}
    </div>
    @endif
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('minvima_id', 'Registro Invima:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
      {{ Form::select('minvima_id', $todoxxxx['invimaxx'], $todoxxxx['modeloxx']->minvima_id, ['class' => 'form-control-plaintext','id'=>'minvima_id']) }}
    @else
      {{ Form::select('minvima_id', $todoxxxx['invimaxx'], null, ['class' => $errors->first('minvima_id') ? 'form-control is-invalid' : 'form-control','id'=>'minvima_id']) }}
    @endif
    @if($errors->has('minvima_id'))
    <div class="invalid-feedback d-block">
        {{ $errors->first('minvima_id') }}
    </div>
    @endif
  </div>
  <div class="form-group col-md-4">
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

  <div class="form-group col-md-4">
    {{ Form::label('inventar', 'Inventario:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('inventar', $todoxxxx['modeloxx']->inventar, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('inventar', null, ['class' => $errors->first('inventar') ? 'form-control  is-invalid' : 'form-control', 
        'placeholder' => 'Inventario', 'maxlength' => '120', 'autofocus','onkeypress'=>'return filterFloat(event,this);']) }}
    @endif
    @if($errors->has('inventar'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('inventar') }}
    </div>
    @endif   
  </div>
  <div class="form-group col-md-4">
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
  
  <div class="form-group col-md-4">
    {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
      {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id, ['class' => 'form-control-plaintext','id'=>'sis_esta_id']) }}
    @else
      {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 'form-control is-invalid' : 'form-control','id'=>'sis_esta_id']) }}
    @endif
    @if($errors->has('sis_esta_id'))
    <div class="invalid-feedback d-block">
        {{ $errors->first('sis_esta_id') }}
    </div>
    @endif
  </div>
    
    
</div>