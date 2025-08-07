<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'livre_id',
        'date_reservation',
        'statut',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }
}
