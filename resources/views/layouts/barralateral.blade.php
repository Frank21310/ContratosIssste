<div class="wrapper">

    <div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <a class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
            <img class="fs-4" src="{{ asset('assets/img/logo_2_issste.png') }}" alt="Logo" width="170"
                height="auto">
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            @if (Auth::user()->rol_id == 1)
                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link  {{ 'home' == request()->path() ? 'active' : '' }}">
                        <i class="fas fa-user-tie"></i>
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}"
                        class="nav-link {{ 'roles' == request()->path() ? 'active' : '' }}">
                        <i class="fas fa-user-tie"></i>
                        Roles
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('Empleados.index') }}"
                        class="nav-link {{ 'Empleados' == request()->path() ? 'active' : '' }}">
                        <i class="fas fa-user-tie"></i>
                        Empleados
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Usuarios.index') }}"
                        class="nav-link {{ 'Usuarios' == request()->path() ? 'active' : '' }}">
                        <i class="fas fa-user"></i>
                        Usuarios
                    </a>
                </li>
            @endif
            @if (Auth::user()->rol_id == 2)
                <li class="nav-item">
                    <a href="{{ url('/home') }}"
                        class="nav-link {{ 'Peticiones' == request()->path() ? 'active' : '' }}">
                        <i class="fas fa-home bi me-2 "></i>
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Requesiciones.index') }}"
                        class="nav-link  {{ 'Requesiciones' == Request::is('Requesiciones*') ? 'active' : '' }}">
                        <i class="fas fa-plus bi me-2"></i>
                        Requisiciones
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('CUCop.index') }}"
                        class="nav-link {{ 'CUCop' == Request::is('CUCop*') ? 'active' : '' }}">
                        <i class="fas fa-file me-2"></i>
                        CUCop
                    </a>
                </li>
            @endif
            @if (Auth::user()->rol_id == 3)
                <li class="nav-item">
                    <a href="{{ url('/home') }}"
                        class="nav-link {{ 'Peticiones' == request()->path() ? 'active' : '' }}">
                        <i class="fas fa-home bi me-2 "></i>
                        Inicio
                    </a>
                </li>
                
                <li class="nav-item" >
                    <a href="#menurequisiciones" data-toggle="collapse" aria-expanded="true" class="nav-link" >
                        <i class="fas fa-file-alt"></i>
                        Requisiciones</a>
                    <ul class="collapse list-unstyled" id="menurequisiciones">
                        <li class="nav-item">
                            <a href="{{ route('SeguimientoRequisicion.index') }}"
                                class="nav-link {{ 'SeguimientoRequisicion' == request()->path() ? 'active' : '' }}">
                                <i class="fas fa-pen"></i>
                                Seguimiento
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('RequisicionesFinalizadas.index') }}"
                                class="nav-link {{ 'RequisicionesFinalizadas' == request()->path() ? 'active' : '' }}">
                                <i class="fas fa-check"></i>
                                Finalizadas
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Contratos.index')  }}"
                        class="nav-link {{ 'Contratos' == request()->path() ? 'active' : '' }}">
                        <i class="fas fa-home bi me-2 "></i>
                        Contratos
                    </a>
                </li>
                
            @endif
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <strong>{{ Auth::user()->empleado->nombre }} {{ Auth::user()->empleado->apellido_paterno }}</strong>
            </a>
            <ul class="dropdown-menu text-small shadow">
                <li><a class="dropdown-item"
                        href="{{ route('Empleados.show', Auth::user()->empleado->num_empleado) }}">Perfil</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    {{ __('Cerrar Sesion') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</div>
