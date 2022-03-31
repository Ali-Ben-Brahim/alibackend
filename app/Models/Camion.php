<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Camion extends Model{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'zone_travail_id',
        'matricule',
        'qrcode',
        'heure_sortie',
        'heure_entree',
        'longitude',
        'latitude',
        'volume_maximale_poubelle',
        'volume_actuelle_plastique',
        'volume_actuelle_papier',
        'volume_actuelle_composte',
        'volume_actuelle_canette',
        'volume_carburant_consomme',
        'Kilometrage',
    ];
/*    protected $casts = [
        'volume' => 'array',
    ];
    public function setVolumeAttribute($value)
{
    $volume = [];

    foreach ($value as $array_item) {
        if (!is_null($array_item['key'])) {
            $volume[] = $array_item;
        }
    }

    $this->attributes['volume'] = json_encode($volume);
}
*/
    public function zone_travail()
    {
        return $this->belongsTo(Zone_travail::class);
    }
    public function ouvrier()
    {
        return $this->belongsTo(Ouvrier::class);
    }
    public function depots()
    {
        return $this->hasMany(Depot::class);
    }
    protected $dates=['deleted_at'];

}




