<table class="table table-bordered" style="margin-top: 10px">
    <tbody id="formulaciontable">
        <tr >
            <td colspan="2">VOLUMEN TOTAL (ml)</td>
            <td id="volutota" style="text-align: right;"> {{$todoxxxx['calculos']['volutota']}} </td>
            <td> VOLUMEN CON PURGA (ml)</td>
            <td id="velopurg" style="text-align: right;"> {{$todoxxxx['calculos']['velopurg']}} </td>
        </tr>
        <tr>
            <td colspan="2">VELOCIDAD DE INFUSIÓN (ml/hora)</td>
            <td id="veloinfu" style="text-align: right;">{{$todoxxxx['calculos']['veloinfu']}} </td>
            <td rowspan="2" ></td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE CARBOHIDRATOS (%)</td>
            <td id="carbvali">{{$todoxxxx['calculos']['carbvali']}}</td>
            <td id="concarbo" style="text-align: right;">{{$todoxxxx['calculos']['concarbo']}}</td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE PROTEÍNA (%) (>1%)</td>
            <td id="concprov" >{{$todoxxxx['calculos']['concprov']}}</td>
            <td id="concprot" style="text-align: right;">{{$todoxxxx['calculos']['concprot']}}</td>
            <td colspan="2" class="align-bottom" rowspan="2"> VÍA DE ADMINISTRACIÓN</td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE LÍPIDOS (%) (>1%)</td>
            <td id="conclipv">{{$todoxxxx['calculos']['conclipv']}}</td>
            <td id="conclipi" style="text-align: right;">{{$todoxxxx['calculos']['conclipi']}}</td>
        </tr>
        <tr>
            <td colspan="2">OSMOLARIDAD (mOsm/L)</td>
            <td id="osmolari" style="text-align: right;">{{$todoxxxx['calculos']['osmolari']}}</td>
            <td id="osmolarv" colspan="2">{{$todoxxxx['calculos']['osmolarv']}}</td>
        </tr>
        <tr>
            <td colspan="2">GRAMOS TOTALES DE NITRÓGENO</td>
            <td id="gramtota" style="text-align: right;">{{$todoxxxx['calculos']['gramtota']}}</td>
            <td colspan="2" rowspan="8"></td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN: Caloría No proteícas/g Nitrógeno</td>
            <td id="protnitr" style="text-align: right;">{{$todoxxxx['calculos']['protnitr']}}</td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN: Caloría No proteícas/g A.A</td>
            <td id="proteica" style="text-align: right;">{{$todoxxxx['calculos']['proteica']}}</td>
        </tr>
        <tr>
            <td>CALORÍAS PROTEICAS</td>
            <td  style="text-align: right;">
            <div style="float: right;">%</div>
            <div id="caloprov" style="float: right;">{{$todoxxxx['calculos']['caloprov']}}</div>
            </td>
            <td id="caloprot" style="text-align: right;">{{$todoxxxx['calculos']['caloprot']}}</td>
        </tr>
        <tr>
            <td>CALORÍAS LÍPIDOS</td>
            <td  style="text-align: right;">
            <div style="float: right;">%</div>
            <div id="calolipv" style="float: right;">{{$todoxxxx['calculos']['calolipv']}}</div></td>
            <td id="calolipi" style="text-align: right;">{{$todoxxxx['calculos']['calolipi']}}</td>
        </tr>
        <tr>
            <td>CALORÍAS CARBOHIDRATOS</td>
            <td  style="text-align: right;">
            <div style="float: right;">%</div>
            <div id="calocarv" style="float: right;">{{$todoxxxx['calculos']['calocarv']}}</div>
            </td>
            <td id="calocarb" style="text-align: right;">{{$todoxxxx['calculos']['calocarb']}}</td>
        </tr>
        <tr>
            <td>CALORÍAS TOTALES</td>
            <td  style="text-align: right;">
            <div style="float: right;">%</div>
            <div id="calototv" style="float: right;">{{$todoxxxx['calculos']['calototv']}}</div></td>
            <td id="calotota" style="text-align: right;">{{$todoxxxx['calculos']['calotota']}}</td>
        </tr>
        <tr>
            <td colspan="2">CALORÍAS TOTALES/Kg//Día</td>
            <td id="caltotkg" style="text-align: right;">{{$todoxxxx['calculos']['caltotkg']}}</td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN CALCIO/FÓSFORO (<2)</td>
            <td id="calcfosf" style="text-align: right;">{{$todoxxxx['calculos']['calcfosf']}}</td>
            <td id="calcfosv" colspan="2" >{{$todoxxxx['calculos']['calcfosv']}}</td>
        </tr>
        <tr>
            <td colspan="2">PESO TEÓRICO</td>
            <td id="pesoteor" style="text-align: right;">{{$todoxxxx['calculos']['pesoteor']}}</td>
            <td colspan="2"></td>
        </tr>
    </tbody>
</table>
