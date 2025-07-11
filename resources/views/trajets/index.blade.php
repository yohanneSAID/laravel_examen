@extends('layouts.app')
@section('jumb', 'trajets')
@section('content')

<style>
    html,
    body {
        height: 100%;
        overflow-y: auto;
    }

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
                    <a href="{{ route('trajets.show', $trajet->id) }}">
                        <button class="action-btn view-btn">
                            <i class="fas fa-eye"></i>
                        </button>
                    </a>
                    <a href="{{ route('trajets.edit', $trajet->id) }}">
                        <button class="action-btn edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                    <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce véhicule ?')">
                            <i class="fas fa-trash"></i>
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