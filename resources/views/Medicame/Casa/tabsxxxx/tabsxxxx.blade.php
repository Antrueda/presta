<div class="card">
    <div class="card-header">
        {{$todoxxxx['cardhead']}}
    </div>
    <div class="card-header p-2">
        <ul class="nav nav-tabs">
            @if($todoxxxx['pestpadr']==1)
                @canany(['casa-leer', 'casa-crear', 'casa-editar', 'casa-borrar'])
                <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='casa') ?' active' : '' }}
            text-sm" href="{{ route('casa') }}">CASAS</a></li>
                @endcanany
            @endif

        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
                @if(isset($casa))
                {{ $casa }}
                @endif
            </div>
        </div>
    </div>
</div>
