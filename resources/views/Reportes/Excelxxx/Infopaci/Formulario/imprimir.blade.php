<table class="table">
    <thead>
        <tr>
            <th scope="col">PACIENTE</th>
            <th colspan="3">{{$todoxxxx['paciente']->nombres}} {{$todoxxxx['paciente']->apellidos}} DOCUMENTO: {{$todoxxxx['paciente']->cedula}}</th>
        </tr>
        <tr>
            <th scope="col">FECHA DE ELABORACI&Oacute;N NUTRICI&Oacute;N</th>
            <th scope="col">N&Uacute;MERO DE REMISI&Oacute;N</th>
            <th scope="col">DESCRIPCI&Oacute;N DEL RANGO</th>
            <th scope="col">VOLUMEN DE LA NUTRICI&Oacute;N</th>
        </tr>
    </thead>
    <tbody>
        @foreach($todoxxxx['modeloxx'] as $registro)
        <tr>
            <th>{{$registro['fechanpt']}}</th>
            <td>{{$registro['paciente']}}</td>
            <td>{{$registro['tiponutr']}}</td>
            <td>{{$registro['volumenx']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
