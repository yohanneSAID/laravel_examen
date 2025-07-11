@extends('layouts.app')
@section('title', 'Détails administration')
@section('jumb', 'Administrations')
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
        max-width: 500px;
        background-color: #fffdfc;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .info-card h4 {
        margin-bottom: 24px;
        font-weight: 600;
        color: #781c32;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
    }

    .info-line {
        display: flex;
        justify-content: space-between;
        margin-bottom: 14px;
        font-size: 0.95rem;
    }

    .info-label {
        font-weight: 500;
        color: #444;
    }

    .info-value {
        color: #555;
        text-align: right;
    }

    .btn-return {
        margin-top: 20px;
    }
</style>

<div class="container">
    <div class="info-card">
        <h4>Informations sur l’administration</h4>

        <div class="info-line">
            <div class="info-label">Nom :</div>
            <div class="info-value">{{ $administration->nom }}</div>
        </div>

        <div class="info-line">
            <div class="info-label">Prénom :</div>
            <div class="info-value">{{ $administration->prenom }}</div>
        </div>

        <div class="info-line">
            <div class="info-label">Contact :</div>
            <div class="info-value">{{ $administration->contact }}</div>
        </div>

        <div class="info-line">
            <div class="info-label">Email :</div>
            <div class="info-value">{{ $administration->email }}</div>
        </div>

        <div class="info-line">
            <div class="info-label">Adresse :</div>
            <div class="info-value">{{ $administration->adresse }}</div>
        </div>

        <div class="d-flex justify-content-end btn-return">
            <a href="{{ route('administrations.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Retour
            </a>
        </div>
    </div>
</div>
@endsection