<table style=" width: 100%; border: 1px #000 solid; font-size: 10px" cellspacing='0'>
    <tr>
        <td style="width: 15%; text-align: left;  border-right: 1px #000 solid; border-bottom: 1px #000 solid" colspan="2" rowspan="2">
            <img src="{{ url('img/Numixx_Nuevo_Logo.png') }}" style="width: 135px; height: 76px;" alt="logo">
        </td>
        <td style=" width: 40%; text-align: center; border-right: 1px #000 solid; border-bottom: 1px #000 solid; " colspan="9" rowspan="2">ORDEN DE REMISIÓN</td>
        <td style=" width: 45%; text-align: center;" colspan="9">FECHA</td>
    </tr>
    <tr>
        <td style="text-align: center; border-bottom: 1px #000 solid" colspan="9">{{$datosxxx['fechaxxx']}}</td>
    </tr>
    <tr>
        <td style="  text-align: left;" colspan="3">INSTITUCIÓN</td>
        <td style="  text-align: left;" colspan="17">{{$datosxxx['clinicax']['nombrexx']}}</td>

    </tr>
    <tr>
        <td style="  text-align: left;" colspan="3">DIRECCIÓN ENTREGA</td>
        <td style="  text-align: left;" colspan="17">{{$datosxxx['clinicax']['direccio']}}</td>
    </tr>
    <tr>
        <td style="  text-align: left;" colspan="3">TELÉFONO</td>
        <td style="  text-align: left;" colspan="17">{{$datosxxx['clinicax']['telefono']}}</td>
    </tr>
    <tr>
        <td style="  text-align: left;border-top: 1px #000 solid; border-right: 1px #000 solid;" colspan="2">NÚMERO DE LOTE</td>
        <td style="  text-align: left;border-top: 1px #000 solid;border-right: 1px #000 solid;" colspan="5">NOMBRE DEL PACIENTE</td>
        <td style="  text-align: left;border-top: 1px #000 solid;border-right: 1px #000 solid;" colspan="2">DOCUMENTO</td>
        <td style="  text-align: left;border-top: 1px #000 solid;border-right: 1px #000 solid;" colspan="3">VOLUMEN CC</td>
        <td style="  text-align: left;border-top: 1px #000 solid;" colspan="8">TIPO NPTS</td>
    </tr>
    @foreach($datosxxx['formulac'] as $formulac )
    <?php
    $cobrsepa = $formulac['cobrsepa'];
    $cobrsepx = $cobrsepa[1];
    if ($cobrsepx) {
        $cobrsepx = $cobrsepa[1] + 2;
    }
    ?>
    <tr>
        <td style="  text-align: right;border-top: 1px #000 solid;border-right: 1px #000 solid;" rowspan="{{ $cobrsepx}}" colspan="2">{{$formulac['lotexxxx']}}</td>
        <td style="  text-align: left;border-top: 1px #000 solid;border-right: 1px #000 solid;" rowspan="{{ $cobrsepx}}" colspan="5">{{$formulac['paciente']['nombrexx']}} </td>
        <td style="  text-align: left;border-top: 1px #000 solid;border-right: 1px #000 solid;" rowspan="{{ $cobrsepx}}" colspan="2">{{$formulac['paciente']['document']}} </td>
        <td style="  text-align: left;border-top: 1px #000 solid;border-right: 1px #000 solid;" rowspan="{{ $cobrsepx}}" colspan="3">{{$cobrsepa[2]}}</td>
        <td style="  text-align: left;border-top: 1px #000 solid;" colspan="8">{{$formulac['rangoxxx']}}</td>
    </tr>
    @if($cobrsepx>1)
    <tr>
        <td style="  text-align: left;border-top: 1px #000 solid;  border-right: 1px #000 solid;" colspan="5">MEDICAMENTO</td>
        <td style="  text-align: center;border-top: 1px #000 solid; " colspan="3">VOLUMEN</td>
    </tr>
    @foreach($cobrsepa[0] as $registrx)
    <tr>
        <td style="  text-align: left;border-top: 1px #000 solid; border-right: 1px #000 solid;" colspan="5">{{$registrx->medicame->nombgene}}</td>
        <td style="  text-align: right;border-top: 1px #000 solid;" colspan="2">{{number_format($registrx->volumen,2)}}</td>
        <td style="  text-align: left;border-top: 1px #000 solid;" colspan="1"> CC</td>
    </tr>
    @endforeach
    @endif
    @endforeach
    <tr>
        <td style="  text-align: left;border-top: 1px #000 solid;" colspan="3">OBSERVACIONES</td>
        <td style="  text-align: left;border-top: 1px #000 solid;" colspan="17"></td>
    </tr>
    <tr>
        <td style="  text-align: left; height: 100px" colspan="3"></td>
        <td style="  text-align: left;" colspan="17"></td>
    </tr>

    <tr>
        <td style="  text-align: left; border-top: 1px #000 solid; border-right: 1px #000 solid;" colspan="10">NUMIXX S.A.S</td>
        <td style="  text-align: center; border-top: 1px #000 solid;" colspan="10">RECIBIDO Y ACEPTADO</td>
    </tr>
    <tr>
        <td style="  text-align: left;  border-right: 1px #000 solid; height: 12px" colspan="10"></td>
        <td style="  text-align: left; border-top: 1px #000 solid;" colspan="2">NOMBRE</td>
        <td style="  text-align: left; border-top: 1px #000 solid;border-bottom: 1px #000 solid;" colspan="8"></td>
    </tr>
    <tr>
        <td style="  text-align: left;  border-right: 1px #000 solid;height: 12px" colspan="10"></td>
        <td style="  text-align: left; " colspan="2">FIRMA</td>
        <td style="  text-align: left; border-top: 1px #000 solid;border-bottom: 1px #000 solid;" colspan="8"></td>
    </tr>
    <tr>
        <td style="  text-align: left;  border-right: 1px #000 solid;height: 12px" colspan="10"></td>
        <td style="  text-align: left; " colspan="2">HORA</td>
        <td style="  text-align: left; border-top: 1px #000 solid;border-bottom: 1px #000 solid;" colspan="8"></td>
    </tr>
    <tr>
        <td style="  text-align: left;  border-right: 1px #000 solid;height: 12px" colspan="10"></td>
        <td style="  text-align: left; " colspan="10"></td>
    </tr>
    <tr>
        <td style="  text-align: left;  border-right: 1px #000 solid;height: 12px" colspan="10"></td>
        <td style="  text-align: left; " colspan="10"></td>
    </tr>
    <tr>
        <td style="  text-align: left; border-top: 1px #000 solid; border-right: 1px #000 solid;" colspan="10">Q.F {{$formulac['quimicox']}}</td>
        <td style="  text-align: left; " colspan="10"></td>
    </tr>
</table>
