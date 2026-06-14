<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Camping;
use App\Models\Idiomas;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuario = Usuario::query()
            ->when($request->filled('usuario'), function ($query) use ($request) {
                $query->where('usuario', 'like', '%' . $request->usuario . '%');
            })
            ->when($request->filled('correo'), function ($query) use ($request) {
                $query->where('correo', 'like', '%' . $request->correo . '%');
            })
            ->when($request->filled('id_camping'), function ($query) use ($request) {
                $query->where('id_camping', $request->id_camping);
            })
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();
            
        $camping = Camping::orderBy('nombre', 'asc')->get();

        return view('usuario.index', compact('usuario', 'camping'));
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
        try {
            $data = $request->validated();

            Usuario::create($data);

            return redirect()->route('usuario.index')
                ->with('success', 'Usuario creada correctamente');
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('usuario.index')
                ->with('error', 'Ha habido un error inesperado al crear el usuario');
        }
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
        try {
            $data = $request->validated();

            // Si no cambia contraseña, no la tocamos
            if (empty($data['password'])) {
                unset($data['password']);
            }

            $usuario->update($data);

            return redirect()->route('usuario.index')
                ->with('success', 'Usuario actualizado correctamente');
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('usuario.index')
                ->with('error', 'Ha habido un error inesperado al actualizar el usuario');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();

            return redirect()->route('usuario.index')
                ->with('success', 'Usuario borrado correctamente');
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('usuario.index')
                ->with('error', 'Ha habido un error inesperado al eliminar el usuario');
        }
    }
}
