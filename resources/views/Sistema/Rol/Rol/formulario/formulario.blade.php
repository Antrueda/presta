<div class="form-group row">

    <div class="form-group col-md-6">
        {{ Form::label('name', 'Rol:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('name', $todoxxxx['modeloxx']->name, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('name', null, ['class' => $errors->first('name') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Rol', 'maxlength' => '120', 'autofocus',
         'style'=>'height: 28px']) }}
        @endif
        @if($errors->has('name'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id, ['class' => 'form-control-plaintext','id'=>'sis_esta_id']) }}
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
