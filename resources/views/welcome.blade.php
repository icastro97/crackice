<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crackice</title>
    @vite(['resources/css/app.css','resources/css/welcome.css' ,'resources/js/app.js','resources/js/welcome.js'])
</head>
<body>
    <div class="title">

        <center>
            <h1>CRACKICE</h1>
        </center>
        <img src="{{ asset('images/crackice.jpeg') }}" alt="Imagen de encabezado" class="header-image">
    </div>
    
    <div class="form-container">
        <h2 class="mb-4">Ingrese el código de 4 dígitos</h2>
        <div class="form-group">
            <input type="text" maxlength="1" class="form-control" id="input1">
            <input type="text" maxlength="1" class="form-control" id="input2">
            <input type="text" maxlength="1" class="form-control" id="input3">
            <input type="text" maxlength="1" class="form-control" id="input4">
        </div>
        <button id="verificarBtn">Verificar Código</button>
      </div>

</body>
</html>
