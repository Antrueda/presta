<div class="card">
  <div class="card-header">
    {{ $todoxxxx['cardhead']}}
  </div>
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['alistami-leer', 'alistami-crear', 'alistami-editar', 'alistami-borrar'])
      <li class="nav-item">
        <a class="nav-link {{ $todoxxxx['pestania']['alistami'][0] }} 
        {{ $todoxxxx['pestania']['alistami'][3] }} text-sm" href="
        {{ $todoxxxx['pestania']['alistami'][1] }}">ALISTAMIENTO
        </a>
      </li>
      @endcanany
      @canany(['concilia-leer', 'concilia-crear', 'concilia-editar', 'concilia-borrar'])
      <li class="nav-item">
        <a class="nav-link {{$todoxxxx['pestania']['concilia'][0]}}
        {{ $todoxxxx['pestania']['concilia'][3]}} text-sm" href="
        {{ $todoxxxx['pestania']['concilia'][1] }}">
          CONCILIACIONES
        </a>
      </li>
      @endcanany
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($alistami))
        {{ $alistami }}
        @endif
        @if(isset($concilia))
        {{ $concilia }}
        @endif
      </div>
    </div>
  </div>
</div>