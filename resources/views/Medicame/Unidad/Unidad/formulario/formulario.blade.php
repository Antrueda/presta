<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('s_unidad', 'Unidad de Medida:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('s_unidad', $todoxxxx['modeloxx']->s_unidad, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('s_unidad', null, ['class' => $errors->first('s_unidad') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Unidad de Medida', 'maxlength' => '120', 'autofocus']) }}
        @endif
        @if($errors->has('s_unidad'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('s_unidad') }}
        </div>
        @endif
    </div>


    <div class="form-group col-md-6">
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
