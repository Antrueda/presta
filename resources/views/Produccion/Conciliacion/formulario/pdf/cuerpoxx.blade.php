<style>
    .cabecera {
        font-size: 10px;
    }

    .letras {
        font-size: 10px;
    }
</style>

<table class="table table-bordered table-responsiv" style="margin-top: 10px">
    <thead>
        <tr>
            <th class="cabecera">DISPOSITIVO</th>
            <th class="cabecera">LOTE</th>
            <th class="cabecera">CANTIDAD CONSUMIDA</th>
            <th class="cabecera">CANTIDAD ALISTADA</th>
            <th class="cabecera">DIFERENCIA</th>
            <th class="cabecera">MEDICAMENTO</th>
            <th class="cabecera">LOTE</th>
            <th class="cabecera">CANTIDAD CONSUMIDA</th>
            <th class="cabecera">CANTIDAD ALISTADA</th>
            <th class="cabecera">DIFERENCIA</th>
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
            <td scope="col" class="letras">{{$alistami['lotexxxx']}}</td>
            <td scope="col" class="letras">{{$alistami['cantcons']}}</td>
            <td scope="col" class="letras" style="width: 100px">{{$alistami['unidadxx']}}</td>
            <td scope="col" class="letras">{{$alistami['diferenc']}}</td>
            <?php
            $lotesxxx = $todoxxxx['alistami']['lotesxxx'][$key];
            ?>
            <td scope="col" class="letras">{{$lotesxxx['nombrexx']}}</td>
            <td scope="col" class="letras">{{$lotesxxx['lotexxxx']}}</td>
            <td scope="col" class="letras">{{$lotesxxx['cantcons']}}</td>
            <td scope="col" class="letras" style="width: 100px">{{$lotesxxx['unidadxx']}}</td>
            <td scope="col" class="letras">
            {{$lotesxxx['diferenc']}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
