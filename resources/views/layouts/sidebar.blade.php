<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-truck-pickup"></i>
                </div>
                
                <div class="sidebar-brand-text mx-3">Lear </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                    <a class="nav-link" href="/admin/">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Inicio</span></a>
            </li>
           
            <li class="nav-item">
                    <a class="nav-link" href="/admin/entradas">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Entradas</span></a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="/admin/salidas/">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Salidas</span></a>
            </li>
            @if(Auth::user()->nivel == ('admin'))
            <li class="nav-item">
                <a class="nav-link" href="/admin/usuarios">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Usuarios</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/productos">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Registro de material</span></a>
            </li>
            @endif
            <li class="nav-item">
                    <a class="nav-link" href="/admin/reportes/">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reportes</span></a>
            </li>
           
           
        </ul>