<table class="table">
    <?php
    $colspanx = 8;
    ?>
    <thead>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;"></th>
        </tr>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;">
                RELACI&Oacute;N DE NUTRICIONES PARENTERALES
            </th>
        </tr>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;">
                {{$todoxxxx['clinicay']->clinica}}
            </th>
        </tr>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;">
                {{$todoxxxx['clinicay']->nitxxxxx}}
            </th>
        </tr>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;">
                PERIODO: {{$todoxxxx['periodox']}}
            </th>
        </tr>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;">
                SOPORTE FACTURA
            </th>
        </tr>
        <tr style="text-align: center;">
            <th scope="col">FECHA DE</th>
            <th scope="col">NOMBRE DEL </th>
            <th scope="col"></th>
            <th scope="col" colspan="2">TIPO DE</th>
            <th scope="col" colspan="2">VOLUMEN TOTAL</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">VALOR</th>
        </tr>
        <tr style="text-align: center;">
            <th scope="col">Npt</th>
            <th scope="col">PACIENTE</th>
            <th scope="col">HISTORIA CL&Iacute;NICA</th>
            <th scope="col" colspan="2">NUTRICI&Oacute;N</th>
            <th scope="col">CON L&Iacute;PIDOS</th>
            <th scope="col">SIN L&Iacute;PIDOS</th>
            <th scope="col">NPTS</th>
            <th scope="col">UNIDAD NPT</th>
        </tr>
    </thead>
    <tbody>
        @foreach($todoxxxx['modeloxx'] as $registro)
        @if($registro['totalxxx']['totalxxx']==0)
        <?php
        $cobrsepa = $registro['cobrsepa'];
        $cobrsepx = $cobrsepa[1];
        if ($cobrsepx) {
            $cobrsepx = $cobrsepa[1] + 2;
        }

        ?>
        <tr>
            <th rowspan="{{$cobrsepx}}">{{$registro['fechanpt']}}</th>
            <td rowspan="{{$cobrsepx}}">{{$registro['paciente']}}</td>
            <td rowspan="{{$cobrsepx}}">{{$registro['histclin']}}</td>
            <td colspan="2">{{$registro['tiponutr']}}</td>
            <td rowspan="{{$cobrsepx}}">{{$registro['volulipi']}}</td>
            <td rowspan="{{$cobrsepx}}">{{$registro['volsinli']}}</td>
            <td rowspan="{{$cobrsepx}}">{{$registro['cantinpt']}}</td>
            <td rowspan="{{$cobrsepx}}">{{$registro['valornpt']}}</td>
        </tr>
        @if($cobrsepx>1)
        <tr>
            <td>MEDICAMENTO</td>
            <td>VOLUMEN</td>
        </tr>
        @foreach($cobrsepa[0] as $registrx)
        <tr>
            <td>{{$registrx->medicame->nombgene}}</td>
            <td>{{$registrx->volumen}} </td>
        </tr>
        @endforeach
        @endif
        @else
        <tr>
            <th></th>
            <td colspan="5" style="font-weight: bold;">TOTAL D&Iacute;A {{$registro['totalxxx']['fechadia']}}</td>

            <td style="font-weight: bold;">{{$registro['totalxxx']['totalxxx']}}</td>
            <td></td>
        </tr>
        @endif
        @endforeach

    </tbody>
</table>
<table class="table">
    <thead>
        <tr>
            <th colspan="5">RESUMEN</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nro. NPT</td>
            <td>TIPO DE NUTRICI&Oacute;N</td>
            <td>VALOR UNIDAD</td>
            <td>VALOR TOTAL</td>
            <td>COD WO</td>
        </tr>
        <?php
        $totalxxx = 0;
        foreach ($todoxxxx['resumenx'] as $key => $value) {
            $totalxxx = $value['cantidad'] + $totalxxx;

        ?>
            <tr>
                <td>{{$value['cantidad']}}</td>
                <td>{{$value['rangoxxx']}}</td>
                <td></td>
                <td></td>
                <td>{{$value['codiword']}}</td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td>{{$totalxxx}}</td>
            <td colspan="2">TOTAL</td>

            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
