<div class="form-group card-footer text-muted text-center">
    @foreach ($todoxxxx['botoform'] as $botoform)
    @if ($botoform['mostrars'])
    @switch($botoform['formhref'])
    @case(1)
    {{ Form::submit($botoform['accionxx'], ['class'=>$botoform['clasexxx']]) }}
    @break
    @case(2)
    <a href="{{route($botoform['routingx'][0],$botoform['routingx'][1])}}"
        class="{{ $botoform['clasexxx']}}">{{strtoupper($botoform['tituloxx'])}}</a>
    @break
    @case(3)
        <button type="button" class="{{$botoform['clasexxx']!=''?$botoform['clasexxx']:'btn btn-primary'}}">{{strtoupper($botoform['accionxx'])}}</button>

    @break
    @case(4)
    <a href="{{route($botoform['routingx'][0],$botoform['routingx'][1])}}" target="_blank"
        class="{{ $botoform['clasexxx']}}">{{strtoupper($botoform['tituloxx'])}}</a>
    @break
    @endswitch
    @endif
    @endforeach
</div>
