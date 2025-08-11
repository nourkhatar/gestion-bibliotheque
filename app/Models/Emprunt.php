<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'livre_id',
        'date_emprunt',
        'date_retour',
        'statut',
    ];

    protected $casts = [
        'date_emprunt' => 'date',
        'date_retour'  => 'date',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    
    public function scopeEnRetard($query)
    {
        return $query
            ->whereNull('date_retour')
            ->where(function ($q) {
                $q->where('statut', 'en_retard')
                  ->orWhere('date_emprunt', '<', now()->subDays(15));
            });
    }
}
