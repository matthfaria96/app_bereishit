<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- ===== meta ======-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  user-scalable=no">

    <!-- ===== css ======-->
    <link rel="stylesheet" type="text/css" href="{{ url('www/assets/css/bootstrap.min.css') }}">

    <script type="text/javascript" src="{{ url('www/assets/js/jquery-3.6.0.min.js') }}"></script>



</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Gerenciamento de cadastro</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><strong>Dasboard</strong></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Gerenciamento
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalStore">Gerenciar livros</a></li>
                      <li><a class="dropdown-item" href="#">Gerenciar capítulos</a></li>
                      <li><a class="dropdown-item" href="#">Gerenciar versículos</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- ===== js ======-->
    <script type="text/javascript" src="{{ url('www/assets/js/bootstrap.min.js?v=') }}{{ 'noCacheVersion-' . date('Ymdh') }}"></script>
    <script type="text/javascript" src="{{ url('www/assets/js/Core/appAjax.js?v=') }}{{ 'noCacheVersion-' . date('Ymdh') }}"></script>

    @yield('scripts')
</body>
</html>
