<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Gestionnaire extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'nom',
        'prenom',
        'CIN',
        'photo',
        'numero_telephone',
        'email',
        'mot_de_passe',
    ];
    protected $dates=['deleted_at'];
    protected $hidden = [

        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

