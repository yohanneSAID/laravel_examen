@extends('layouts.app')

@section('content')
<style>
    .form-wrapper {
        margin-top: 60px;
        margin-bottom: 40px;
        display: flex;
        justify-content: center;
    }

    .form-card {
        width: 100%;
        max-width: 600px;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
    }

    .form-card-header {
        background: linear-gradient(135deg, #781c32, #9b1d56);
        /* dégradé grenat foncé */
        color: white;
        padding: 20px 28px;
    }

    .form-card-body {
        background-color: #fffdfc;
        padding: 28px;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .btn-submit {
        background: linear-gradient(135deg, #8a1f41, #c42c6b);
        /* grenat plus vif */
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
</style>

<div class="container form-wrapper">
    <div class="card form-card">
        <div class="form-card-header">
            <h5 class="mb-0">Ajouter un nouveau véhicule</h5>
        </div>
        <div class="form-card-body">
            <form action="{{ route('vehicules.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="immatriculation" class="form-label">Immatriculation</label>
                    <input type="text" name="immatriculation" id="immatriculation" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" name="marque" id="marque" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="modele" class="form-label">Modèle</label>
                    <input type="text" name="modele" id="modele" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label for="statut" class="form-label">Statut</label>
                    <select name="statut" id="statut" class="form-select" required>
                        <option value="disponible">Disponible</option>
                        <option value="en reparation">En réparation</option>
                        <option value="en mission">En mission</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-plus me-2"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection