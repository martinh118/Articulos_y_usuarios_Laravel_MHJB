<h1>EDITAR ARTICLE</h1>
<script>
    function confirmDelete(id) {
        if (confirm("¿Estás seguro de que quieres eliminar este artículo?")) {
            document.getElementById('deleteForm' + id).submit();
        }
    }

    function confirmEdit(id) {
        if (confirm("¿Estás seguro de que quieres editar este artículo?")) {
            document.submit();
        }
    }
</script>


<form action="{{route('dashboard.update', $articuloUnico->{'id'})}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="idArticle">Id Article</label>
    <input type="text" id="idArticle" name="idArt" disabled value="{{ $articuloUnico->{'id'} }}">
    <br><br>
    <label for="titolArt">Títol</label>
    <input type="text" id="titolArt" name="titolArt" value="{{ $articuloUnico->{'titulo'} }}">
    <br><br>
    <label for="">Contingut</label>
    <br><br>
    <textarea name="contentArt" id="content" cols="30" rows="10">{{ $articuloUnico->{'article'} }}</textarea>
    <br><br>
    <label for="image">Imagen:</label><br>
    <input type="file" id="image" name="image" accept="image/*">
    @error('image')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    <br><br>

    <input type="submit" value="Editar" onclick="confirmEdit({{ $articuloUnico->{'id'} }})">

</form>
<form id="deleteForm{{ $articuloUnico->{'id'} }}" action="{{ route('dashboard.destroy', $articuloUnico->{'id'}) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
<button onclick="confirmDelete({{ $articuloUnico->{'id'} }})">Eliminar</button>

<button href=""><a href="{{route('dashboard.log')}}">Cancelar</a></button>