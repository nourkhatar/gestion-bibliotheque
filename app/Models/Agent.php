<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_agent',
        'nom',
        'prenom',
        'email',
        'telephone',
        'date_embauche',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
