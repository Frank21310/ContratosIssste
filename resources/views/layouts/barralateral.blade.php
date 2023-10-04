<div class="wrapper">

    <nav id="sidebar" class="flex-column p-3" style="width: 280px;">
        <a href=""
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img class="fs-4" src="{{ asset('assets/img/logo_2_issste.png') }}" alt="Logo" width="120"
                height="auto">
        </a>
        <hr>
        @if (Auth::user()->rol_id == 1)
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="{{ 'home' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/home') }}" class="nav-link link-body-emphasis">
                        <i class="fas fa-user-tie"></i>
                        Inicio
                    </a>
                </li>
                <li class="{{ 'roles' == Request::is('role*') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}" class="nav-link link-body-emphasis">
                        <i class="fas fa-user-tie"></i>
                        Roles
                    </a>
                </li>

                <li class="{{ 'roles' == Request::is('role*') ? 'active' : '' }}">
                    <a href="{{ route('Empleados.index') }}" class="nav-link link-body-emphasis">
                        <i class="fas fa-user-tie"></i>
                        Empleados
                    </a>
                </li>
                <li>
                    <a href="{{ route('Usuarios.index') }}" class="nav-link link-body-emphasis">
                        <i class="fas fa-user"></i>
                        Usuarios
                    </a>
                </li>

            </ul>
        @endif
        @if (Auth::user()->rol_id == 2)
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="{{ 'home' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/home') }}" class="nav-link link-body-emphasis">
                        <i class="fas fa-home"></i>
                        Inicio
                    </a>
                </li>
                <li class="{{ 'Requesiciones' == Request::is('Requesiciones*') ? 'active' : '' }}">
                    <a href="{{ route('Requesiciones.index') }}" class="nav-link link-body-emphasis">
                        <i class="fas fa-plus"></i>
                        Requesiciones
                    </a>
                </li>

                <li class="{{ 'roles' == Request::is('role*') ? 'active' : '' }}">
                    <a href="{{ route('CUCop.index') }}" class="nav-link link-body-emphasis">
                        <i class="fas fa-file"></i>
                        CUCop
                    </a>
                </li>
            </ul>
        @endif

        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <strong>{{Auth::user()->empleado->nombre }}{{Auth::user()->empleado->apellido_paterno}}</strong>
            </a>
            <ul class="dropdown-menu text-small shadow">
                <li><a class="dropdown-item" href="{{ route('Empleados.show', Auth::user()->empleado->num_empleado) }}">Perfil</a></li>
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
    </nav>
</div>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
