
<div class="card card-outline card-secondary">
    <div class="card-header">
        <h3 class="card-title">
            Datos
            @can($opciones['rutaxxxx'].'-crear')
                <a class="btn btn-sm btn-primary ml-2" title="Nuevo" href="{{ route($opciones['rutaxxxx'].'.nuevo') }}">
                    Nuevo
                </a>
            @endcan
        </h3>
    </div>
    <div class="card-body">
        @canany([$opciones['rutaxxxx'].'-leer',$opciones['rutaxxxx'].'-crear',$opciones['rutaxxxx'].'-editar',$opciones['rutaxxxx'].'-borrar'])
            <form class="form-inline pb-3" action="{{ route($opciones['rutaxxxx']) }}" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="buscar" value="{{ $buscarxx }}" placeholder="Texto a buscar">
                </div>
                <button type="submit" class="btn btn-primary ml-2" title="Buscar">Buscar</button>
            </form>
            @if(count($collection)>0)
                <div class="table-responsive">
                    <table id="{{ $tableName }}" class="table table-bordered table-striped table-hover table-sm {{ $class ?? '' }}">
                        <thead>
                            <tr class="text-center">
                                @canany([$opciones['rutaxxxx'].'-editar',$opciones['rutaxxxx'].'-borrar'])
                                    <th>Acciones</th>
                                @endcan
                                  @foreach( $cabeceras as $cabecera )
                                    <th>{{  $cabecera['td'] }}</th>
                                  @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($collection as $d)
                                <tr>
                                    @canany([$opciones['rutaxxxx'].'-editar',$opciones['rutaxxxx'].'-borrar'])
                                        <td class='text-center'>
                                            @can($opciones['rutaxxxx'].'-editar')
                                                <a class="btn btn-sm btn-primary" title="Editar" href="{{ route($opciones['rutaxxxx'].'.editar', $d['id']) }}">
                                                    Editar
                                                </a>
                                            @endcan
                                            @can($opciones['rutaxxxx'].'-leer')
                                                <a class="btn btn-sm btn-primary" title="Ver" href="{{ route($opciones['rutaxxxx'].'.ver', $d['id']) }}">
                                                    Ver
                                                </a>
                                            @endcan
                                        </td>
                                        @foreach( $d['body'] as $value )
                                            <td>
                                                {{ $value['td'] }}
                                            </td>
                                        @endforeach
                                        <td class="text-center">
                                            @if($d['estadoxx'] == 1)
                                                <span class="fas fa-check text-success" aria-hidden="true"></span>
                                            @else
                                                <span class="fas fa-times text-danger" aria-hidden="true"></span>
                                            @endif
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $registro->appends(['buscar' => $buscarxx])->links() }}
            @else
                <p>No hay datos</p>
            @endif
        @endcanany
    </div>
</div>