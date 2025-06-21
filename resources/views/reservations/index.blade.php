@extends('layouts.app')
@section('jumb', 'administrations')
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
        <h2 class="orders-title">Liste générale des réservations</h2>
        <a href="{{ route('reservations.create') }}">
            <button class="add-order-btn btn btn-success">
                <i class="fas fa-plus"></i> Ajouter une réservation
            </button>
        </a>
    </div>

    <table class="orders-table">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Trajet</th>
                <th>Véhicule</th>
                <th>Chauffeur</th>
                <th>Statut</th>
                <th>Passagers</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{$reservation->id}}</td>
                <td>{{$reservation->date}}</td>
                <td>{{$reservation->trajet->destination}}</td>
                <td>{{$reservation->vehicule->immatriculation}}</td>
                <td>{{$reservation->chauffeur->nom}}</td>
                <td>
                    <span class="status-badge
                        {{ $reservation->statut === 'confirmé' ? 'status-delivered' : '' }}
                        {{ $reservation->statut === 'en_attente' ? 'status-pending' : '' }}">
                        {{ $reservation->statut }}
                    </span>
                </td>
                <td>
                    @foreach($reservation->administration as $admin)
                    {{$admin->nom}}
                    @endforeach
                </td>

                <td>
                    <a href="{{ route('reservations.show', $reservation->id) }}">
                        <button class="action-btn view-btn"><i class="fas fa-eye"></i></button>
                    </a>
                    <a href="{{ route('reservations.edit', $reservation->id) }}">
                        <button class="action-btn edit-btn"><i class="fas fa-edit"></i></button>
                    </a>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn" onclick="return confirm('Confirmer la suppression ?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection