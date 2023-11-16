<nav id="Topbar" class="navbar  navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        @guest
            <a class="navbar-brand" href="#">
                <img src="https://framework-gb.cdn.gob.mx/landing/img/logoheader.svg" alt="Logo" width="120"
                    height="auto" class="d-inline-block align-text-top">
            </a>
        @else
            <a class="navbar-brand text-white" class="nav-link" href="#" id="sidebarCollapse">
                <i class="fas fa-align-left"></i>
            </a>
            <a class="navbar-brand" href="#">
                <img src="https://framework-gb.cdn.gob.mx/landing/img/logoheader.svg" alt="Logo" width="120"
                    height="auto" class="d-inline-block align-text-top">
            </a>
        @endguest
        <ul class="nav justify-content-end">
            @guest
                <li class="nav-item">
                    <a class="nav-link fw-bold text-white " aria-current="page" href="{{ route('login') }}">Iniciar Sesion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-white " aria-current="page" href="{{ route('Registro') }}">Registrarse</a>
                </li>
            @else
            @endguest
            <ul class="navbar-nav ml-auto">
                <ul class="navbar-nav ms-auto">
                    @guest
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    </li>
                </ul>
            </ul>
        </ul>
    </div>
</nav>
