<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Detail_commande_poubelle extends Model
{
    use HasFactory;
    protected $fillable = [
        'commande_poubelle_id',
        'stock_poubelle_id',
        'quantite',
        'prix_unitaires',
    ];
}

