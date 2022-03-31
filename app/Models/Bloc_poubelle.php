<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bloc_poubelle extends Model{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'etablissement_id',
        'bloc_etablissement',
        'etage_etablissement',
    ];
    public function poubelles() {
        return $this->hasMany(Poubelle::class);
    }

    public function etablissement(){
        return $this->belongsTo(Etablissement::class);
    }
    protected $dates=['deleted_at'];
}



