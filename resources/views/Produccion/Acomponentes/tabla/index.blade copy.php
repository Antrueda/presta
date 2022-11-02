

<table id="{{ $tableName }}" class="table table-bordered table-hover table-sm {{ $class ?? '' }}" style="width:100%">
  <thead>
    <tr>
      @foreach( $cabeceras as $cabecera )
        <th>{{  $cabecera['td'] }}</th>
      @endforeach
      <th style="width: 200px">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach( $collection as $item )
    <tr>
      @foreach( $item['body'] as $value )
      <td>
        {{ $value['td'] }}
      </td>
      @endforeach
      <td style="text-align: justify">
        <form action="{{ URL::to($opciones['rutaxxxx'].'/borrar/'.$item['id'])}}" method="POST" class="btn btn-sm">
          @method('DELETE')
          @csrf
          {{ Form::submit('Eliminar', ['class'=>'btn btn-sm btn-danger']) }}
        </form>
        <a href="{{ URL::to($opciones['rutaxxxx'].'/editar/'.$item['id'])}}" class="btn btn-sm btn-warning" role="button">Editar</a>
        <a href="{{ URL::to($opciones['rutaxxxx'].'/ver/'.$item['id'])}}" class="btn btn-sm btn-primary" role="button">Ver</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>