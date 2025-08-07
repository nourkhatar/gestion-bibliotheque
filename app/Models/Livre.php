<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'titre',
        'auteur',
        'edition',
        'categorie',
        'nombre_exemplaires',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }
}
