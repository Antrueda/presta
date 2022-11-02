<ul class="navbar-nav ml-auto">
        @guest
            <li class="nav-item px-2">
                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
            </li>
        @else
            <li class="nav-item dropdown px-2">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Salir
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
  <!-- Messages Dropdown Menu -->
  {{-- @include('layouts.nav-bar.right.messages.index') --}}
  <!-- End Messages Dropdown Menu -->
  @auth
  <!-- Notifications Dropdown Menu -->
  @include('layouts.nav-bar.right.notifications')
  <!-- Notifications Dropdown Menu -->
  @endauth
  <!-- Controls -->
  {{-- <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
      <i class="fas fa-th-large"></i>
    </a>
  </li> --}}
  <!-- End Controls -->
</ul>
