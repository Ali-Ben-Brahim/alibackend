<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Ouvrier extends Authenticatable{
    use HasFactory,  SoftDeletes, Notifiable;
    protected $fillable = [
        'zone_travail_id',
        'camion_id',
        'poste',
        'qrcode',
        'nom',
        'prenom',
        'CIN',
        'photo',
        'numero_telephone',
        'email',
        'mot_de_passe',
    ];
    public function camion(){
        return $this->hasOne(Camion::class);
    }

    public function etablissement(){
        return $this->belongsTo(Etablissement::class);
    }
    protected $dates=['deleted_at'];
    protected $hidden = [
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}

