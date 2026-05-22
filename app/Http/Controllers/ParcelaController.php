<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParcelaRequest;
use App\Models\Checkin;
use App\Models\Parcela;

class ParcelaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parcela = Parcela::where('id_camping', getCampingUsuario())->orderBy('id', 'asc')->paginate(10);

        return view('parcela.index', compact('parcela'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parcela.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParcelaRequest $request)
    {
        $data = $request->validated();

        $data['id_camping'] = auth()->user()->id_camping;

        $data['shelly_on'] = $request->has('shelly_on');

        Parcela::create($data);

        return redirect()->route('parcela.index')
            ->with('success', 'Parcela creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parcela $parcela)
    {
        $checkin = Checkin::where('id_parcela', $parcela->id)->orderBy('id', 'asc')->paginate(10);

        return view('parcela.show', compact('parcela', 'checkin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parcela $parcela)
    {
        return view('parcela.edit', compact('parcela'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ParcelaRequest $request, Parcela $parcela)
    {
        $data = $request->validated();

        $data['id_camping'] = auth()->user()->id_camping;

        $data['shelly_on'] = $request->has('shelly_on');

        $parcela->update($data);

        return redirect()
            ->route('parcela.index')
            ->with('success', 'Parcela actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parcela $parcela)
    {
        $parcela->delete();
        return redirect()->route('parcela.index')
            ->with('success', 'Parcela borrada correctamente');
    }

    public function toggle(Parcela $parcela)
    {
        $parcela->shelly_on = ! $parcela->shelly_on;
        $parcela->save();

        return back()->with('success', 'Estado actualizado correctamente');
    }
}
