<style>
    /* Tooltip */
    .test + .tooltip > .tooltip-inner {
      background-color: #3C8DBC;
      color: #FFFFFF;
      border: 1px solid black;
      padding: 15px;
      font-size: 15px;
    }
    /* Tooltip on top */
    .test + .tooltip.top > .tooltip-arrow {
      border-top: 5px solid black;
    }
    /* Tooltip on bottom */
    .test + .tooltip.bottom > .tooltip-arrow {
      border-bottom: 5px solid blue;
    }
    /* Tooltip on left */
    .test + .tooltip.left > .tooltip-arrow {
      border-left: 5px solid red;
    }
    /* Tooltip on right */
    .test + .tooltip.right > .tooltip-arrow {
      border-right: 5px solid black;
    }
  </style>

  <div class="form-group row">
    <div class="form-group col-md-4">
      {{ Form::label('sis_clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
      {{ Form::select('sis_clinica_id', $todoxxxx['clinicax'], null, ['class' => $errors->first('sis_clinica_id') ?
      'form-control is-invalid select2' : 'form-control select2','id'=>'sis_clinica_id']) }}
      @if($errors->has('sis_clinica_id'))
      <div class="invalid-feedback d-block">
          {{ $errors->first('sis_clinica_id') }}
      </div>
      @endif
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('casa_id', 'Casa:', ['class' => 'control-label col-form-label-sm']) }}
      {{ Form::select('casa_id', $todoxxxx['casasxx'], null,
      ['class' => $errors->first('casa_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'casa_id',
      ]) }}
      @if($errors->has('casa_id'))
      <div class="invalid-feedback d-block">
          {{ $errors->first('casa_id') }}
      </div>
      @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('nombgene', 'Nombre Genérico:', ['class' => 'control-label col-form-label-sm'])}}
        {{ Form::text('nombgene', null, ['class' => $errors->first('nombgene') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Nombre Genérico', 'maxlength' => '120', 'autofocus']) }}
      @if($errors->has('nombgene'))
          <div class="invalid-feedback d-block">
              {{ $errors->first('nombgene') }}
      </div>
      @endif
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('concentr', 'Concentración:', ['class' => 'control-label col-form-label-sm']) }}
          {{ Form::text('concentr', null, ['class' => $errors->first('concentr') ? 'form-control  is-invalid' : 'form-control',
          'placeholder' => 'Concentración', 'maxlength' => '120', 'autofocus' ,'maxlength' => '5'
          ,'onkeypress'=>'return filterFloat(event,this);']) }}
      @if($errors->has('concentr'))
          <div class="invalid-feedback d-block">
              {{ $errors->first('concentr') }}
      </div>
      @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('unidmedi', 'Unidad de Medida:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('unidmedi', null, ['class' => $errors->first('unidmedi') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Unidad de Medida', 'maxlength' => '120', 'autofocus']) }}
      @if($errors->has('unidmedi'))
          <div class="invalid-feedback d-block">
              {{ $errors->first('unidmedi') }}
      </div>
      @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id']) }}
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
