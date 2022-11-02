@canany([$todoxxxx['permisox'].'-leer',$todoxxxx['permisox'].'-crear',$todoxxxx['permisox'].'-editar',$todoxxxx['permisox'].'-borrar'])
    <div class="table-responsive">
        <table id="{{ $tableName }}" class="table table-bordered   table-sm">
            <thead>
                <tr class="text-center">
                    <th width="150">Acciones</th>
                    @foreach( $todoxxxx['cabecera'] as $cabecera )  
                        <th> {{  $cabecera['td']   }}</th>
                    @endforeach
                </tr>
            </thead>
        </table>
    </div>
@endcanany    