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
            @switch($todoxxxx['accionxx'])
                @case('index')
                    @include('layouts.components.pestanias.index')
                    @break
                @case('Crear')
                    @include('layouts.components.pestanias.crear')
                    @break
                @case('Editar')
                    @include('layouts.components.pestanias.editar')
                    @break
                @case('Ver')
                    @include('layouts.components.pestanias.ver')
                    @break
                @case('Modulo')
                    @include('layouts.components.pestanias.modulo')
                    @break
            @endswitch
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
