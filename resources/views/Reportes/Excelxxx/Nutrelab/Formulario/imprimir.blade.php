<table class="table">
    <thead>
        <tr>
            <th scope="col">FECHA DE ELABORACI&Oacute;N NUTRICI&Oacute;N</th>
            <th scope="col">NUMERO DE REMISI&Oacute;N</th>
            <th scope="col">NOMBRE DEL PACIENTE</th>
            <th scope="col">HISTORIA CL&Iacute;NICA</th>
            <th scope="col">NIT DE LA CL&Iacute;NICA</th>
            <th scope="col">C&Oacute;DIGO DEL RANGO ASIGNADO</th>
            <th scope="col">DESCRIPCI&Oacute;N DEL RANGO</th>
            <th scope="col">FECHA DE VENCIMIENTO</th>
        </tr>
    </thead>
    <tbody>
        @foreach($todoxxxx['modeloxx'] as $registro)
        <tr>
            <th>{{$registro['fechanpt']}}</th>
            <td>{{$registro['remision']}}</td>
            <td>{{$registro['paciente']}}</td>
            <td>{{$registro['histclin']}}</td>
            <td>{{$registro['clinicax']}}</td>
            <td>{{$registro['codigoxx']}}</td>
            <td>{{$registro['tiponutr']}}</td>
            <td>{{$registro['fechaven']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
