<style>
.altoxxxx{
    /* height: 35px; */
    font-size: 13px;
}

.negritax{
    font-weight: bold;
}

.textinpu{
    width: 100%;
    font-size: 12px;
    height: 15px;
}

.altoxxxx input[readonly] {
    background-color: transparent;
    border: 0;
    box-shadow: none;
}

.readonly input[readonly] {
    background-color: transparent;
    border: 0;
    box-shadow: none;
}

.select2-selection__rendered {
    line-height: 28px !important;
}
.select2-container .select2-selection--single {
    height: 30px !important;
}
.select2-selection__arrow {
    height: 5px !important;
}

.estilo-x { font-size: 1vw }

  /* Popover Header */
</style>

<div class="form-group row">
    @include('layouts.registro')
    <div class="form-group col-md-12">
        {{ Form::label('sis_clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('sis_clinica_id', $todoxxxx['clinicax'], null, ['class' => $errors->first('sis_clinica_id') ?
        'form-control  is-invalid select2' : 'form-control select2','id'=>'sis_clinica_id','autocomplete'=>"off"]) }}
        @if($errors->has('sis_clinica_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_clinica_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('tiempo', 'Tiempo Infusión (H) :', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('tiempo', null, ['class' => $errors->first('tiempo') ?
         'form-control  is-invalid calcularvolumen' : 'form-control  calcularvolumen',
         'placeholder' => 'Tiempo Infusión', 'maxlength' => '120','autocomplete'=>"off"]) }}
        @if($errors->has('tiempo'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('tiempo') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('velocidad', 'Velocidad Infusión (ml/h):', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('velocidad', null, ['class' => $errors->first('velocidad') ?
         'form-control  is-invalid veloinfu' : 'form-control veloinfu', 'placeholder' => 'Velocidad Infusión:',
         'maxlength' => '120', 'readonly',
         'style'=>'background-color: transparent; box-shadow: none;'
         ]) }}
        @if($errors->has('velocidad'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('velocidad') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('volumen', 'Volumen Total (ml):', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('volumen', null, ['class' => $errors->first('volumen') ?
         'form-control  is-invalid calcularvolumen calcularagua' : 'form-control  calcularvolumen calcularagua',
         'onkeypress'=>'return filterFloat(event,this);',
         'placeholder' => 'Volumen Total', 'maxlength' => '120', 'autofocus','autocomplete'=>"off"]) }}
        @if($errors->has('volumen'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('volumen') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('purga', 'Purga (ml):', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('purga', null, ['class' => $errors->first('purga') ?
         'form-control  is-invalid' : 'form-control ', 'placeholder' => 'Purga', 'maxlength' => '120',
         'onkeypress'=>'return filterFloat(event,this);',
         'autofocus','autocomplete'=>"off"]) }}
        @if($errors->has('purga'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('purga') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('peso', 'Peso (Kg):', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('peso', null, ['class' => $errors->first('peso') ?
         'form-control  is-invalid' : 'form-control ', 'placeholder' => 'Peso', 'maxlength' => '120',
         'autofocus','autocomplete'=>"off"]) }}
        @if($errors->has('peso'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('peso') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-12">
        <hr style="border:  #000000 solid 2px" />
    </div>
</div>

    <div class="row ">
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control  estilo-x">MEDICAMENTO</div>
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control  estilo-x">SELECCIÓN</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  estilo-x">UNIDAD</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  estilo-x">REQUERIMIENTO</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  estilo-x">VOLUMEN</div>

    </div>
<div class="row " id="calculoxx" >
@foreach($todoxxxx['formular'] as $formulax)

    <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered  estilo-x" id="{{$formulax['campo_id'].'_tool'}}">
        {{$formulax['casaxxxx']}}
    </div>
    <div class="col-xs-3 col-sm-3 col-lg-3 estilo-x" >
        {{ Form::select($formulax['campo_id'], $formulax['selelist'], $formulax['selevalu'],
                        ['class'=>'form-control  medicamento calcularagua select2bs4 estilo-x','id'=>$formulax['campo_id'],'style'=>'width: 100%;']) }}
    </div>
    <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered  estilo-x" id="{{$formulax['campo_id'].'_unid'}}">
        {{$formulax['unidmedi']}}
    </div>
    <div class="col-xs-2 col-sm-2 col-lg-2 estilo-x">
         {{ Form::text($formulax['campo_id'].'_cant',
        $formulax['requerim'],
        ['class'=>'form-control  input-number test calcularagua',
        'id'=>$formulax['campo_id'].'_cant',
        'placeholder'=>'Diario',
        'onkeypress'=>'return filterFloat(event,this);',
        'autocomplete'=>"off",
        $formulax['readonly'],
        'style'=> $formulax['readonly']=='readonly'?'background-color: transparent; box-shadow: none; text-align: right;':'text-align: right;'

        ]) }}

        <input  type="hidden" id="{{$formulax['campo_id']}}_reto" name="{{$formulax['campo_id']}}_reto" placeholder="Requerimiento total" value="{{$formulax['requtota']}}">
    </div>
    <div class="col-xs-2 col-sm-2 col-lg-2 estilo-x">
        {{ Form::text($formulax['campo_id'].'_volu',
        $formulax['volumenx'],
        ['class'=>'form-control  input-number test calcularagua','style'=>'width: 100%',
        'id'=>$formulax['campo_id'].'_volu',
        'onkeypress'=>'return filterFloat(event,this);',
        'style'=>$formulax['readonly']=='readonly'?'background-color: transparent; box-shadow: none; text-align: right;':'text-align: right;',
        'data-toggle'=>"popover",

        $formulax['readonly'],'autocomplete'=>"off"

        ]) }}
        <input type="hidden" id="{{$formulax['campo_id']}}_vopu" name="{{$formulax['campo_id']}}_vopu" placeholder="Volumen purga" value="{{$formulax['volupurg']}}">
    </div>

@endforeach
</div>
    @include('Clinicas.Cformula.formulario.resultax')

<div class="row">

    @include('layouts.registro')
</div>
