

<h1>EDITAR ARTICLE</h1>

<form action="">

    <label for="idArticle">Id Article</label>
    <input type="text" id="idArticle" disabled value="{{ $articuloUnico->{'ID'} }}">
    <br><br>
    <label for="">Contingut</label>
    <br><br>
    <textarea name="" id="" cols="30" rows="10" value="">{{ $articuloUnico->{'article'} }}</textarea>
    <br><br>

    <button>Guardar</button><br><br>
    <button href="">Cancelar</button>

</form>