<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controlador_index extends Controller
{

    //Obtener los articulos para mostrarlos en la pagina de anonimo.
    public function index()
    {
        $arts = DB::table('articles')->simplePaginate(5);
        return view('welcome', compact('arts'));
    }

    //Obtener los articulos para mostrarlos en la pagina de usuario.
    public function indexLogged()
    {
        $arts = DB::table('articles')->simplePaginate(5);
        return view('dashboard', compact('arts'));
    }

    //Obtener los articulos propios para mostrarlos en la pagina de usuario.
    public function ownArticles($usuario)
    {  
        $arts = DB::table('articles')->select('*')->where('autor', $usuario)->simplePaginate(5);
        return view('articlesUser', compact('arts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }


    /**
     * Realiza el insert a la base de datos del nuevo articulo.
     */
    public function crearArticulo(Request $request, $usuario)
    {
        $contenido = $request->contentArt;
        $id = $request->idArt;
        $titol = $request->titolArt;

        if ($request->hasFile('image')) {
            $imagePost = 'IMAGE-POST' . time() . $request->file('image')->getClientOriginalName();
            // ec
            $filee = $request->image;
            $fileName = $filee->getClientOriginalName();
            $filee->move('public/images', $fileName);
            $image = $fileName;

            DB::table('articles')->insert([
                'id' => $id,
                'titulo' => $titol,
                'article' => $contenido . $request->image,
                'autor' => $usuario,
                'src' => 'images/' . $image
            ]);
        } else {
            DB::table('articles')->insert([
                'id' => $id,
                'titulo' => $titol,
                'article' => $contenido,
                'autor' => $usuario, // Obtener el nombre del usuario autenticado
                'src' => 'images/claqueta_accion.png'
            ]);
        }
        return redirect()->route('dashboard.log')->with('success', '¡Artículo creado correctamente!');
    }

    /**
     * Muestra el formulario para crear un articulo.
     */
    public function showCreate()
    {
        $lastId = DB::table('articles')->select('*')->orderBy('id', 'DESC')->first();
        if ($lastId == null) {
            $newId = 1;
        } else {
            $newId = $lastId->id + 1;
        }
        return view('showCreate', compact('newId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $id;
    }

    /**
     * Mostrar datos del articulo seleccionado en la pagina de edicion del articulo.
     */
    public function edit(string $id)
    {
        $articuloUnico = DB::table('articles')->select('*')->where('id', $id)->first();
        return view('edit', compact('articuloUnico'));
    }

    /**
     * Editar articulo seleccionado.
     */
    public function update(string $id, Request $request)
    {
        $contenido = $request->contentArt;
        $titol = $request->titolArt;


        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048' // Validar que se suba una imagen válida y con un tamaño máximo de 2MB
                // Resto de las validaciones
            ]);
            $imagen = $request->file('image');

            $nombreImagen = $imagen->getClientOriginalName();
            $imagen->storeAs('images', $nombreImagen, 'public');
            DB::table('articles')->where('id', $id)->update([
                'titulo' => $titol,
                'article' => $contenido,
                'src' => 'images/' . $nombreImagen
            ]);
        } else {
            DB::table('articles')->where('id', $id)->update([
                'titulo' => $titol,
                'article' => $contenido
            ]);
        }


        return redirect()->route('dashboard.log', $id)->with('success', '¡Artículo editado exitosamente!');
    }

    //Eliminar articulo.
    public function destroy($id)
    {
        DB::table('articles')->where('id', $id)->delete();
        return redirect()->route('dashboard.log')->with('success', '¡Artículo eliminado correctamente!');
    }
}
