<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('producto', 'Producto:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('producto', $todoxxxx['modeloxx']->producto,
            ['class' => 'form-control-plaintext','readonly'=>'readonly']) }}
        @else
        {{ Form::text('producto', 'NUTRICIÓN PARENTERAL', ['class' => $errors->first('producto') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Producto',
         'maxlength' => '120','readonly'=>'readonly']) }}
        @endif
        @if($errors->has('producto'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('producto') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('created_at', 'Registro:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('created_at', $todoxxxx['modeloxx']->created_at,
            ['class' => 'form-control-plaintext','readonly'=>'readonly']) }}
        @else
        {{ Form::text('created_at', null, ['class' => $errors->first('created_at') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Registro', 'maxlength' => '120',
         'autofocus','readonly'=>'readonly']) }}
        @endif
        @if($errors->has('created_at'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('created_at') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('orden_id', 'OP:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('orden_id', $todoxxxx['ordenxxx'], $todoxxxx['modeloxx']->orden_id, ['class' => 'form-control-plaintext','id'=>'orden_id']) }}
        @else
        {{ Form::select('orden_id', $todoxxxx['ordenxxx'], null, ['class' => $errors->first('orden_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'orden_id']) }}
        @endif
        @if($errors->has('orden_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('orden_id') }}
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
    <div class="form-group col-md-12">
        <hr style="border:  #000000 solid 2px" />
    </div>
    <div class="form-group col-md-12">
        <table class="table table-bordered table-responsiv" style="margin-top: 10px">
            <thead>
                <tr>
                    <th>DISPOSITIVO MÉDICO</th>
                    <th>LOTE</th>
                    <th>CANTIDAD CONSUMIDA</th>
                    <th>CANTIDAD ALISTADA</th>
                    <th>CANTIDAD SOBRANTE</th>
                    <th>MEDICAMENTO</th>
                    <th>LOTE</th>
                    <th>CANTIDAD CONSUMIDA</th>
                    <th>CANTIDAD ALISTADA</th>
                    <th>CANTIDAD SOBRANTE</th>
                </tr>
            </thead>
            <tbody id="formulaciontable">
                <style>
                    .letras {
                        font-size: 10px;
                    }
                </style>
                @foreach($todoxxxx['alistami']['lotesyyy'] as $key=> $alistami)
                <tr>
                    <td scope="col" class="letras">
                        {{$alistami['nombrexx']}}
                    </td>
                    <td scope="col" class="letras">
                        {{$alistami['lotexxxx']}}
                    </td>
                    <td scope="col" class="letras">
                        @if($alistami['mostrarx'])
                        <div class="form-control" id="{{$alistami['idxxxxxx']}}_con">
                            {{$alistami['cantcons']}}
                        </div>
                        @endif
                    </td>
                    <td scope="col" class="letras" style="width: 100px">
                        @if($alistami['mostrarx'])
                        <div class="form-control" id="{{$alistami['idxxxxxx']}}">
                            {{$alistami['unidadxx']}}
                        </div>
                        @endif
                    </td>
                    <td scope="col" class="letras">
                        @if($alistami['mostrarx'])
                        {{ Form::text($alistami['idxxxxxx'].'_dif', $alistami['diferenc'],
                            ['class'=>'form-control numerico','id'=>$alistami['idxxxxxx'].'_dif',
                            'onkeypress'=>'return filterFloat(event,this);','style'=>'width: 80px']) }}
                        @endif
                    </td>
                    <?php
                    $lotesxxx = $todoxxxx['alistami']['lotesxxx'][$key];
                    ?>
                    <td scope="col" class="letras">
                        {{$lotesxxx['nombrexx']}}
                    </td>
                    <td scope="col" class="letras">
                        {{$lotesxxx['lotexxxx']}}
                    </td>
                    <td scope="col" class="letras">
                        @if($lotesxxx['mostrarx'])
                        <div class="form-control" id="{{$lotesxxx['idxxxxxx']}}_con">
                            {{$lotesxxx['cantcons']}}
                        </div>
                        @endif
                    </td>
                    <td scope="col" class="letras" style="width: 100px">
                        @if($lotesxxx['mostrarx'])
                        <div class="form-control" id="{{$lotesxxx['idxxxxxx']}}">
                            {{$lotesxxx['unidadxx']}}
                        </div>
                        @endif
                    </td>
                    <td scope="col" class="letras">
                        @if($lotesxxx['mostrarx'])
                        {{ Form::text($lotesxxx['idxxxxxx'].'_dif', $lotesxxx['diferenc'],
                            ['class'=>'form-control numerico','id'=>$lotesxxx['idxxxxxx'].'_dif',
                            'onkeypress'=>'return filterFloat(event,this);','style'=>'width: 80px']) }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
