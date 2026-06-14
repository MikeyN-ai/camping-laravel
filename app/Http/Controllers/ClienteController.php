<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cliente = Cliente::where('id_camping', getCampingUsuario())
            ->when($request->filled('nombre'), function ($query) use ($request) {
                $query->where('nombre', 'like', '%' . $request->nombre . '%');
            })
            ->when($request->filled('correo'), function ($query) use ($request) {
                $query->where('correo', 'like', '%' . $request->correo . '%');
            })
            ->when($request->filled('nif'), function ($query) use ($request) {
                $query->where('nif', 'like', '%' . $request->nif . '%');
            })
            ->when($request->filled('telefono'), function ($query) use ($request) {
                $query->where('telefono', 'like', '%' . $request->telefono . '%');
            })
            ->when($request->filled('matricula'), function ($query) use ($request) {
                $query->where('matricula', 'like', '%' . $request->matricula . '%');
            })
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('cliente.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        try {
            $data = $request->validated();

            $data['id_camping'] = auth()->user()->id_camping;

            Cliente::create($data);

            return redirect()->route('cliente.index')
                ->with('success', 'Cliente creado correctamente');
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('cliente.index')
                ->with('error', 'Ha habido un error inesperado al crear el cliente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        try {
            $data = $request->validated();

            $data['id_camping'] = auth()->user()->id_camping;

            $cliente->update($data);

            return redirect()->route('cliente.index')
                ->with('success', 'Cliente actualizado correctamente');
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('cliente.index')
                ->with('error', 'Ha habido un error inesperado al actualizar el cliente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();

            return redirect()->route('cliente.index')
                ->with('success', 'Cliente borrado correctamente');
        } catch (QueryException $e) {
            return back()->with('error-borrar', ['Checkins']);
        }
    }
}
