@extends('layouts.app')
@section('title', 'Détail du véhicule')

@section('content')
<style>
    .view-wrapper {
        margin-top: 60px;
        margin-bottom: 40px;
        display: flex;
        justify-content: center;
    }

    .view-card {
        max-width: 600px;
        width: 100%;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
    }

    .view-card-header {
        background: linear-gradient(135deg, #781c32, #9b1d56);
        color: white;
        padding: 20px 28px;
    }

    .view-card-body {
        background-color: #fffdfc;
        padding: 28px;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .form-control[readonly] {
        background-color: #f5f5f5;
        border: 1px solid #ccc;
    }

    .btn-retour {
        background: linear-gradient(135deg, #8a1f41, #c42c6b);
        color: white;
        font-weight: 500;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        transition: background 0.3s ease;
    }

    .btn-retour:hover {
        background: linear-gradient(135deg, #a2254d, #dc3273);
    }
</style>

<div class="container view-wrapper">
    <div class="card view-card">
        <div class="view-card-header">
            <h5 class="mb-0">Informations sur le véhicule</h5>
        </div>
        <div class="view-card-body">
            <form>
                <div class="mb-3">
                    <label for="immatriculation" class="form-label">Immatriculation</label>
                    <input type="text" id="immatriculation" class="form-control" value="{{ $vehicule->immatriculation }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" id="marque" class="form-control" value="{{ $vehicule->marque }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="modele" class="form-label">Modèle</label>
                    <input type="text" id="modele" class="form-control" value="{{ $vehicule->modele }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="statut" class="form-label">Statut</label>
                    <input type="text" id="statut" class="form-control" value="{{ $vehicule->statut }}" readonly>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('vehicules.index') }}" class="btn-retour">
                        <i class="fas fa-arrow-left me-2"></i>Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection