<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdiomaRequest;
use App\Models\Idiomas;
use Illuminate\Database\QueryException;

class IdiomasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idioma = Idiomas::orderBy('id', 'asc')->paginate(10);

        return view('idioma.index', compact('idioma'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('idioma.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdiomaRequest $request)
    {
        try {
            Idiomas::create($request->validated());

            return redirect()->route('idioma.index')
                ->with('success', 'Idioma creado correctamente');
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('idioma.index')
                ->with('error', 'Ha habido un error inesperado al crear el idioma');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Idiomas $idiomas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idiomas $idioma)
    {
        return view('idioma.edit', compact('idioma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdiomaRequest $request, Idiomas $idioma)
    {
        try {
            $idioma->update($request->validated());

            return redirect()->route('idioma.index')
                ->with('success', 'Idioma actualizado correctamente');
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('idioma.index')
                ->with('error', 'Ha habido un error inesperado al actualizar el idioma');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idiomas $idioma)
    {
        try {
            $idioma->delete();

            return redirect()->route('idioma.index')
                ->with('success', 'Idioma borrado correctamente');

        } catch (QueryException $e) {
            return back()->with('error-borrar', ['Usuarios']);
        }
    }
}
