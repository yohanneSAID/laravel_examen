<?php

use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\homeController;

use App\Models\Vehicule;
use App\Models\Reservation;
use App\Models\Chauffeur;
use App\Models\Trajet;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [homeController::class, 'index'])->name('home');
Route::ressource('reservations', ReservationController::class);
Route::ressource('vehicules', VehiculeController::class);
Route::ressource('chauffeurs', ChauffeurController::class);
Route::ressource('trajets', TrajetController::class);
