<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>
            Reportes
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @canany(['reportes-modulo'])
            <li class="nav-item">
                <a href="{{ route('reportes') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Reportes</p>
                </a>
            </li>
        @endcanany
        @canany(['excelxxx-moduloxx'])
            <li class="nav-item">
                <a href="{{ route('excelxxx') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Excel</p>
                </a>
            </li>
        @endcanany

    </ul>
</li>
