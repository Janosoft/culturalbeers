<header>
    <nav class="navbar navbar-expand-lg bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cultural Beers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item d-lg-none">
                        <a href="{{ route('search') }}" class="nav-link {{ request()->routeIs('search') ? 'active' : '' }}">Buscar</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cervezas.index') }}" class="nav-link {{ request()->routeIs('cervezas.index') ? 'active' : '' }}">Cervezas</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cervezas_colores.index') }}" class="nav-link {{ request()->routeIs('cervezas_colores.*') ? 'active' : '' }}">Colores</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cervezas_envases_tipos.index') }}" class="nav-link {{ request()->routeIs('cervezas_envases_tipos.*') ? 'active' : '' }}">Envases</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cervezas_estilos.index') }}" class="nav-link {{ request()->routeIs('cervezas_estilos.*') ? 'active' : '' }}">Estilos</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cervezas_familias.index') }}" class="nav-link {{ request()->routeIs('cervezas_familias.*') ? 'active' : '' }}">Familias</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cervezas_fermentos.index') }}" class="nav-link {{ request()->routeIs('cervezas_fermentos.*') ? 'active' : '' }}">Fermentos</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('productores.index') }}" class="nav-link {{ request()->routeIs('productores.*') ? 'active' : '' }}">Productores</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Por Ubicación</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('continentes.index') }}" class="dropdown-item {{ request()->routeIs('continentes.*') ? 'active' : '' }}">Continentes</a>
                            </li>
                            <li>
                                <a href="{{ route('paises.index') }}" class="dropdown-item {{ request()->routeIs('paises.*') ? 'active' : '' }}">Paises</a>
                            </li>
                            <li>
                                <a href="{{ route('divisiones_politicas.index') }}" class="dropdown-item {{ request()->routeIs('divisiones_politicas.*') ? 'active' : '' }}">Divisiones Políticas</a>
                            </li>
                            <li>
                                <a href="{{ route('localidades.index') }}" class="dropdown-item {{ request()->routeIs('localidades.*') ? 'active' : '' }}">Localidades</a>
                            </li>
                            <li>
                                <a href="{{ route('lugares.index') }}" class="dropdown-item {{ request()->routeIs('lugares.*') ? 'active' : '' }}">Lugares</a>
                            </li>                            
                        </ul>                        
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Configuración</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('divisiones_politicas_tipos.index') }}"
                                    class="dropdown-item {{ request()->routeIs('divisiones_politicas_tipos.*') ? 'active' : '' }}">Tipos de Divisiones Políticas</a>
                            </li>
                            <li>
                                <a href="{{ route('productores_fabricaciones.index') }}" class="dropdown-item {{ request()->routeIs('productores_fabricaciones.*') ? 'active' : '' }}">Tipo de Fabricaciones</a>
                            </li>
                            <li>
                                <a href="{{ route('comentarios.index') }}" class="dropdown-item {{ request()->routeIs('comentarios.*') ? 'active' : '' }}">Comentarios para Autorizar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <form class="d-none d-lg-flex" role="search" action="{{ route('search') }}" method="GET">
                <input class="form-control me-2" type="search" name="search" required>
                <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </nav>
</header>
