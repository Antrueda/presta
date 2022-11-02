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
    <div class="form-group col-md-6">
    {{ Form::label('casa', 'Casa:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('casa', null, ['class' => $errors->first('casa') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Casa', 'maxlength' => '120', 'autofocus']) }}
        @if($errors->has('casa'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('casa') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
      {{ Form::label('unidmedi', 'Unidad de Medida:', ['class' => 'control-label col-form-label-sm']) }}

      {{ Form::text('unidmedi', null, ['class' => $errors->first('unidmedi') ?
      'form-control  is-invalid' : 'form-control', 'placeholder' => 'Unidad de Medida', 'maxlength' => '120', 'autofocus']) }}
      @if($errors->has('unidmedi'))
      <div class="invalid-feedback d-block">
          {{ $errors->first('unidmedi') }}
      </div>
      @endif
  </div>

    <div class="form-group col-md-6">
        {{ Form::label('nameidxx', 'ID campo:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('nameidxx', null, ['class' => $errors->first('nameidxx') ? 'form-control  is-invalid test' : 'form-control test', 'placeholder' => 'ID campo',  'autofocus',
        'maxlength'=>"8" ,
    'data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"Este ID es con el que se va a identificar el medicamento en el formulario, debe de ser de 8 caracteres; se recomienda que se arme con el nombre de la casa"

        ]) }}

        @if($errors->has('nameidxx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('nameidxx') }}
        </div>
        @endif
    </div>


    <div class="form-group col-md-6">
        {{ Form::label('ordecasa', 'Orden:', ['class' => 'control-label col-form-label-sm']) }}

        {{ Form::select('ordecasa', $todoxxxx['ordenxxx'], null, ['class' => $errors->first('ordecasa') ? 'form-control is-invalid test select2' : 'form-control test select2','id'=>'ordecasa',
        'data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Orden en que se verán en el formulario las casas"]) }}

        @if($errors->has('ordecasa'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ordecasa') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}

        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 'form-control is-invalid' : 'form-control','id'=>'sis_esta_id']) }}

        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
