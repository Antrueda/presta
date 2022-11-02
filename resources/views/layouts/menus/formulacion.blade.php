<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>
            Formulación NPT
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @canany(['dmedico-leer'])
            <li class="nav-item">
                <a href="{{ route('formular') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Formulación</p>
                </a>
            </li>
        @endcanany
    </ul>
</li>
