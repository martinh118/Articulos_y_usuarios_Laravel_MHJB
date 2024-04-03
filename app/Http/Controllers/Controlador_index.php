<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controlador_index extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arts = DB::table('articles')->simplePaginate(5);
        return view('welcome', compact('arts'));
    }

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
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articuloUnico = DB::table('articles')->select('*')->where('ID', $id)->first();
        return view('edit', compact('articuloUnico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request)
    {
        $contenido = $request->contentArt;
        DB::table('articles')->where('ID', $id)->update(['article' => $contenido]);

        return redirect()->route('dashboard', $id)->with('success', '¡Artículo editado exitosamente!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
