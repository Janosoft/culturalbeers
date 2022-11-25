<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cultural Beers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cervezas.index') }}">Cervezas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cervezas_colores.index') }}">Colores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cervezas_envases_tipos.index') }}">Envases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cervezas_estilos.index') }}">Estilos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cervezas_familias.index') }}">Familias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cervezas_fermentos.index') }}">Fermentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('continentes.index') }}">Continentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('divisiones_politicas.index') }}">Divisiones Políticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('divisiones_politicas_tipos.index') }}">DP Tipo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('localidades.index') }}">Localidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('paises.index') }}">Paises</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('personas.index') }}">Personas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productores.index') }}">Productores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productores_fabricaciones.index') }}">Productores Fabricaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
