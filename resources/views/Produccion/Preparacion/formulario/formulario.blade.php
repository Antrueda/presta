<div class="form-group row">
    <div class="form-group col-md-12">
        {{ Form::label('sis_clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="" class="form-control" >
            {{$todoxxxx['modeloxx']->sis_clinica->clinica->clinica}}
        </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('tiempo', 'Tiempo Infusión:', ['class' => 'control-label col-form-label-sm']) }}

        <div id="" class="form-control" >
            {{$todoxxxx['modeloxx']->tiempo}}
        </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('velocidad', 'Velocidad Infusión:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="" class="form-control" >
            {{$todoxxxx['modeloxx']->velocidad}}
        </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('volumen', 'Volumen:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="" class="form-control" >
            {{$todoxxxx['modeloxx']->volumen}}
        </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('purga', 'Purga:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="" class="form-control" >
            {{$todoxxxx['modeloxx']->purga}}
        </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('peso', 'Peso:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="" class="form-control" >
            {{$todoxxxx['modeloxx']->peso}}
        </div>
    </div>
    <div class="form-group col-md-12">
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
        <table style="width: 100%">
            <thead>
                <tr>
                    <th style=" width: 45%; text-align: left; border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
                        NUTRIENTE:
                    </th>
                    <th style=" width: 10%; text-align: left; border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
                        REQ
                    </th>
                    <th style=" width: 15%; text-align: left;border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
                        VOLUMEN
                    </th>
                    <th style=" width: 15%; text-align: left;border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
                        VOLUMEN PURGA
                    </th>
                    <th style=" width: 15%; text-align: left;border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
                        ADICIONADO
                    </th>
                </tr>
            </thead>
            <tbody id="checkiados">
            @foreach( $todoxxxx['modeloxx']->dformulas as $value)
                @if($value->cantidad!=0)
                <tr>
                    <td style="  text-align: left; background: #d2d6dc" >
                    {{$value->medicame->casa->casa}}
                    </td>
                    <td style="  text-align: left;">
                    {{$value->cantidad}}
                    </td>
                    <td style="  text-align: left;">
                    {{number_format($value->volumen,2)}}
                    </td>
                    <td style=" text-align: left;">
                    {{number_format($value->purga,2)}}
                    </td>
                    <td style=" text-align: left;">
                    <?php
                    $checkedxx = '';
                    if ($value->preparar == 1) {
                        $checkedxx = 'checked';
                    } else if (is_array(old('preparar_' . $value->id)) && in_array(1, old('preparar_' . $value->id))) {
                        $checkedxx = 'checked';
                    }
                    ?>
                    <input type="checkbox" class="checks" value="1" name="preparar_{{$value->id}}[]" {{$checkedxx}} id="preparar_{{$value->id}}">
                    </td>
                </tr>

                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
