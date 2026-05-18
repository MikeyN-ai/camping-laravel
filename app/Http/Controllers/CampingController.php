<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampingRequest;
use App\Models\Camping;

class CampingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $camping = Camping::orderBy('id', 'asc')->paginate(10);

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
        Camping::create($request->validated());

        return redirect()->route('camping.index')
            ->with('success', 'Camping creado correctamente');
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
        $camping->update($request->validated());

        return redirect()->route('camping.index')
            ->with('success', 'Camping actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camping $camping)
    {
        //
    }
}
