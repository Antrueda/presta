@foreach($datosxxx['formulac'] as $formulax)
<table style=" width: 100%;" cellspacing='0' >
  <tr>
    <td style="width: 15%; text-align: left; height: 75px;" rowspan="2" >
      <img src="{{ url('img/Numixx_Nuevo_Logo.png') }}"   style="width: 135px; height: 76px;" alt="logo">
    </td>
    <td style=" width: 15%; text-align: left;">CÓDIGO</td>
    <td style=" width: 70%; text-align: center;" colspan="2" rowspan="2">ORDEN DE PRODUCCIÓN</td>
  </tr>
  <tr>
    <td style="  text-align: left;">AR-FO-03-V1</td>
  </tr>
</table>
<table style=" width: 100%;" cellspacing='0' >
  <tr>
    <td style="width: 7%;height: 40px;" rowspan="2">
    </td>
    <td style="width: 9%; text-align: left; height: 40px;border: 1px #000 solid " rowspan="2" >
      FECHA
    </td>
    <td style="width: 4%; text-align: center; border: 1px #000 solid">DD</td>
    <td style="width: 4%; text-align: center; border: 1px #000 solid">MM</td>
    <td style="width: 6%; text-align: center; border: 1px #000 solid">AA</td>
    <td style="text-align: center;" colspan="2" rowspan="2">{{$datosxxx['ordenxxx']}}</td>
  </tr>
  <tr>
    <?php
    $fechaxxx = explode(' ', $formulax->created_at);
    $fechaxxx = explode('-', $fechaxxx[0]);
    ?>
    <td style="  text-align: center; border: 1px #000 solid">{{$fechaxxx[2]}}</td>
    <td style="  text-align: center; border: 1px #000 solid">{{$fechaxxx[1]}}</td>
    <td style="  text-align: center; border: 1px #000 solid">{{$fechaxxx[0]}}</td>
  </tr>
</table>
<table style=" width: 100%;" cellspacing='0' >
  <tr>
    <td style="width: 7%;height: 40px; font-size: 12px"> * Está autorizado el despeje de línea SI {{$datosxxx['despejsi']}} NO {{$datosxxx['despejno']}}  </td>
    <td style="width: 9%; text-align: left; height: 40px;font-size: 12px">
      * Todos los medicamentos y materiales de partida se encuentran disponibles SI {{$datosxxx['despejsi']}} NO {{$datosxxx['despejno']}}
    </td>

  </tr>

</table>
<hr>
<table style=" width: 100%;" cellspacing='0' >
  @foreach($formulax->dformulas as $key=> $formulac)
  @if($key==0)
  <tr>

    <th style="width: 7%;height: 20px;">LOTE:</th>
    <th style="width: 57%;height: 20px;">{{$formulax->id}}  </th>

    <th style="width: 3%;height: 20px; ">   </th>
    <th style="width: 7%;height: 20px; ">   </th>
    <th style="width: 13%;height: 20px; "> TOTAL  </th>
    <th style="width: 13%;height: 20px; "> {{$formulax->total}}  </th>

  </tr>
  <tr>

    <td style="height: 20px; "></td>
    <td style="height: 20px; "> {{$formulac->medicame->nombgene}} </td>

    <td style="height: 20px; border: 1px #000 solid ">   </td>
    <td style="height: 20px; ">   </td>
    <td style="height: 20px; "> {{$formulac->purga}} </td>
    <td style="height: 20px; ">  </td>

  </tr>
  @else
  @if($formulac->cantidad>0)
  <tr>

    <td style="height: 20px; "></td>
    <td style="height: 20px; "> {{$formulac->medicame->nombgene}} </td>

    <td style="height: 20px; border: 1px #000 solid ">   </td>
    <td style="height: 20px; ">   </td>
    <td style="height: 20px; "> {{$formulac->purga}} </td>
    <td style="height: 20px; ">  </td>

  </tr>
  @endif
  @endif
  @endforeach
</table>
@endforeach






