@extends('layouts.app')
@section('title', 'Modification véhicule')
@section('jumb', 'Véhicules')
@section('content')

<style>
    html,
    body {
        height: 100%;
        overflow-y: auto;
    }

    .form-wrapper {
        margin-top: 60px;
        margin-bottom: 40px;
        display: flex;
        justify-content: center;
    }

    .form-card {
        max-width: 480px;
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .form-card-header {
        background: linear-gradient(135deg, #781c32, #9b1d56);
        color: white;
        padding: 20px;
    }

    .form-card-body {
        padding: 28px;
        background: #fffdfc;
    }

    .form-label {
        font-weight: 500;
    }

    .btn-submit {
        background: linear-gradient(135deg, #8a1f41, #c42c6b);
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 8px;
    }

    .btn-cancel {
        background-color: #dc3545;
        color: white;
        margin-left: 10px;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
    }
</style>

<div class="form-wrapper">
    <div class="card form-card">
        <div class="form-card-header">
            <h5 class="mb-0">Modifier le véhicule</h5>
        </div>
        <div class="form-card-body">
            <form action="{{ route('vehicules.update', $vehicule->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="immatriculation" class="form-label">Immatriculation</label>
                    <input type="text" name="immatriculation" id="immatriculation" class="form-control" value="{{ old('immatriculation', $vehicule->immatriculation) }}" required>
                </div>

                <div class="mb-3">
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" name="marque" id="marque" class="form-control" value="{{ old('marque', $vehicule->marque) }}" required>
                </div>

                <div class="mb-3">
                    <label for="modele" class="form-label">Modèle</label>
                    <input type="text" name="modele" id="modele" class="form-control" value="{{ old('modele', $vehicule->modele) }}" required>
                </div>

                <div class="mb-4">
                    <label for="statut" class="form-label">Statut</label>
                    <select name="statut" id="statut" class="form-control">
                        <option value="disponible" {{ old('statut', $vehicule->statut) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="en reparation" {{ old('statut', $vehicule->statut) == 'en reparation' ? 'selected' : '' }}>En réparation</option>
                        <option value="en mission" {{ old('statut', $vehicule->statut) == 'en mission' ? 'selected' : '' }}>En mission</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn-submit" type="submit">Enregistrer</button>
                    <a href="{{ route('vehicules.index') }}" class="btn-cancel">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection