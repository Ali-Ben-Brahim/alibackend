<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Responsable_etablissement extends Authenticatable{
    use HasFactory, SoftDeletes, Notifiable;
    protected $fillable = [
        'nom',
        'prenom',
        'CIN',
        'photo',
        'email',
        'numero_telephone',
        'mot_de_passe',
    ];

    public function etablissement(){
        return $this->belongsTo(etablissement::class);
    }
    protected $dates=['deleted_at'];
    protected $hidden = [
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
