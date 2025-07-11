@extends('layouts.app')
@section('jumb', 'administrations')
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

    .dataTables_wrapper {
        overflow-y: auto;
        max-height: 60vh;
    }
</style>

<div class="orders-card container">
    <div class="orders-header d-flex justify-content-between align-items-center mb-4">
        <h2 class="orders-title">Liste générale des administrations</h2>
        <a href="{{ route('administrations.create') }}">
            <button class="add-order-btn btn btn-success">
                <i class="fas fa-plus"></i> Ajouter une administration
            </button>
        </a>
    </div>

    <table class="orders-table">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($administrations as $administration)
            <tr>
                <td>{{ $administration->id }}</td>
                <td>{{ $administration->nom }}</td>
                <td>{{ $administration->prenom }}</td>
                <td>{{ $administration->contact }}</td>
                <td>{{ $administration->email }}</td>
                <td>{{ $administration->adresse }}</td>
                <td class="d-flex justify-content-between">
                    <a href="{{ route('administrations.show', $administration->id) }}">
                        <button class="action-btn view-btn">
                            <i class="fas fa-eye"></i>
                        </button>
                    </a>
                    <a href="{{ route('administrations.edit', $administration->id) }}">
                        <button class="action-btn edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                    <form action="{{ route('administrations.destroy', $administration->id) }}" method="POST">
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
        {{ $administrations->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection