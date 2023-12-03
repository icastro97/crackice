@extends('layouts.appDashboard')

@section('contenido')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product-add') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nombre Producto</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Precio Producto</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Imagen Producto</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
            </div>
          </div>
        </div>
      </div>

    <div class="container">
        <h1>Lista de Productos</h1>
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addProduct">Agregar Producto</button>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">$ {{ number_format($product->price) }}</p>
                            <form action="{{ route('product-delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-danger">Borrar</a>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $products->links() }} {{-- Muestra la paginación --}}
@endsection
