@extends('layouts.index')
@section('styles')


@endsection
@section('content')

@if ($todoxxxx["indecrea"])

    @if ($todoxxxx["esindexx"])
         @include('layouts.components.pestanias.index')
    @else
       @include('layouts.components.pestanias.crear')
    @endif
    @endsection
    @section('codigo')
    @if ($todoxxxx["esindexx"])
        @include('layouts.components.tablajquery.js')
        @include($todoxxxx["rutacarp"].$todoxxxx["carpetax"].'.js.tabla')
    @else
        @include($todoxxxx["rutacarp"].$todoxxxx["carpetax"].'.js.js')
    @endif
@endsection

@else
    @component($todoxxxx["rutacarp"].'tabsxxxx.index',['todoxxxx'=>$todoxxxx])
        @slot($todoxxxx['slotxxxx'])
        @include($todoxxxx['rutacarp'].'Acomponentes.pestanias.'.strtolower($todoxxxx['accionxx']))
        @endslot
    @endcomponent
    @section('codigo')
        @if ($todoxxxx['accionxx']=='index' || $todoxxxx['accionxx']=='Modulo')
            @if($todoxxxx['accionxx']=='index')
                @include('layouts.components.tablajquery.js')
                @include($todoxxxx["rutacarp"].$todoxxxx["carpetax"].'.js.tabla')
            @endif
        @else
            @include($todoxxxx["rutacarp"].$todoxxxx["carpetax"].'.js.js')
        @endif
    @endsection
  @endif
