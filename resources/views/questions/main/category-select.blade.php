@extends('questions.partials.navbar')

@section('content')
    @vite(['resources/js/questions/categories.js', 'resources/css/questions/categories.css'])

    @if (Cart::count() >= 2)
    <div class="container mt-5">
        <div class="text-center">
          <h2>Categorías</h2>
          <br>
          <div class="btn-group-vertical" id="categoryButtons">
            @foreach ($categorias as $categoria)
            <button type="button" class="btn btn-outline-primary rounded-pill mb-4 btn-block" data-category-id="{{ $categoria->id }}">{{ $categoria->name }}</button>        @endforeach
          </div>
        </div>
      </div>
    @else
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <strong>Atencion!</strong> Debes comprar minimo 2 productos para poder jugar!
        </div>
    </div>
    @endif

@endsection
