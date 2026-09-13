<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Sala;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('sala')->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $salas = Sala::all();
        return view('reservas.create', compact('salas'));
    }

    public function store(StoreReservaRequest $request)
{
    Reserva::create($request->validated());
    return redirect()->route('reservas.index');
}

    public function show(Reserva $reserva)
    {
        // Carga la reserva junto con la información de su sala
        $reserva->load('sala');
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        $salas = Sala::all();
        return view('reservas.edit', compact('reserva', 'salas'));
    }

   public function update(UpdateReservaRequest $request, Reserva $reserva)
{
    $reserva->update($request->validated());
    return redirect()->route('reservas.index');
}

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index');
    }
}
