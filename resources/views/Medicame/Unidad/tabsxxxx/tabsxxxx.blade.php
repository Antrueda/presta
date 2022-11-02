<div class="card">

  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['unidad-leer', 'unidad-crear', 'unidad-editar', 'unidad-borrar'])
      <li class="nav-item">
        <a class="nav-link {{$todoxxxx['pestania']['unidadxx'][0]}}
        {{ $todoxxxx['pestania']['unidadxx'][3]}} text-sm" href="
        {{ $todoxxxx['pestania']['unidadxx'][2] }}">
          UNIDADES
        </a>
      </li>
      @endcanany
      @canany(['urango-leer', 'urango-crear', 'urango-editar', 'urango-borrar'])
      <li class="nav-item">
        <a class="nav-link {{$todoxxxx['pestania']['urangosx'][0]}}
        {{ $todoxxxx['pestania']['urangosx'][3]}} text-sm" href="
        {{ $todoxxxx['pestania']['urangosx'][2] }}">
          UNIDAD RANGOS
        </a>
      </li>
      @endcanany
      @canany(['urnpt-leer', 'urnpt-crear', 'urnpt-editar', 'urnpt-borrar'])
      <li class="nav-item">
        <a class="nav-link {{$todoxxxx['pestania']['urnptxxx'][0]}}
        {{ $todoxxxx['pestania']['urnptxxx'][3]}} text-sm" href="
        {{ $todoxxxx['pestania']['urnptxxx'][2] }}">
          RANGO NPTS
        </a>
      </li>
      @endcanany
      
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($unidad))
        {{ $unidad }}
        @endif
        @if(isset($urango))
        {{ $urango }}
        @endif
        @if(isset($urnptxxx))
        {{ $urnptxxx }}
        @endif
        @if(isset($urnpt))
        {{ $urnpt }}
        @endif
      </div>
    </div>
  </div>
</div>