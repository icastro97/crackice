<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crackice</title>
    @vite(['resources/sass/app.scss' ,'resources/js/app.js'])
</head>
<style>
  body{
    background-color: #BFF9FF;
  }
</style>
<body>

    <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/questions/index">
            <img src="{{ asset('images/crackice.jpeg') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Crackice
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="btn btn-outline-success me-2" aria-current="page" href="#" id="openPopup" data-bs-toggle="modal" data-bs-target="#exampleModal">Tienda</a>
            </li>

              <li class="nav-item d-flex">
                <a class="nav-link"href="{{route('cart.checkout')}}">Ver Carrito <span class="badge badge-danger">{{Cart::count()}}</span></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


    </div>

  <div class="container">
    @yield('content')
  </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tienda</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-3" id="products-container">

                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>

</body>
</html>
