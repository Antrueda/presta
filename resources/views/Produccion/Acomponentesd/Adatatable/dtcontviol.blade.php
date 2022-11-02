<div class="form-row align-items-end">
    <div class="form-group col-md-12">
        {{ Form::label($todoxxxx["contviol"][1], $todoxxxx["contviol"][2], ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select($todoxxxx["contviol"][1], $todoxxxx["contviol"][0], null, ['class' => 'form-control form-control-sm']) }}
        @if($errors->has($todoxxxx["contviol"][1]))
        <div class="invalid-feedback d-block">
            {{ $errors->first($todoxxxx["contviol"][1]) }}
        </div>
        @endif
    </div>
</div>
<div class="card card-outline card-secondary">
    <div class="card-header">
        <h3 class="card-title">
            {{ $todoxxxx['titulist'] }}
            @if($todoxxxx['vercrear'])
            @can($todoxxxx['permisox'].'-crear')
            <a class="btn btn-sm btn-primary ml-2" title="{{$todoxxxx['titunuev']}}" href="{{ route($todoxxxx['routxxxx'].'.nuevo',$todoxxxx['parametr']) }}">
                {{ $todoxxxx['titunuev'] }}
            </a>
            @endcan
            @endif
        </h3>
    </div>
    <div class="card-body">
        @canany([$todoxxxx['permisox'].'-leer',$todoxxxx['permisox'].'-crear',$todoxxxx['permisox'].'-editar',$todoxxxx['permisox'].'-borrar'])
        <div class="table-responsive">
            <table id="{{ $tableName }}" class="table table-bordered   table-sm">
                <thead>
                    @foreach( $todoxxxx['cabecera'] as $cabecera )
                    <tr class="text-center">
                        @foreach( $cabecera as $cabecerx)
                        <th width="{{$cabecerx['widthxxx']}}" rowspan="{{$cabecerx['rowspanx']}}" colspan="{{$cabecerx['colspanx']}}"> {{ $cabecerx['td']   }}</th>
                        @endforeach
                    </tr>
                    @endforeach
                </thead>
                <tbody>

                    @foreach( $todoxxxx['cuerpoxx'] as $cuerpoxx )
                    <tr class="text-center">

                        @foreach( $cuerpoxx as $cuerpoxy)
                        <td>
                            @if($cuerpoxy['td']==1)
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Seleccione una opacion
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach($cuerpoxy['botonesx'] as $botonesx)
                                    <div class="dropdown-item">
                                        <a class="btn btn-sm btn-warning " href="{{ route('ficonvio.editar', $botonesx[0]) }}">{{$botonesx[1]}}</a>
                                    </div>

                                    @endforeach




                                </div>
                            </div>

                            @else
                            {{ $cuerpoxy['td']   }}
                            @endif


                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endcanany
    </div>
</div>