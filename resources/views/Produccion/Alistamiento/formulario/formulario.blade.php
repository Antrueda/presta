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
                    <th>INVENTARIO</th>
                    <th style="text-align: center; width: 100px;">UND</th>
                    <th>LOTE</th>
                    <th>REGISTRO INVIMA</th>
                    <th>F VENC</th>
                    <th>MEDICAMENTO</th>
                    <th>INVENTARIO</th>
                    <th>UND</th>
                    <th>LOTE</th>
                    <th>REGISTRO INVIMA</th>
                    <th>F VENC</th>
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
                    <td scope="col" class="letras">{{$alistami['nombrexx']}}</td>
                    <td scope="col" class="letras">{{$alistami['inventar']}}</td>
                    <td scope="col" class="letras" style="width: 100px">
                        @if($alistami['mostrarx'])
                        {{ Form::text($alistami['idxxxxxx'], $alistami['unidadxx'],
                            ['class'=>'form-control numerico','id'=>$alistami['idxxxxxx'],
                            'onkeypress'=>'return filterFloat(event,this);','style'=>'width: 80px']) }}
                        @endif
                    </td>
                    <td scope="col" class="letras">{{$alistami['lotexxxx']}}</td>
                    <td scope="col" class="letras">{{$alistami['reginvim']}}</td>
                    <td scope="col" class="letras">{{$alistami['fechvenc']}}</td>
                    <?php
                    $lotesxxx = $todoxxxx['alistami']['lotesxxx'][$key];
                    ?>
                    <td scope="col" class="letras">{{$lotesxxx['nombrexx']}}</td>
                    <td scope="col" class="letras">{{$alistami['inventar']}}</td>
                    <td scope="col" class="letras">

                        @if($lotesxxx['mostrarx'])
                        {{ Form::text($lotesxxx['idxxxxxx'], $lotesxxx['unidadxx'],
                            ['class'=>'form-control numerico','id'=>$lotesxxx['idxxxxxx'],
                            'onkeypress'=>'return filterFloat(event,this);','style'=>'width: 80px']) }}
                        @endif
                    </td>
                    <td scope="col" class="letras">{{$lotesxxx['lotexxxx']}}</td>
                    <td scope="col" class="letras">{{$lotesxxx['reginvim']}}</td>
                    <td scope="col" class="letras">{{$lotesxxx['fechvenc']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
