{{ Form::label('clinica', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
@if($todoxxxx['accionxx'] == 'Ver')
    {{ Form::text('clinica', $todoxxxx['modeloxx']->clinica, ['class' => 'form-control-plaintext']) }}
@else
    {{ Form::text('clinica', null, ['class' => $errors->first('clinica') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Clínica', 'maxlength' => '120', 'autofocus']) }}
@endif
@if($errors->has('clinica'))
    <div class="invalid-feedback d-block">
        {{ $errors->first('clinica') }}
</div>
@endif
