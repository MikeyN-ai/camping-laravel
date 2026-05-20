<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Camping;
use App\Models\Idiomas;
use App\Models\Usuario;

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
    public function store(UsuarioRequest $request)
    {
        $data = $request->validated();

        $data['id_camping'] = auth()->user()->id_camping;

        Usuario::create($data);

        return redirect()->route('usuario.index')
            ->with('success', 'Usuario creada correctamente');
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
    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        $data = $request->validated();

        $data['id_camping'] = auth()->user()->id_camping;

        // Si no cambia contraseña, no la tocamos
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $usuario->update($data);

        return redirect()
            ->route('usuario.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
