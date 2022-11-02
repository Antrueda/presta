 <li class="nav-item has-treeview">
     <a href="#" class="nav-link">
         <i class="nav-icon fas fa-tools"></i>
         <p>
             Configuración Datos
             <i class="fas fa-angle-left right"></i>
         </p>
     </a>
     <ul class="nav nav-treeview">
         @can('servicio-leer')
         <li class="nav-item">
             <a href="{{ route('servicio') }}" class="nav-link">
                 <i class="fas fa-door-open nav-icon"></i>
                 <p>Servicios</p>
             </a>
         </li>
         @endcan
         @can('rango-leer')
         <li class="nav-item">
             <a href="{{ route('rango') }}" class="nav-link">
                 <i class="fas fa-door-open nav-icon"></i>
                 <p>Rangos</p>
             </a>
         </li>
         @endcan

         @can('cservicio-leer')
         <li class="nav-item">
             <a href="{{ route('cservicio') }}" class="nav-link">
                 <i class="fas fa-door-open nav-icon"></i>
                 <p>Servicios</p>
             </a>
         </li>
         @endcan
         @can('eps-leer')
         <li class="nav-item">
             <a href="{{ route('eps') }}" class="nav-link">
                 <i class="fas fa-door-open nav-icon"></i>
                 <p>Eps</p>
             </a>
         </li>
         @endcan
         @can('clinicax-leer')
         <li class="nav-item">
             <a href="{{ route('clinicax') }}" class="nav-link">
                 <i class="fas fa-door-open nav-icon"></i>
                 <p>Clinicas</p>
             </a>
         </li>
         @endcan
     </ul>
 </li>
