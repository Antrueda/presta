
<table class="table table-bordered" style="margin-top: 10px">
    <tbody id="formulaciontable">
        <tr >
            <td colspan="2">VOLUMEN TOTAL (ml)</td>
            <td id="volutota" style="text-align: right;"> {{$todoxxxx['modeloxx']->volumen}}  </td>
            <td> VOLUMEN CON PURGA (ml)</td>
            <td id="velopurg" style="text-align: right;"> {{$todoxxxx['modeloxx']->volumen+$todoxxxx['modeloxx']->purga}} </td>
        </tr>
        <tr>
            <td colspan="2">VELOCIDAD DE INFUSIÓN (ml/hora)</td>
            <td id="veloinfu" style="text-align: right;">{{$todoxxxx['modeloxx']->velocidad}} </td>
            <td rowspan="2" ></td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE CARBOHIDRATOS (%)</td>
            <td id="carbvali">{{$todoxxxx['modeloxx']->carbvali}}</td>
            <td id="concarbo" style="text-align: right;">{{$todoxxxx['modeloxx']->concarbo}}</td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE PROTEÍNA (%) (>1%)</td>
            <td id="concprov" >{{$todoxxxx['modeloxx']->concprov}}</td>
            <td id="concprot" style="text-align: right;">{{$todoxxxx['modeloxx']->concprot}}</td>
            <td colspan="2" class="align-bottom" rowspan="2"> VÍA DE ADMINISTRACIÓN</td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE LÍPIDOS (%) (>1%)</td>
            <td id="conclipv">{{$todoxxxx['modeloxx']->conclipv}}</td>
            <td id="conclipi" style="text-align: right;">{{$todoxxxx['modeloxx']->conclipi}}</td>
        </tr>
        <tr>
            <td colspan="2">OSMOLARIDAD (mOsm/L)</td>
            <td id="osmolari" style="text-align: right;">{{$todoxxxx['modeloxx']->osmolari}}</td>
            <td id="osmolarv" colspan="2">{{$todoxxxx['modeloxx']->osmolarv}}</td>
        </tr>
        <tr>
            <td colspan="2">GRAMOS TOTALES DE NITRÓGENO</td>
            <td id="gramtota" style="text-align: right;">{{$todoxxxx['modeloxx']->gramtota}}</td>
            <td colspan="2" rowspan="8"></td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN: Caloría No proteícas/g Nitrógeno</td>
            <td id="protnitr" style="text-align: right;">{{$todoxxxx['modeloxx']->protnitr}}</td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN: Caloría No proteícas/g A.A</td>
            <td id="proteica" style="text-align: right;">{{$todoxxxx['modeloxx']->proteica}}</td>
        </tr>
        <tr>
            <td>CALORÍAS PROTEICAS</td>
            <td id="caloprov" style="text-align: right;">{{$todoxxxx['modeloxx']->caloprov}}%</td>
            <td id="caloprot" style="text-align: right;">{{$todoxxxx['modeloxx']->caloprot}}</td>
        </tr>
        <tr>
            <td>CALORÍAS LÍPIDOS</td>
            <td id="calolipv" style="text-align: right;">{{$todoxxxx['modeloxx']->calolipv}}%</td>
            <td id="calolipi" style="text-align: right;">{{$todoxxxx['modeloxx']->calolipi}}</td>
        </tr>
        <tr>
            <td>CALORÍAS CARBOHIDRATOS</td>
            <td id="calocarv" style="text-align: right;">{{$todoxxxx['modeloxx']->calocarv}}%</td>
            <td id="calocarb" style="text-align: right;">{{$todoxxxx['modeloxx']->calocarb}}</td>
        </tr>
        <tr>
            <td>CALORÍAS TOTALES</td>
            <td id="calototv" style="text-align: right;">{{$todoxxxx['modeloxx']->calototv}}%</td>
            <td id="calotota" style="text-align: right;">{{$todoxxxx['modeloxx']->calotota}}</td>
        </tr>
        <tr>
            <td colspan="2">CALORÍAS TOTALES/Kg//Día</td>
            <td id="caltotkg" style="text-align: right;">{{$todoxxxx['modeloxx']->caltotkg}}</td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN CALCIO/FÓSFORO (<2)</td>
            <td id="calcfosf" style="text-align: right;">{{$todoxxxx['modeloxx']->calcfosf}}</td>
            <td id="calcfosv" colspan="2" >{{$todoxxxx['modeloxx']->calcfosv}}</td>
        </tr>
        <tr>
            <td colspan="2">PESO TEÓRICO</td>
            <td id="pesoteor" style="text-align: right;">{{$todoxxxx['modeloxx']->pesoteor}}</td>
            <td colspan="2"></td>
        </tr>
    </tbody>
</table>
