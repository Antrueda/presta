
  <div class="form-group row">

    <div class="form-group col-md-6">
      {{ Form::label('nombrexx', 'Nombre:', ['class' => 'control-label col-form-label-sm']) }}
      @if($todoxxxx['accionxx'] == 'Ver')
          {{ Form::text('nombrexx', $todoxxxx['modeloxx']->nombrexx, ['class' => 'form-control-plaintext']) }}
      @else
          {{ Form::text('nombrexx', null, ['class' => $errors->first('nombrexx') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Nombre Genérico', 'maxlength' => '120', 'autofocus','style'=>"height: 28px"]) }}
      @endif
      @if($errors->has('nombrexx'))
          <div class="invalid-feedback d-block">
              {{ $errors->first('nombrexx') }}
      </div>
      @endif
    </div>
    <div class="form-group col-md-6" >
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id, ['class' => 'form-control-plaintext select2','id'=>'sis_esta_id']) }}
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
