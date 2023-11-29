<form action="{{ url('/import') }}" method="POST" enctype="multipart/form-data">
    @csrf
<input type="file" name="file">
<button type="submit">Enviar</button>
</form>
