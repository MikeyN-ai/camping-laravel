<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarifaRequest;
use App\Models\Tarifa;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarifa = Tarifa::where('id_camping', getCampingUsuario())->orderBy('id', 'asc')->paginate(10);

        return view('tarifa.index', compact('tarifa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarifa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TarifaRequest $request)
    {
        $data = $request->validated();

        $data['id_camping'] = auth()->user()->id_camping;

        Tarifa::create($data);

        return redirect()->route('tarifa.index')
            ->with('success', 'Tarifa creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarifa $tarifa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarifa $tarifa)
    {
        return view('tarifa.edit', compact('tarifa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TarifaRequest $request, Tarifa $tarifa)
    {
        $data = $request->validated();

        $data['id_camping'] = auth()->user()->id_camping;

        $tarifa->update($data);

        return redirect()->route('tarifa.index')
            ->with('success', 'Tarifa actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarifa $tarifa)
    {
        $tarifa->delete();
        return redirect()->route('tarifa.index')
            ->with('success', 'Tarifa borrada correctamente');
    }
}
