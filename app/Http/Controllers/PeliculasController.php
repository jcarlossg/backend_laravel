<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peliculas;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas =  Peliculas::all();
        return   $peliculas;
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
        $peliculas = new Peliculas();
        $peliculas->id_usuario = $request->id_usuario;
        $peliculas->nombre_pelicula = $request->nombre_pelicula;
        $peliculas->year = $request->year;

        $peliculas->save();

        return response()->json([
            'message' => 'Pelicula Favorita agregada exitosamente',
            'user' => $peliculas
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peliculas = Peliculas::findOrFail($request->id);
        $peliculas->id_usuario = $request->id_usuario;
        $peliculas->nombre_pelicula = $request->nombre_pelicula;
        $peliculas->year = $request->year;

        $peliculas->save();

        return response()->json([
            'message' => 'Pelicula Favorita Editada exitosamente',
            'user' => $peliculas
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $peliculas =  Peliculas::destroy($request->id);
        return response()->json([
            'message' => 'Pelicula Favorita eliminada exitosamente',
            'user' => $peliculas
        ], 201);
    }
}
