@extends('questions.partials.navbar')

@section('content')
@vite(['resources/js/pasarela/pay.js', 'resources/css/pasarela/pay.css'])
<center>

    <div class="payment-container">
        <h1>Pasarela de Pagos</h1>
        <form action="" id="form">
            <label for="nombre">Nombre en la Tarjeta:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="numero-tarjeta">Número de Tarjeta:</label>
            <input type="text" id="numero-tarjeta" name="numero-tarjeta" required>

            <label for="fecha-expiracion">Fecha de Expiración:</label>
            <input type="text" id="fecha-expiracion" name="fecha-expiracion" placeholder="MM/AA" required>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>

        <label for="monto">Monto a Pagar:</label>
        <input type="text" id="monto" name="monto" required>

        <button id="sendPayment">Pagar</button>
    </form>
</div>
</center>
@endsection
