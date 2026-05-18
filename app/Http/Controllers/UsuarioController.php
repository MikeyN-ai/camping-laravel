<?php

namespace App\Http\Controllers;

use App\Models\Camping;
use App\Models\Usuario;
use App\Models\Idiomas;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Usuario::orderBy('id', 'asc')->paginate(10);

        return view('usuario.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $camping = Camping::orderBy('id', 'asc')->get();
        $idioma = Idiomas::orderBy('id', 'asc')->get();
        return view('usuario.create', compact('camping', 'idioma'));
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
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        $camping = Camping::orderBy('id', 'asc')->get();
        $idioma = Idiomas::orderBy('id', 'asc')->get();
        return view('usuario.edit', compact('usuario', 'camping', 'idioma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
