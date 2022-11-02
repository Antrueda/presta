@extends('layouts.index')
@section('content')
    @component($todoxxxx["rutacarp"].'Acomponentes.tabsxxxx.index',['todoxxxx'=>$todoxxxx])
        @slot('crudxxxx')
            @include($todoxxxx["rutarchi"])
        @endslot
    @endcomponent
    @section('codigo')
        @foreach($todoxxxx["ruarchjs"] as $jsxxxxxx)
            @include($jsxxxxxx['jsxxxxxx'])
        @endforeach
    @endsection
