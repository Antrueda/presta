<div class="form-group row">
    <div class="form-group col-md-12">
        {{ Form::label('sis_clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
       <div id="sis_clinica_id" class="form-control" >
       {{$todoxxxx['modeloxx']->sis_clinica->clinica->clinica}} (SUCURSAL: {{$todoxxxx['modeloxx']->sis_clinica->sucursal}})
       </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('tiempo', 'Tiempo Infusión:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="tiempo" class="form-control" >
         {{$todoxxxx['modeloxx']->tiempo}}
       </div>
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('velocidad', 'Velocidad Infusión:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="tiempo" class="form-control" >
         {{$todoxxxx['modeloxx']->velocidad}}
       </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('volumen', 'Volumen Total:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="tiempo" class="form-control" >
         {{$todoxxxx['modeloxx']->volumen}}
       </div>
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('purga', 'Purga:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="tiempo" class="form-control" >
         {{$todoxxxx['modeloxx']->purga}}
       </div>
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('peso', 'Peso:', ['class' => 'control-label col-form-label-sm']) }}
        <div id="tiempo" class="form-control" >
         {{$todoxxxx['modeloxx']->tiempo}}
       </div>
    </div>

    <div class="form-group col-md-12">
        <hr style="border:  #000000 solid 2px" />
    </div>
    <div class="form-group col-md-12">
        <table class="table table-bordered" style="margin-top: 10px">
            <thead>
                <tr>
                    <th>MEDICAMENTO</th>
                    <th>SELECCIÓN</th>
                    <th>UNIDAD</th>
                    <th>REQUERIMIENTO</th>
                    <th>VOLUMEN</th>
                </tr>
            </thead>
            <tbody id="formulaciontable">

                @foreach($todoxxxx['modeloxx']->dformulas as $formulax)
                <tr >
                    <td>{{$formulax->medicame->casa->casa}}</td>
                    <td>{{$formulax->medicame->nombgene}}</td>
                    <td>{{$formulax->medicame->casa->unidmedi}}</td>
                    <td><div class="form-control" >{{$formulax->cantidad}}</div></td>
                    <td><div class="form-control" >{{number_format($formulax->volumen,2)}}</div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('Produccion.Revision.formulario.resultad')
    <div class="form-group col-md-4">
    <h1>Profesional que formula: </h1>
    </div>
    <div class="form-group col-md-8">
   <h3>{{$todoxxxx['modeloxx']->creador->name}}</h3>
    </div>

</div>
