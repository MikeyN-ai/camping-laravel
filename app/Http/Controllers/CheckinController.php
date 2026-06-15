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
    public function index(Request $request)
    {
        $parcela = Parcela::where('id_camping', getCampingUsuario())->get();
        $cliente = Cliente::where('id_camping', getCampingUsuario())->orderBy('nombre', 'asc')->get();
        $tarifa = Tarifa::where('id_camping', getCampingUsuario())->orderBy('nombre', 'asc')->get();

        $checkin = Checkin::whereIn('id_parcela', $parcela->pluck('id'))
            ->when($request->filled('fecha_entrada') || $request->filled('fecha_salida'), function ($query) use ($request) {
                if ($request->filled('fecha_entrada') && $request->filled('fecha_salida')) {
                    // incluir solo checkins totalmente contenidos en el rango del filtro
                    $query->where('fecha_entrada', '>=', $request->fecha_entrada)
                          ->where('fecha_salida', '<=', $request->fecha_salida);
                } elseif ($request->filled('fecha_entrada')) {
                    $query->where('fecha_entrada', '>=', $request->fecha_entrada);
                } else {
                    $query->where('fecha_salida', '<=', $request->fecha_salida);
                }
            })
            ->when($request->filled('id_parcela'), function ($query) use ($request) {
                $query->where('id_parcela', $request->id_parcela);
            })
            ->when($request->filled('id_cliente'), function ($query) use ($request) {
                $query->where('id_cliente', $request->id_cliente);
            })
            ->when($request->filled('id_tarifa'), function ($query) use ($request) {
                $query->where('id_tarifa', $request->id_tarifa);
            })
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('checkin.index', compact('checkin', 'parcela', 'cliente', 'tarifa'));
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
        try {
            Checkin::create($request->validated());

            return redirect()->route('checkin.index')
                ->with('success', 'Checkin creado correctamente');
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('checkin.index')
                ->with('error', 'Ha habido un error inesperado al crear el checkin');
        }
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
        try {
            $checkin->update($request->validated());

            return redirect()->route('checkin.index')
                ->with('success', 'Checkin actualizado correctamente');
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('checkin.index')
                ->with('error', 'Ha habido un error inesperado al actualizar el checkin');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkin $checkin)
    {
        try {
            $checkin->delete();

            return redirect()->route('checkin.index')
                ->with('success', 'Checkin borrado correctamente');

        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('checkin.index')
                ->with('error', 'Ha habido un error inesperado al eliminar el checkin');
        }
    }
}
