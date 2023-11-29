@extends('questions.partials.navbar')

@section('content')
    @vite(['resources/js/questions/questions.js', 'resources/css/questions/questions.css'])

        @foreach ($preguntas as $pregunta)
        <div class="form-section">
            <center>
                <br>
                <br>
                <br>
                <br>
                <h2>{{ $pregunta->question }}</h2>
            </center>
        </div>
        @endforeach
        <br>
        <br>
        <br>
        <center>
            <div class="form-navigation mt-3">
                <button type="button" class="previous btn btn-primary float-left">&lt; Anterior</button>
                <button type="button" class="next btn btn-primary float-right">Siguiente &gt;</button>
                <button type="button" class="btn btn-danger float-center reto">Reto</button>
                <button type="submit" class="btn btn-success float-right end">Finalizar</button>
            </div>
        </center>
@endsection
