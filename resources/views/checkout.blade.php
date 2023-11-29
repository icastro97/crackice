@extends('questions.partials.navbar')

@section('content')
<br>
<br>
<br>
<div class="container">
    <div class="row">
       <div class="col-sm-12 bg-light">
           @if (count(Cart::content()))
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>Elimnar</th>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>${{number_format($item->price)}}</td>
                            <td>{{$item->qty}}</td>
                            <td>
                                <form action="{{route('cart.removeitem')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->rowId}}">
                                    <button type="submit" class="btn btn-light btn-sm text-danger">x</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td><strong>${{ number_format(Cart::total()) }}</strong></td>
                    </tr>
                </tfoot>
            </table>
            <br>

            <a href="/pay" class="btn btn-success">Finalizar Compra</a>

            @else
                <p>Carrito vacio</p>
           @endif

       </div>

    </div>
</div>
@endsection
