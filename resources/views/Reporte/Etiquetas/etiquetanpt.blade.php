<?php
$htmlxxxx = '';
foreach ($cformula->dformulas as $value) {
    if ($value->cantidad > 0) {
        $htmlxxxx .= '<tr>';
        $htmlxxxx .= ' <td style="  text-align: left; background: #d2d6dc" >';
        $htmlxxxx .= $value->medicame->nombgene;
        $htmlxxxx .= '</td>';
        $htmlxxxx .= '<td style="  text-align: right;">';
        $htmlxxxx .= number_format($value->volumen, 2);
        $htmlxxxx .= '</td>';
        $htmlxxxx .= '<td style=" text-align: right;">';
        $htmlxxxx .= number_format($value->purga, 2);
        $htmlxxxx .= '</td>';
        $htmlxxxx .= '</tr>';
    }
}
?>

<!-- background-color: red ;  -->
<style>
    .negrita {
        font-weight: 900;
    }
</style>
<div style=" font-size: {{isset($tamaniox)==true?$tamaniox:6}}px; ">
    <table style=" width: 100%; ">
        <tr>
            <td style="width: 40%; text-align: left; height: 75px; " rowspan="3">
                <img src="{{ url('img/Numixx_Nuevo_Logo.png') }}" style="width: 135px; height: 76px;" alt="logo">
            </td>
            <td style=" width: 15%; text-align: center; " class="negrita">CÓDIGO</td>
        </tr>
        <tr>
            <td style=" text-align: center; " class="negrita">PRO-FO-37-V0</td>
        </tr>
        <tr>
            <td style="  text-align: left; ">
            </td>
        </tr>
    </table>
    <table style=" width: 100%; ">
        <tr>
            <td style=" width: 60%; text-align: left;" class="negrita">
                NUTRICIÓN PARENTERAL
            </td>
            <td style=" width: 20%; text-align: left; " class="negrita">
                LOTE No.
            </td>
            <td style=" width: 20%; text-align: left; " class="negrita">
                {{$cformula->id}}
            </td>
        </tr>
    </table>
    <table style=" width: 100%; ">
        <tr>
            <td style=" width: 25%; text-align: left; " class="negrita">
                N° AFILIACIÓN
            </td>
            <td style=" width: 25%; text-align: left; " class="negrita">
                N° CAMA
            </td>
            <td style=" width: 25%; text-align: left; " class="negrita">
                SERVICIO
            </td>
            <td style=" width: 25%; text-align: left; " class="negrita">
                FECHA VENCIMIENTO
            </td>
        </tr>
        <tr>
            <td style=" width: 25%; text-align: left; ">
                {{$cformula->paciente->cedula}}

            </td>
            <td style=" width: 25%; text-align: left; ">
                {{$cformula->paciente->cama}}
            </td>
            <td style=" width: 25%; text-align: left; ">
                {{$cformula->paciente->servicio->servicio}}
            </td>
            <td style=" width: 25%; text-align: left; ">
                {{ date("Y-m-d",strtotime(explode(' ',$cformula->created_at)[0]."+ 2 days"))}}

            </td>
        </tr>
    </table>
    <table style=" width: 100%; ">
        <tr>
            <td style=" width: 50%; text-align: left;" class="negrita">
                NOMBRES Y APELLIDOS
            </td>
            <td style=" width: 25%; text-align: left; " class="negrita">
                PESO
            </td>
            <td style=" width: 25%; text-align: left; " class="negrita">
                VIA
            </td>
        </tr>
        <tr>
            <td style=" width: 50%; text-align: left; ">
                {{$cformula->paciente->nombres}} {{$cformula->paciente->apellidos}}
            </td>
            <td style=" width: 25%; text-align: left; ">
                {{$cformula->peso}}
            </td>
            <td style=" width: 25%; text-align: left; ">
                {{$cformula->osmolarv}}
            </td>
        </tr>
    </table>
    <table style=" width: 100%; ">
        <tr>
            <td style=" width: 25%; text-align: left; " class="negrita">
                CL&Iacute;NICA
            </td>
            <td style=" width: 35%; text-align: left; ">
                {{$cformula->sis_clinica->clinica->clinica}}
            </td>
            <td style=" width: 15%; text-align: left; " class="negrita">
                NPT
            </td>
            <td style=" width: 25%; text-align: left; ">
                {{$cformula->paciente->npt->nombre}}
            </td>
        </tr>
    </table>
    <table style=" width: 100%;">
        <thead>
            <tr>
                <th style=" width: 60%; text-align: left; border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
                    NUTRIENTE:
                </th>

                <th style=" width: 15%; text-align: left;border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
                    VOLUMEN
                </th>
                <th style=" width: 15%; text-align: left;border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
                    VOLUMEN CON PURGA
                </th>
            </tr>
        </thead>
        <tbody>
            <?= $htmlxxxx ?>
            <tr>
                <td style="  text-align: left; background: #d2d6dc">
                    VOLUMEN DÍA
                </td>
                <td style=" text-align: right;">
               {{$cformula->volumen}}
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td style="  text-align: left; background: #d2d6dc">
                    VOLUMEN TOTAL
                </td>
                <td>
                </td>
                <td style=" text-align: right;">
                {{$cformula->volumen+$cformula->purga}}
                </td>

            </tr>

        </tbody>
    </table>
    <table style=" width: 100%;">
        <tr>
            <td style=" width:20%;" class="negrita">
                DURACIÓN
            </td>
            <td style=" width:15%;">
                {{$cformula->tiempo}}
            </td>
            <td style=" width:20%;" class="negrita">
                VELOCIDAD
            </td>
            <td style=" width:25%;">
                {{number_format($cformula->velocidad,2)}}
            </td>
            <td style=" width:30%;" class="negrita">
                FECHA PREPARACI&Oacute;N
            </td>
            <td style=" width:20%;">
                {{explode(' ',$cformula->created_at)[0]}}
            </td>
        </tr>
    </table>
    <table style=" width: 100%;">
        <tr>

            <td style=" width:40%;" class="negrita">
                RELACIÓN: Caloría No proteícas/g Nitrógeno
            </td>
            <td>
                {{$cformula->protnitr}}

            </td>
            <td style=" width:30%;" class="negrita">
                OSMOLARIDAD
            </td>
            <td>
            {{$cformula->osmolari}}
                {{-- number_format($calculos['osmolari'],2) --}}
            </td>
        </tr>
    </table>
    <table style=" width: 100%;">
        <tr>
            <td style=" width:22%;" class="negrita">
                CALOR&Iacute;AS TOTALES
            </td>
            <td style=" width:7%;">
            {{$cformula->calotota}}
            </td>
            <td class="negrita">
                CALOR&Iacute;A TOTAL/Kg/D&Iacute;A
            </td>
            <td style=" width:7%;">
            {{$cformula->caltotkg}}

            </td>
            <td class="negrita" style=" width:28%;">
                RELACIÓN CALCIO/FÓSFORO (&lt;2 )
            </td>
            <td>
            {{$cformula->calcfosv}}

            </td>
        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <td style=" width:50%;" class="negrita">
                PREPARADO POR:
            </td>
            <td style=" width:50%;" class="negrita">
                LIBERADO POR:
            </td>
        </tr>
        <tr>
            <td>
                Q.F. {{$preparad}}
            </td>
            <td>
                Q.F. {{$liberado}}
            </td>
        </tr>
    </table>
    <br>
    <img src="{{ url('qrcodes/qrcode.svg') }}">


</div>
