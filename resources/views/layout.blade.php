<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plantas Medicinales</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <script src="{{asset('js/previsualizar.js')}}"></script>
</head>
<body>
    <main class='animated fadeIn slow'>

        <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('inicio')}}">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="{{route('vista.plantas')}}">Listado Plantas</a>
                        <a class="nav-link" href="{{route('vista.alta')}}">Alta nueva Planta</a>
                    </div>
                </div>
            </div>
        </nav>
        <h6 class='text-rigth' style="color:grey" >{{$pagina?? null}}</h6>
        <hr>
        <section id='contenido'>
           @yield('contenido')
        </section>
        <hr>
        <footer>
            <p>&copy; Poppy's Apothecary - 2024</p>
        </footer>
    </main>
</body>
</html>

