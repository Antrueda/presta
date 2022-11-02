<div class="form-group row">
  <div class="form-group col-md-4">
    {{ Form::label('marcaxxx', 'Marca:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('marcaxxx', $todoxxxx['modeloxx']->marcaxxx, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('marcaxxx', null, ['class' => $errors->first('marcaxxx') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Marca', 'maxlength' => '120', 'autofocus']) }}
    @endif
    @if($errors->has('marcaxxx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('marcaxxx') }}
    </div>
    @endif   
  </div>

  
  <div class="form-group col-md-4">
    {{ Form::label('nombcome', 'Nombre Comercial:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('nombcome', $todoxxxx['modeloxx']->nombcome, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('nombcome', null, ['class' => $errors->first('nombcome') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Nombre Comercial', 'maxlength' => '120', 'autofocus']) }}
    @endif
    @if($errors->has('nombcome'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('nombcome') }}
    </div>
    @endif   
  </div>
  <div class="form-group col-md-4">
    {{ Form::label('osmorali', 'Osmolaridad:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('osmorali', $todoxxxx['modeloxx']->osmorali, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('osmorali', null, ['class' => $errors->first('osmorali') ? 'form-control  is-invalid' : 'form-control', 
        'placeholder' => 'Osmolaridad', 'maxlength' => '4', 'autofocus','onkeypress'=>'return filterFloat(event,this);']) }}
    @endif
    @if($errors->has('osmorali'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('osmorali') }}
    </div>
    @endif   
  </div>
  <div class="form-group col-md-4">
    {{ Form::label('pesoespe', 'Peso Específico:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('pesoespe', $todoxxxx['modeloxx']->pesoespe, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('pesoespe', null, ['class' => $errors->first('pesoespe') ? 'form-control  is-invalid' : 'form-control', 
        'placeholder' => 'Peso Específico', 'maxlength' => '4', 'autofocus','onkeypress'=>'return filterFloat(event,this);']) }}
    @endif
    @if($errors->has('pesoespe'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('pesoespe') }}
    </div>
    @endif   
  </div>
  <div class="form-group col-md-4">
    {{ Form::label('formfarm', 'Forma Farmaceútica:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('formfarm', $todoxxxx['modeloxx']->formfarm, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('formfarm', null, ['class' => $errors->first('formfarm') ? 'form-control  is-invalid' : 'form-control', 
        'placeholder' => 'Forma Farmaceútica', 'maxlength' => '120', 'autofocus']) }}
    @endif
    @if($errors->has('formfarm'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('formfarm') }}
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