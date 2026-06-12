<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampingRequest;
use Illuminate\Http\Request;
use App\Models\Camping;
use Illuminate\Database\QueryException;

class CampingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $camping = Camping::query()
            ->when($request->filled('nombre'), function ($query) use ($request) {
                $query->where('nombre', 'like', '%' . $request->nombre . '%');
            })
            ->when($request->filled('telefono_contacto'), function ($query) use ($request) {
                $query->where('telefono_contacto', 'like', '%' . $request->telefono_contacto. '%');
            })
            ->when($request->filled('correo_contacto'), function ($query) use ($request) {
                $query->where('correo_contacto', 'like', '%' . $request->correo_contacto . '%');
            })
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('camping.index', compact('camping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('camping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampingRequest $request)
    {
        try {
            Camping::create($request->validated());

            return redirect()->route('camping.index')
                ->with('success', 'Camping creado correctamente');

        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('camping.index')
                ->with('error', 'Ha habido un error inesperado al crear el camping');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Camping $camping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Camping $camping)
    {
        return view('camping.edit', compact('camping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CampingRequest $request, Camping $camping)
    {
        try {
            $camping->update($request->validated());

            return redirect()->route('camping.index')
                ->with('success', 'Camping actualizado correctamente');

        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('camping.index')
                ->with('error', 'Ha habido un error inesperado al actualizar el camping');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camping $camping)
    {
        try {
            $camping->delete();

            return redirect()->route('camping.index')
                ->with('success', 'Camping borrado correctamente');

        } catch (QueryException $e) {
            return back()->with('error-borrar', ['Tarifas', 'Usuarios', 'Clientes', 'Parcelas', 'Checkins (indirecto)']);
        }
    }
}
