<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'contact', 'email', 'adresse'];

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
