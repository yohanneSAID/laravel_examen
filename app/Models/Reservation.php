<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'trajet_id', 'vehicule_id', 'chauffeur_id', 'statut'];

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

    public function administrations()
    {
        return $this->belongsToMany(Administration::class, 'reservation_administration', 'reservation_id', 'administration_id');
    }
}
