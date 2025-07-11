@extends('layouts.app')
@section('title', 'Détails réservation')
@section('jumb', 'Réservations')
@section('content')

<style>
    html,
    body {
        height: 100%;
        overflow-y: auto;
    }

    .info-card {
        margin: 80px auto;
        padding: 24px;
        max-width: 560px;
        background-color: #fffdfc;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .info-title {
        border-bottom: 2px solid #eee;
        margin-bottom: 24px;
        padding-bottom: 10px;
        font-weight: 600;
        color: #781c32;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
    }

    .info-label {
        font-weight: 500;
    }

    .btn-return {
        margin-top: 24px;
        display: flex;
        justify-content: flex-end;
    }
</style>

<div class="container">
    <div class="info-card">
        <div class="info-title">Détails de la réservation</div>

        <div class="info-row"><span class="info-label">Date :</span><span>{{ $reservation->date }}</span></div>
        <div class="info-row"><span class="info-label">Trajet :</span><span>{{ $reservation->trajet->destination }}</span></div>
        <div class="info-row"><span class="info-label">Véhicule :</span><span>{{ $reservation->vehicule->immatriculation }}</span></div>
        <div class="info-row"><span class="info-label">Chauffeur :</span><span>{{ $reservation->chauffeur->nom }}</span></div>
        <div class="info-row"><span class="info-label">Statut :</span><span>{{ $reservation->statut }}</span></div>
        <div class="info-row">
            <span class="info-label">Passagers :</span>
            <span>
                @if($reservation->administrations->isNotEmpty())
                {{ $reservation->administrations->pluck('nom')->join(', ') }}
                @else
                <em>Aucun passager</em>
                @endif
            </span>
        </div>


        <div class="btn-return">
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Retour
            </a>
        </div>
    </div>
</div>
@endsection