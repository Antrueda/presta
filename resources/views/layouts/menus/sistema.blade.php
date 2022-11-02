<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>
            Admin del sistema
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @canany(['roles-leer'])
            <li class="nav-item">
                <a href="{{ route('roles') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Roles</p>
                </a>
            </li>
        @endcanany
        @canany(['usuarios-leer'])
            <li class="nav-item">
                <a href="{{ route('usuarios') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Usuarioxs</p>
                </a>
            </li>
        @endcanany
        

    </ul>
</li>
