<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client_dechet extends Model{
    use HasFactory, SoftDeletes, Notifiable;


    protected $fillable = [
        'nom',
        'prenom',
        'CIN',
        'photo',
        'adresse',
        'numero_telephone',
        'mot_de_passe',
        'email',
    ];
    public function commande_dechet()
    {
        return $this->belongsTo(Commande_dechet::class);
    }
    protected $dates=['deleted_at'];

    protected $hidden = [
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

