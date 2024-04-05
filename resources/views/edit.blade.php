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


<form action="{{route('dashboard.update', $articuloUnico->{'ID'})}}" method="POST">
    @csrf
    <label for="idArticle">Id Article</label>
    <input type="text" id="idArticle" name="idArt" disabled value="{{ $articuloUnico->{'ID'} }}">
    <br><br>
    <label for="">Contingut</label>
    <br><br>
    <textarea name="contentArt" id="content" cols="30" rows="10">{{ $articuloUnico->{'article'} }}</textarea>
    <br><br>

    <input type="submit" value="Editar" onclick="confirmEdit({{ $articuloUnico->{'ID'} }})">

</form>
<form id="deleteForm{{ $articuloUnico->{'ID'} }}" action="{{ route('dashboard.destroy', $articuloUnico->{'ID'}) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
<button onclick="confirmDelete({{ $articuloUnico->{'ID'} }})">Eliminar</button>

<button href=""><a href="{{route('dashboard')}}">Cancelar</a></button>