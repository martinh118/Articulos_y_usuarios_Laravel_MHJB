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
        DB::table('articles')->insert([
            'id' => $id,
            'article' => $contenido,
            'autor' => $usuario
        ]);
        return redirect()->route('dashboard.log')->with('success', '¡Artículo creado correctamente!');
    }

    /**
     * Muestra el formulario para crear un articulo.
     */
    public function showCreate()
    {
        $lastId = DB::table('articles')->select('*')->orderBy('id', 'DESC')->first();
        if($lastId == null){
            $newId = 1;
        }else {$newId = $lastId->id + 1;}
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
        DB::table('articles')->where('id', $id)->update(['article' => $contenido]);

        return redirect()->route('dashboard.log', $id)->with('success', '¡Artículo editado exitosamente!');

    }

    //Eliminar articulo.
    public function destroy($id) {
        DB::table('articles')->where('id', $id)->delete();
        return redirect()->route('dashboard.log')->with('success', '¡Artículo eliminado correctamente!');
    }

}