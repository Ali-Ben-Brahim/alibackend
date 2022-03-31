<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock_poubelle extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'quantite_disponible_plastique',
        'quantite_disponible_canette',
        'quantite_disponible_composte',
        'quantite_disponible_papier',
        'capacite_poubelle',
    ];
    public function blocPoubelle()
    {
        return $this->belongsTo(Bloc_poubelle::class);
    }
}
/*
$table->id();
$table->integer('quantite_disponible');
$table->float('capacite_poubelle');
$table->enum('type', ['plastique', 'composte','papier','canette']);
$table->timestamps();
$table->softDeletes();
*/
