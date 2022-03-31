<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_commande_dechet extends Model
{
    use HasFactory;
    protected $fillable = [
        'commande_dechet_id',
        'dechet_id',
        'quantite',
    ];
}

