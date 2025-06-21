@extends('layouts.app')

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
</style>

<div class="orders-card container">
    <div class="orders-header d-flex justify-content-between align-items-center mb-4">
        <h2 class="orders-title">Liste général des véhicules</h2>
        <a href="{{route('vehicules.create')}}">
            <button onclick="openAddModal()" class="add-order-btn btn btn-success">
                <i class="fas fa-plus"></i> Ajouter un véhicule
            </button>
        </a>
    </div>

    <table class="orders-table">

        <thead class="thead-light">
            <tr>
                <th>ID Véhicule</th>
                <th>Immatricule</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicules as $vehicule)
            <tr>
                <td>{{$vehicule->id}}</td>
                <td>{{$vehicule->immatriculation}}</td>
                <td>{{$vehicule->marque}}</td>
                <td>{{$vehicule->modele}}</td>
                <td>
                    <span class="status-badge 
        {{ $vehicule->statut === 'disponible' ? 'status-delivered' : '' }}
        {{ $vehicule->statut === 'en_mission' ? 'status-processing' : '' }}
        {{ $vehicule->statut === 'en_reparation' ? 'status-pending' : '' }}">
                        {{ $vehicule->statut }}
                    </span>
                </td>



                <td>
                    <a href="{{route('vehicules.show', $vehicule->id)}}">
                        <button class="action-btn view-btn">
                            <i class="fas fa-eye"></i>
                        </button>
                    </a>
                    <a href="{{route('vehicules.edit', $vehicule->id)}}">
                        <button class="action-btn edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                    <a href="{{route('vehicules.destroy', $vehicule->id)}}">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce véhicule ?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </a>

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{$vehicules->links('pagination::bootstrap-5')}}
    </div>
</div>
@endsection