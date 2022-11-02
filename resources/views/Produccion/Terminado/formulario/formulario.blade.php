<div class="form-group row">

    <!-- <img src="{{ url('qrcodes/qrcode.svg') }}" style="width: 100px; height: 100px;" alt="logo"> -->
    <div class="form-group col-md-12">
        {{ Form::label('cformula_id', 'Formulación:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('cformula_id', $todoxxxx['procesox'], $todoxxxx['modeloxx']->cformula_id, ['class' => 'form-control-plaintext ','id'=>'cformula_id']) }}
        @else
        {{ Form::select('cformula_id', $todoxxxx['procesox'], null, ['class' => $errors->first('cformula_id') ?
        'form-control is-invalid ' : 'form-control ','id'=>'cformula_id']) }}
        @endif
        @if($errors->has('cformula_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('cformula_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('completo', 'Datos completos correctos en la etiqueta:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('completo', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->completo, ['class' => 'form-control-plaintext','id'=>'completo']) }}
        @else
        {{ Form::select('completo', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('completo') ?
        'form-control is-invalid ' : 'form-control ','id'=>'completo']) }}
        @endif
        @if($errors->has('completo'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('completo') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('particul', 'Ausencia de Partículas:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('particul', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->particul, ['class' => 'form-control-plaintext','id'=>'particul']) }}
        @else
        {{ Form::select('particul', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('particul') ?
        'form-control is-invalid ' : 'form-control ','id'=>'particul']) }}
        @endif
        @if($errors->has('particul'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('particul') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('integrid', 'Integridad de la bolsa o empaque primario:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('integrid', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->integrid, ['class' => 'form-control-plaintext','id'=>'integrid']) }}
        @else
        {{ Form::select('integrid', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('integrid') ?
        'form-control is-invalid ' : 'form-control ','id'=>'integrid']) }}
        @endif
        @if($errors->has('integrid'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('integrid') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('contenid', 'Contenido/Volumen Completo:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('contenid', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->contenid, ['class' => 'form-control-plaintext','id'=>'contenid']) }}
        @else
        {{ Form::select('contenid', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('contenid') ?
        'form-control is-invalid ' : 'form-control ','id'=>'contenid']) }}
        @endif
        @if($errors->has('contenid'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('contenid') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('fugasxxx', 'Ausencia de Fugas:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('fugasxxx', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->fugasxxx, ['class' => 'form-control-plaintext','id'=>'fugasxxx']) }}
        @else
        {{ Form::select('fugasxxx', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('fugasxxx') ?
        'form-control is-invalid ' : 'form-control ','id'=>'fugasxxx']) }}
        @endif
        @if($errors->has('fugasxxx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('fugasxxx') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('miscelas', 'Ausencia de Miscelas/Integridad en Emulsión:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('miscelas', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->miscelas, ['class' => 'form-control-plaintext','id'=>'miscelas']) }}
        @else
        {{ Form::select('miscelas', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('miscelas') ?
        'form-control is-invalid ' : 'form-control ','id'=>'miscelas']) }}
        @endif
        @if($errors->has('miscelas'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('miscelas') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('burbujas', 'Ausencia de burbujas:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('burbujas', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->burbujas, ['class' => 'form-control-plaintext','id'=>'burbujas']) }}
        @else
        {{ Form::select('burbujas', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('burbujas') ?
        'form-control is-invalid ' : 'form-control ','id'=>'burbujas']) }}
        @endif
        @if($errors->has('burbujas'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('burbujas') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('document', 'Documentación completa:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('document', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->document, ['class' => 'form-control-plaintext','id'=>'document']) }}
        @else
        {{ Form::select('document', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('document') ?
        'form-control is-invalid ' : 'form-control ','id'=>'document']) }}
        @endif
        @if($errors->has('document'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('document') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('pesobols', 'Peso Bolsa:',['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('pesobols', null, ['class' => $errors->first('pesobols') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Peso Bolsa', 'maxlength' => '8','onkeypress'=>'return filterFloat(event,this);']) }}
        @if($errors->has('pesobols'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('pesobols') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('teorico_', 'Peso teórico:',['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('teorico_', $todoxxxx['modeloxx']->teorico_, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('teorico_', $todoxxxx['pesoteor'], ['class' => $errors->first('teorico_') ?
         'form-control  is-invalid calcularvolumen' : 'form-control calcularvolumen', 'placeholder' => 'Peso teórico', 'maxlength' => '120','readonly']) }}
        @endif
        @if($errors->has('teorico_'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('teorico_') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('realxxx_', 'Peso real:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('realxxx_', $todoxxxx['modeloxx']->realxxx_, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('realxxx_', null, ['class' => $errors->first('realxxx_') ?
         'form-control  is-invalid calcularvolumen' : 'form-control calcularvolumen', 'placeholder' => 'Peso real', 'maxlength' => '120']) }}
        @endif
        @if($errors->has('realxxx_'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('realxxx_') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('limitesx', 'Peso dentro límites establecidos:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('limitesx', $todoxxxx['pedelies'], $todoxxxx['modeloxx']->limitesx, ['class' => 'form-control-plaintext','id'=>'limitesx']) }}
        @else
        {{ Form::select('limitesx', $todoxxxx['pedelies'], null, ['class' => $errors->first('limitesx') ?
        'form-control is-invalid ' : 'form-control ','id'=>'limitesx']) }}
        @endif
        @if($errors->has('limitesx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('limitesx') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('concepto', 'Concepto:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('concepto', $todoxxxx['concepto'], $todoxxxx['modeloxx']->concepto, ['class' => 'form-control-plaintext','id'=>'concepto']) }}
        @else
        {{ Form::select('concepto', $todoxxxx['concepto'], null, ['class' => $errors->first('concepto') ?
        'form-control is-invalid ' : 'form-control ','id'=>'concepto']) }}
        @endif
        @if($errors->has('concepto'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('concepto') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id, ['class' => 'form-control-plaintext','id'=>'sis_esta_id']) }}
        @else
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ?
        'form-control is-invalid ' : 'form-control ','id'=>'sis_esta_id']) }}
        @endif
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
