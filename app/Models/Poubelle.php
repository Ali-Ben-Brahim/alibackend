<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poubelle extends Model
{
    use HasFactory,  SoftDeletes;

    protected $fillable = [
        'bloc_poubelle_id',
        'nom',
        'qrcode',
        'capacite_poubelle',
        'type',
        'Etat',
        'temps_remplissage',
    ];
    public function blocPoubelle()
    {
        return $this->belongsTo(Bloc_poubelle::class);
    }
    protected $dates=['deleted_at'];

}

