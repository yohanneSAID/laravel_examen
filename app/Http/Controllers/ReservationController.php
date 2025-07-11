<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Reservation;
use App\Models\Chauffeur;
use App\Models\Administration;
use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['trajet', 'vehicule', 'chauffeur', 'administrations'])->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $trajets = Trajet::all();
        $vehicules = Vehicule::all();
        $chauffeurs = Chauffeur::all();
        $administrations = Administration::all();
        return view('reservations.create', compact('trajets', 'vehicules', 'chauffeurs', 'administrations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'trajet_id' => 'required|exists:trajets,id',
            'vehicule_id' => 'required|exists:vehicules,id',
            'chauffeur_id' => 'required|exists:chauffeurs,id',
            'statut' => 'required|string',
            'administrations' => 'array|nullable',
            'administrations.*' => 'exists:administrations,id',
        ]);

        $reservation = Reservation::create($request->except('administrations'));
        if ($request->has('administrations')) {
            $reservation->administrations()->sync($request->administrations);
        }

        return redirect()->route('reservations.index')->with('success', 'Réservation enregistrée avec succès.');
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $trajets = Trajet::all();
        $vehicules = Vehicule::all();
        $chauffeurs = Chauffeur::all();
        $administrations = Administration::all();
        return view('reservations.edit', compact('reservation', 'trajets', 'vehicules', 'chauffeurs', 'administrations'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'date' => 'required|date',
            'trajet_id' => 'required|exists:trajets,id',
            'vehicule_id' => 'required|exists:vehicules,id',
            'chauffeur_id' => 'required|exists:chauffeurs,id',
            'statut' => 'required|string',
            'administrations' => 'array|nullable',
            'administrations.*' => 'exists:administrations,id',
        ]);

        $reservation->update($request->except('administrations'));
        $reservation->administrations()->sync($request->administrations ?? []);
        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée.');
    }
}
