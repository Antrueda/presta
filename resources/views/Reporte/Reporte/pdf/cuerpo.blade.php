<style>
  .letras1 {
    font-size: 10px;
  }
</style>
<thead>
  <tr>
    <th class="letras1">LOTES</th>
    <th class="letras1">PRODUCTO</th>
    <th class="letras1">PREPARADO POR </th>
    <th class="letras1">FECHA</th>
    <th class="letras1">LIBERADO POR</th>
    <th class="letras1">LOTE</th>
    <th class="letras1">OBSERVACIONES</th>
    </tr>
</thead>
<tbody id="formulaciontable">
  <style>
    .letras {
      font-size: 10px;
    }
  </style>
  @foreach($detallex as $alistami)
  <tr>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;"></td>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;"></td>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;"></td>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;"></td>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;"></td>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;"></td>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;"></td>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;"></td>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;"></td>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;"></td>
  </tr>
  @endforeach
</tbody>
