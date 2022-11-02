<div class="card">
  <div class="card-header">
    {{ $todoxxxx['cardhead']}}
  </div>
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['revision-leer', 'revision-crear', 'revision-editar', 'revision-borrar'])
      <li class="nav-item">
        <a class="nav-link {{$todoxxxx['pestania']['revision'][0]}}
        {{ $todoxxxx['pestania']['revision'][3]}} text-sm" href="
        {{ $todoxxxx['pestania']['revision'][1] }}">
          REVISIONES
        </a>
      </li>
      @endcanany
      @canany(['preparac-leer', 'preparac-crear', 'preparac-editar', 'preparac-borrar'])
      <li class="nav-item">
        <a class="nav-link {{$todoxxxx['pestania']['preparac'][0]}}
        {{ $todoxxxx['pestania']['preparac'][3]}} text-sm" href="
        {{ $todoxxxx['pestania']['preparac'][1] }}">
          PREPARACIONES
        </a>
      </li>
      @endcanany
      @canany(['controlp-leer', 'controlp-crear', 'controlp-editar', 'controlp-borrar'])
      <li class="nav-item">
        <a class="nav-link {{$todoxxxx['pestania']['controlp'][0]}}
        {{ $todoxxxx['pestania']['controlp'][3]}} text-sm" href="
        {{ $todoxxxx['pestania']['controlp'][1] }}">
          CONTROL EN PROCESO
        </a>
      </li>
      @endcanany
      @canany(['controlt-leer', 'controlt-crear', 'controlt-editar', 'controlt-borrar'])
      <li class="nav-item">
        <a class="nav-link {{$todoxxxx['pestania']['controlt'][0]}}
        {{ $todoxxxx['pestania']['controlt'][3]}} text-sm" href="
        {{ $todoxxxx['pestania']['controlt'][1] }}">
          CONTROL PRODUCTOS TERMINADOS
        </a>
      </li>
      @endcanany

    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($revision))
        {{ $revision }}
        @endif
        @if(isset($preparac))
        {{ $preparac }}
        @endif
        @if(isset($controlp))
        {{ $controlp }}
        @endif
        @if(isset($controlt))
        {{ $controlt }}
        @endif
      </div>
    </div>
  </div>
</div>