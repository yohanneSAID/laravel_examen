<?php

namespace Database\Seeders;

use App\Models\Administration;
use App\Models\Chauffeur;
use App\Models\Reservation;
use App\Models\Trajet;
use App\Models\Vehicule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BASE_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creation des entités de base 
        $vehicules = Vehicule::factory(2)->create();
        //creation des chauffeurs
        $chauffeurs = Chauffeur::factory(2)->create();
        //creation des trajets
        $trajets = Trajet::factory(2)->create();
        //creation des administrations
        $administrations = Administration::factory(2)->create();

        //Création des réservations
        Reservation::factory(2)->create()->each(function ($reservation) use ($vehicules, $chauffeurs, $trajets, $administrations) {
            // Assigner un véhicule aléatoire
            $reservation->vehicule_id = $vehicules->random()->id;
            // Assigner un chauffeur aléatoire
            $reservation->chauffeur_id = $chauffeurs->random()->id;
            // Assigner un trajet aléatoire
            $reservation->trajet_id = $trajets->random()->id;

            // Sauvegarder la réservation
            $reservation->save();

            //POUR LES RELATIONS ADMINISTRATIONS ET RESERVATIONS (Many to many)
            $reservation->administrations()->attach(
                $administrations->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
