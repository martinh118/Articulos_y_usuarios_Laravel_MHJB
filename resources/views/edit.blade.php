<h1>EDITAR ARTICLE</h1>



<form action="{{route('dashboard.update', $articuloUnico->{'ID'})}}" method="POST">
    @csrf
    <label for="idArticle">Id Article</label>
    <input type="text" id="idArticle" name="idArt" disabled value="{{ $articuloUnico->{'ID'} }}">
    <br><br>
    <label for="">Contingut</label>
    <br><br>
    <textarea name="contentArt" id="content" cols="30" rows="10">{{ $articuloUnico->{'article'} }}</textarea>
    <br><br>

    <input type="submit" value="Editar">

</form>

<button href=""><a href="{{route('dashboard')}}">Cancelar</a></button>