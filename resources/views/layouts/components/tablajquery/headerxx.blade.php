<h3 class="card-title">
    {{ $todoxxxx['titulist'] }}
    @if($todoxxxx['vercrear'])
        @can($todoxxxx['permisox'].'-crear')
            <a class="btn btn-sm btn-primary ml-2" title="{{ $todoxxxx['titunuev'] }}" href="{{ route($todoxxxx['routxxxx'].'.nuevo',$todoxxxx['parametr']) }}">
                {{ $todoxxxx['titunuev'] }}
            </a>
        @endcan
    @endif
</h3>