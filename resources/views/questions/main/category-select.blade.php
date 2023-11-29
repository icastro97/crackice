@extends('questions.partials.navbar')

@section('content')
    @vite(['resources/js/questions/categories.js', 'resources/css/questions/categories.css'])

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
@endsection
