<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>
            Pacientes
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @canany(['paciente-leer'])
            <li class="nav-item">
                <a href="{{ route('paciente') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Listar Pacientes</p>
                </a>
            </li>
        @endcanany
         </ul>
</li>
