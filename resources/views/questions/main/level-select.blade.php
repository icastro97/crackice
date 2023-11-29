@extends('questions.partials.navbar')

@section('content')
    @vite(['resources/js/questions/levels.js', 'resources/css/questions/levels.css'])

    <div class="container mt-5">
        <div class="text-center">
          <h2>Niveles</h2>
          <br>
          <div class="btn-group-vertical" id="categoryButtons">
            @foreach ($levels as $level)
                <button type="button" class="btn btn-outline-primary rounded-pill mb-4 btn-block" data-level-id="{{ $level->level }}">{{ $level->level }}</button>
            @endforeach
          </div>
        </div>
      </div>
@endsection
