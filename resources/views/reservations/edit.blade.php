@extends('layouts.app')
@section('title', 'Modification réservation')
@section('jumb', 'Réservations')
@section('content')

<style>
    html,
    body {
        height: 100%;
        overflow-y: auto;
    }

    .form-wrapper {
        margin-top: 8.5px;
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
        padding: 0 15px;
    }


    .form-card {
        max-width: 500px;
        width: 100%;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    .form-card-header {
        background: linear-gradient(135deg, #781c32, #9b1d56);
        color: white;
        padding: 18.5px 28px;
    }

    .form-card-body {
        background-color: #fffdfc;
        padding: 28px;
        max-height: 60vh;
        overflow-y: auto;
    }

    .form-card-footer {
        background-color: #fff;
        padding: 18px;
        text-align: right;
        border-top: 1px solid #eee;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .btn-submit {
        background: linear-gradient(135deg, #8a1f41, #c42c6b);
        color: white;
        border: none;
        padding: 10px 24px;
        font-weight: 500;
        border-radius: 8px;
        transition: background 0.3s ease;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #a2254d, #dc3273);
    }

    .btn-cancel {
        background-color: #dc3545;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        margin-left: 10px;
        transition: background 0.3s ease;
    }

    .btn-cancel:hover {
        background-color: #c82333;
    }
</style>

<div class="container form-wrapper">
    <div class="card form-card">
        <div class="form-card-header">
            <h5 class="mb-0">Modifier la réservation</h5>
        </div>
        <div class="form-card-body">
            <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="date" class="form-label">Date de réservation</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $reservation->date) }}" required>
                </div>

                <div class="mb-3">
                    <label for="trajet_id" class="form-label">Trajet</label>
                    <select name="trajet_id" id="trajet_id" class="form-select" required>
                        <option value="">-- Choisir un trajet --</option>
                        @foreach($trajets as $trajet)
                        <option value="{{ $trajet->id }}" {{ old('trajet_id', $reservation->trajet_id) == $trajet->id ? 'selected' : '' }}>
                            {{ $trajet->destination }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="vehicule_id" class="form-label">Véhicule</label>
                    <select name="vehicule_id" id="vehicule_id" class="form-select" required>
                        <option value="">-- Choisir un véhicule --</option>
                        @foreach($vehicules as $vehicule)
                        <option value="{{ $vehicule->id }}" {{ old('vehicule_id', $reservation->vehicule_id) == $vehicule->id ? 'selected' : '' }}>
                            {{ $vehicule->immatriculation }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="chauffeur_id" class="form-label">Chauffeur</label>
                    <select name="chauffeur_id" id="chauffeur_id" class="form-select" required>
                        <option value="">-- Choisir un chauffeur --</option>
                        @foreach($chauffeurs as $chauffeur)
                        <option value="{{ $chauffeur->id }}" {{ old('chauffeur_id', $reservation->chauffeur_id) == $chauffeur->id ? 'selected' : '' }}>
                            {{ $chauffeur->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="statut" class="form-label">Statut</label>
                    <input type="text" name="statut" id="statut" class="form-control" value="{{ old('statut', $reservation->statut) }}" required>
                </div>

                <div class="mb-4">
                    <label for="administrations" class="form-label">Passagers</label>
                    <select name="administrations[]" id="administrations" class="form-select" multiple required>
                        @foreach($administrations as $admin)
                        <option value="{{ $admin->id }}"
                            {{ in_array($admin->id, old('administrations', $reservation->administrations->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $admin->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn-submit">Mettre à jour</button>
                    <a href="{{ route('reservations.index') }}" class="btn-cancel">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection