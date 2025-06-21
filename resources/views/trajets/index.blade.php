@extends('layouts.app')
@section('jumb', 'trajets')
@section('content')

<style>
    .orders-card {
        margin-top: 80px;
        padding: 20px;
    }

    footer {
        height: 60px;
        padding: 10px;
        font-size: 0.85em;
    }

    .orders-table th,
    .orders-table td {
        vertical-align: middle;
    }

    .action-btn i {
        pointer-events: none;
    }
</style>

<div class="orders-card container">
    <div class="orders-header d-flex justify-content-between align-items-center mb-4">
        <h2 class="orders-title">Liste générale des trajets</h2>
        <a href="{{ route('trajets.create') }}">
            <button class="add-order-btn btn btn-success">
                <i class="fas fa-plus"></i> Ajouter un trajet
            </button>
        </a>
    </div>

    <table class="orders-table">
        <thead class="thead-light">
            <tr>
                <th>ID Trajet</th>
                <th>Départ</th>
                <th>Destination</th>
                <th>Durée estimée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trajets as $trajet)
            <tr>
                <td>{{ $trajet->id }}</td>
                <td>{{ $trajet->depart }}</td>
                <td>{{ $trajet->destination }}</td>
                <td>{{ $trajet->duree_estimee }}</td>
                <td class="d-flex justify-content-between">
                    <a href="{{ route('trajets.show', $trajet->id) }}" class="btn btn-primary">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </a>
                    <a href="{{ route('trajets.edit', $trajet->id) }}" class="btn btn-success">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zM13.5 6.207 9.793 2.5 3.293 9h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zM6.032 13.646A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10H3a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                        </svg>
                    </a>
                    <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce trajet ?')">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5zM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528zM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $trajets->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection