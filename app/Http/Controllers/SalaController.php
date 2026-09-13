<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSalaRequest;
use App\Http\Requests\UpdateSalaRequest;

class SalaController extends Controller
{
    public function index()
    {
        $salas = Sala::all();
        return view('salas.index', compact('salas'));
    }

    public function create()
    {
        return view('salas.create');
    }

   public function store(StoreSalaRequest $request)
{
    Sala::create($request->validated());
    return redirect()->route('salas.index');
}


    public function show(Sala $sala)
    {
        // Carga la sala junto con todas las reservas asignadas a ella
        $sala->load('reservas');
        return view('salas.show', compact('sala'));
    }

    public function edit(Sala $sala)
    {
        return view('salas.edit', compact('sala'));
    }

    public function update(UpdateSalaRequest $request, Sala $sala)
{
    $sala->update($request->validated());
    return redirect()->route('salas.index');
}

    public function destroy(Sala $sala)
    {
        $sala->delete();

        return redirect()->route('salas.index');
    }
}
