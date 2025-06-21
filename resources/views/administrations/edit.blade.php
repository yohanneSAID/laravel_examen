@extends('layouts.app')
@section('title', 'Modification administration')
@section('jumb', 'Administrations')
@section('content')

<style>
    .form-wrapper {
        margin-top: 60px;
        margin-bottom: 40px;
        display: flex;
        justify-content: center;
    }

    .form-card {
        max-width: 440px;
        width: 100%;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
    }

    .form-card-header {
        background: linear-gradient(135deg, #781c32, #9b1d56);
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
        background-color: #6c757d;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        margin-left: 10px;
        transition: background 0.3s ease;
    }

    .btn-cancel:hover {
        background-color: #5a6268;
    }
</style>

<div class="container form-wrapper">
    <div class="card form-card">
        <div class="form-card-header">
            <h5 class="mb-0">Modifier l’administration</h5>
        </div>
        <div class="form-card-body">
            <form action="{{ route('administrations.update', $administration->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $administration->nom) }}" required>
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom', $administration->prenom) }}" required>
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact', $administration->contact) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $administration->email) }}" required>
                </div>

                <div class="mb-4">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $administration->adresse) }}" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-check me-2"></i>Mettre à jour
                    </button>
                    <a href="{{ route('administrations.index') }}" class="btn-cancel">
                        <i class="fas fa-times me-1"></i>Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection