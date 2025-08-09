<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\EtudiantAgentController;
use App\Http\Controllers\AgentGestionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RetardController;

/**
 * Auth (guest)
 */
Route::middleware('guest')->group(function () {
    Route::get('/',            [AuthController::class, 'showLogin'])->name('login');      // GET login page
    Route::get('/login',       [AuthController::class, 'showLogin']);                     // alias
    Route::post('/login',      [AuthController::class, 'login'])->name('login.submit');   // POST login
});

/**
 * Authenticated
 */
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboards
    Route::get('/agent/accueil',    [AgentController::class,    'accueil'])->name('agent.accueil');
    Route::get('/etudiant/accueil', [EtudiantController::class, 'accueil'])->name('etudiant.accueil');

    // Étudiant
    Route::get('/etudiant/catalogue',                 [EtudiantController::class, 'catalogue'])->name('etudiant.catalogue');
    Route::post('/etudiant/reserver/{id}',            [EtudiantController::class, 'reserver'])->name('etudiant.reserver');
    Route::get('/etudiant/reservations',              [EtudiantController::class, 'reservations'])->name('etudiant.reservations');
    Route::get('/etudiant/emprunts',                  [EtudiantController::class, 'emprunts'])->name('etudiant.emprunts');

    // Agent: Livres
    Route::get('/agent/livres',        [LivreController::class, 'index'])->name('agent.livres');
    Route::post('/agent/livres',       [LivreController::class, 'store'])->name('agent.livres.store');

    // Agent: Emprunts
    Route::get('/agent/emprunts',              [EmpruntController::class, 'index'])->name('agent.emprunts');
    Route::post('/agent/emprunts/retour/{id}', [EmpruntController::class, 'retour'])->name('agent.emprunts.retour');

    // Agent: Étudiants
    Route::get('/agent/etudiants',            [EtudiantAgentController::class, 'index'])->name('agent.etudiants');
    Route::post('/agent/etudiants',           [EtudiantAgentController::class, 'store'])->name('agent.etudiants.store');
    Route::get('/agent/etudiants/{id}/edit',  [EtudiantAgentController::class, 'edit'])->name('agent.etudiants.edit');
    Route::put('/agent/etudiants/{id}',       [EtudiantAgentController::class, 'update'])->name('agent.etudiants.update');
    Route::delete('/agent/etudiants/{id}',    [EtudiantAgentController::class, 'destroy'])->name('agent.etudiants.destroy');

    // Agent: Agents
    Route::get('/agent/agents',            [AgentGestionController::class, 'index'])->name('agent.agents');
    Route::post('/agent/agents',           [AgentGestionController::class, 'store'])->name('agent.agents.store');
    Route::get('/agent/agents/{id}/edit',  [AgentGestionController::class, 'edit'])->name('agent.agents.edit');
    Route::put('/agent/agents/{id}',       [AgentGestionController::class, 'update'])->name('agent.agents.update');
    Route::delete('/agent/agents/{id}',    [AgentGestionController::class, 'destroy'])->name('agent.agents.destroy');

    // Agent: Réservations & Retards
    Route::get('/agent/reservations',                      [ReservationController::class, 'index'])->name('agent.reservations');
    Route::post('/agent/reservations/{id}/valider',        [ReservationController::class, 'valider'])->name('agent.reservations.valider');
    Route::delete('/agent/reservations/{id}/annuler',      [ReservationController::class, 'annuler'])->name('agent.reservations.annuler');

    Route::get('/agent/retards', [RetardController::class, 'index'])->name('agent.retards');
});

/** Optional: redirect unknown routes to login */
Route::fallback(fn () => redirect()->route('login'));
