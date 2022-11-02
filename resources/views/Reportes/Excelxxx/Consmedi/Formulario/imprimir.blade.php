<table class="table">
    <thead>
        <tr>
            <th scope="col">FECHA DEL MEDICAMENTO CONSUMIDO</th>
            <th scope="col">NOMBRE DE LA CL&Iacute;NICA</th>
            <th scope="col">NOMBRE DEL PACIENTE</th>
            <th scope="col">NPT</th>
            <th scope="col">C&Oacute;DIGO DEL MEDICAMENTO</th>
            <th scope="col">NOMBRE DEL MEDICAMENTO</th>
            <th scope="col">UNIDAD DE MEDIDA</th>
            <th scope="col">CANTIDAD DE ML CONSUMIDOS</th>

        </tr>
    </thead>
    <tbody>
        @foreach($todoxxxx['modeloxx'] as $registro)
        <?php
        $formulax = $registro->dformula->cformula;
        $paciente = $formulax->paciente;
        ?>
        <tr>
            <th>{{$registro->created_at}}</th>
            <td>{{$formulax->sis_clinica->clinica->clinica}}</td>
            <td>{{ $paciente->nombres}} {{ $paciente->apellidos}}</td>
            <td>{{ $paciente->npt->nombre}} </td>
            <td>{{$registro->dformula->medicame_id}}</td>
            <td>{{$registro->dformula->medicame->nombgene}}</td>
            <td>{{$registro->dformula->medicame->casa->unidmedi}}</td>
            <td style="text-align: right;">{{number_format($registro->volumenx,2)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
