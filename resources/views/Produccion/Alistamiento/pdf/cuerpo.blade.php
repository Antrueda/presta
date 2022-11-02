<style>
  .letras1 {
    font-size: 10px;
  }
</style>
<thead>
  <tr>
  <th class="letras1">DISPOSITIVO MÉDICO</th>
    <th class="letras1">INVENTARIO</th>
    <th class="letras1">UND</th>
    <th class="letras1">LOTE</th>
    <th class="letras1">REGISTRO INVIMA</th>
    <th class="letras1">F.VENC</th>
    <th class="letras1">MEDICAMENTO</th>
    <th class="letras1">INVENTARIO</th>
    <th class="letras1">UND</th>
    <th class="letras1">LOTE</th>
    <th class="letras1">REGISTRO INVIMA</th>
    <th class="letras1">F.VENC</th>
  </tr>
</thead>
<tbody id="formulaciontable">
  <style>
    .letras {
      font-size: 10px;
    }
  </style>

@foreach($detallex['lotesyyy'] as $key=> $alistami)
    <tr>
        <td class="letras">{{$alistami['nombrexx']}}</td>
        <td class="letras">{{$alistami['inventar']}}</td>
        <td class="letras" style="width: 100px">
            @if($alistami['mostrarx'])
            {{$alistami['unidadxx']}}

            @endif
        </td>
        <td class="letras">{{$alistami['lotexxxx']}}</td>
        <td class="letras">{{$alistami['reginvim']}}</td>
        <td class="letras">{{$alistami['fechvenc']}}</td>
        <?php
        $lotesxxx = $detallex['lotesxxx'][$key];
        ?>
        <td class="letras">{{$lotesxxx['nombrexx']}}</td>
        <td class="letras">{{$alistami['inventar']}}</td>
        <td class="letras">

            @if($lotesxxx['mostrarx'])
            {{$lotesxxx['unidadxx']}}
            @endif
        </td>
        <td class="letras">{{$lotesxxx['lotexxxx']}}</td>
        <td class="letras">{{$lotesxxx['reginvim']}}</td>
        <td class="letras">{{$lotesxxx['fechvenc']}}</td>
    </tr>
    @endforeach



</tbody>
