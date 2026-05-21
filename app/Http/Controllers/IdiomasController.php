<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdiomaRequest;
use App\Models\Idiomas;

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
        Idiomas::create($request->validated());

        return redirect()->route('idioma.index')
            ->with('success', 'Idioma creado correctamente');
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
        $idioma->update($request->validated());

        return redirect()->route('idioma.index')
            ->with('success', 'Idioma actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idiomas $idioma)
    {
        $idioma->delete();
        return redirect()->route('idioma.index')
            ->with('success', 'Idioma borrado correctamente');
    }
}
