<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'role',
    ];

    protected $hidden = ['password'];

    public function etudiant()
    {
        return $this->hasOne(Etudiant::class);
    }

    public function agent()
    {
        return $this->hasOne(Agent::class);
    }
}
