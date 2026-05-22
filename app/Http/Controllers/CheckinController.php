<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckinRequest;
use App\Models\Checkin;
use App\Models\Cliente;
use App\Models\Parcela;
use App\Models\Tarifa;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parcela = Parcela::where('id_camping', getCampingUsuario())->get();
        $checkin = Checkin::whereIn('id_parcela', $parcela->pluck('id'))->orderBy('id', 'asc')->paginate(10);

        return view('checkin.index', compact('checkin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tarifa = Tarifa::orderBy('nombre', 'asc')->where('id_camping', getCampingUsuario())->get();
        $cliente = Cliente::orderBy('nombre', 'asc')->where('id_camping', getCampingUsuario())->get();
        $parcela = Parcela::orderBy('nombre', 'asc')->where('id_camping', getCampingUsuario())->get();

        return view('checkin.create', compact('tarifa', 'cliente', 'parcela'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CheckinRequest $request)
    {
        Checkin::create($request->validated());

        return redirect()->route('checkin.index')
            ->with('success', 'Checkin creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkin $checkin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkin $checkin)
    {
        $tarifa = Tarifa::orderBy('nombre', 'asc')->where('id_camping', getCampingUsuario())->get();
        $cliente = Cliente::orderBy('nombre', 'asc')->where('id_camping', getCampingUsuario())->get();
        $parcela = Parcela::orderBy('nombre', 'asc')->where('id_camping', getCampingUsuario())->get();

        return view('checkin.edit', compact('tarifa', 'cliente', 'parcela', 'checkin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CheckinRequest $request, Checkin $checkin)
    {
        $checkin->update($request->validated());

        return redirect()->route('checkin.index')
            ->with('success', 'Checkin actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkin $checkin)
    {
        $checkin->delete();
        return redirect()->route('checkin.index')
            ->with('success', 'Checkin borrado correctamente');
    }
}
