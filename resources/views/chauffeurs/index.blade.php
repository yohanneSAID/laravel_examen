@extends('layouts.app')

@section('content')
<style>
    html,
    body {
        height: 100%;
        overflow-y: auto;
    }

    .orders-card {
        margin-top: 20px;
        padding: 20px;
    }

    footer {
        height: 60px;
        padding: 10px;
        font-size: 0.85em;
    }
</style>

<div class="orders-card container">
    <div class="orders-header d-flex justify-content-between align-items-center mb-4">
        <h2 class="orders-title">Liste générale des chauffeurs</h2>
        <a href="{{ route('chauffeurs.create') }}">
            <button class="add-order-btn btn btn-success">
                <i class="fas fa-plus"></i> Ajouter un chauffeur
            </button>
        </a>
    </div>

    <table class="orders-table ">
        <thead class="thead-light">
            <tr>
                <th>ID Chauffeur</th>
                <th>Nom</th>
                <th>Contact</th>
                <th>Disponibilité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chauffeurs as $chauffeur)
            <tr>
                <td>{{ $chauffeur->id }}</td>
                <td>{{ $chauffeur->nom }}</td>
                <td>{{ $chauffeur->contact }}</td>
                <td>
                    <span class="status-badge 
        {{ $chauffeur->disponibilite === 'disponible' ? 'status-delivered' : '' }}
        {{ $chauffeur->disponibilite === 'en mission' ? 'status-processing' : '' }}
        {{ $chauffeur->disponibilite === 'indisponible' ? 'status-pending' : '' }}">
                        {{($chauffeur->disponibilite) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('chauffeurs.show', $chauffeur->id) }}">
                        <button class="action-btn view-btn">
                            <i class="fas fa-eye"></i>
                        </button>
                    </a>
                    <a href="{{ route('chauffeurs.edit', $chauffeur->id) }}">
                        <button class="action-btn edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>


                    <form action="{{ route('chauffeurs.destroy', $chauffeur->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Confirmer la suppression de ce chauffeur ?')">
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
        {{ $chauffeurs->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection