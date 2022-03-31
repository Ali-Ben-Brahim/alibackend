<?php
namespace App\Http\Controllers\API\Ouvrier;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Poubelle;
use App\Models\Ouvrier;
use App\Models\Camion;
use App\Models\Depot;
use App\Models\Zone_depot;

class ViderController extends BaseController{
    public function ViderPoubelle( $id_ouvrier , $id_poubelle){
        $poubelle = Poubelle::find($id_poubelle);
        
        $capactite=$poubelle->capacite_poubelle;
        $pourcentage=$poubelle->Etat;

        $quantite=$capactite * $pourcentage/ 100;

        $poubelle->Etat=0;
        $poubelle->capacite_poubelle=0;


        $ouvrier = Ouvrier::find($id_ouvrier);
        $id_camion = $ouvrier->id_camion;

        $camion = Camion::find($id_camion);

        if ($poubelle->type==="plastique"){
            $camion->volume_actuelle_plastique+=$quantite;
        }else if($poubelle->type==="papier"){
            $camion->volume_actuelle_papier+=$quantite;
        }else if($poubelle->type==="composte"){
            $camion->volume_actuelle_composte+=$quantite;
        }else if($poubelle->type==="canette"){
            $camion->volume_actuelle_canette+=$quantite;
        }

        $poubelle->save();
        $camion->save();
        $myArray = [
            'id_poubelle'=>$poubelle->id,
            'type'=>$poubelle->type,
            'id_camion'=>$camion->id,
            'id_ouvrier'=>$ouvrier->id,
            'quantite'=>$quantite,
            'quantite_plastique_camion'=>$camion->volume_actuelle_plastique,
            'quantite_papier_camion'=>$camion->volume_actuelle_papier,
            'quantite_composte_camion'=>$camion->volume_actuelle_composte,
            'quantite_canette_camion'=>$camion->volume_actuelle_canette,
        ];
        return response()->json($myArray);
    }
    public function ViderCamion( $id_depot){
        // $ouvrier = Ouvrier::find($id_ouvrier);
        // $id_camion = $ouvrier->id_camion;

        $depot = Depot::find($id_depot);
        $id_zone_depot = $depot->id_zone_depot;
        $id_camion =$depot->id_camion;

        $camion = Camion::find($id_camion);
        $zone_depot = Zone_depot::find($id_zone_depot);

        $qt_plastique=$camion->volume_actuelle_plastique;
        $qt_canette=$camion->volume_actuelle_canette;
        $qt_composte=$camion->volume_actuelle_composte;
        $qt_papier=$camion->volume_actuelle_papier;

        $zone_depot->quantite_depot_actuelle_plastique+=$qt_plastique;
        $zone_depot->quantite_depot_actuelle_papier+=$qt_papier;
        $zone_depot->quantite_depot_actuelle_composte+=$qt_composte;
        $zone_depot->quantite_depot_actuelle_canette+=$qt_canette;

        $camion->volume_actuelle_plastique=0;
        $camion->volume_actuelle_canette=0;
        $camion->volume_actuelle_composte=0;
        $camion->volume_actuelle_papier=0;

        $camion->save();
        $zone_depot->save();
        $myArray = [
            'id_zone_depot'=>$zone_depot->id,
            'id_camion'=>$camion->id,
            'depot'=>$depot->id,
            'quantite_plastique_camion'=>$qt_papier,
            'quantite_papier_camion'=>$qt_papier,
            'quantite_composte_camion'=>$qt_composte,
            'quantite_canette_camion'=>$qt_canette,
            'quantite_plastique_zone_depot'=>$zone_depot->quantite_depot_actuelle_plastique,
            'quantite_papier_zone_depot'=>$zone_depot->quantite_depot_actuelle_papier,
            'quantite_composte_zone_depot'=>$zone_depot->quantite_depot_actuelle_composte,
            'quantite_canette_zone_depot'=>$zone_depot->quantite_depot_actuelle_canette,
        ];
        return response()->json($myArray);
    }

    public function ViderPoubelleQr($id_ouvrier,$qr){
        $poubelle = Poubelle::where('nom',$qr)->first();
        if(!$poubelle){
            return response([
                'message' => 'QR introuvable' 
            ],404);
        }
        
        $capactite=$poubelle->capacite_poubelle;
        $pourcentage=$poubelle->Etat;

        $quantite=$capactite * $pourcentage/ 100;

        $poubelle->Etat=0;
        $poubelle->capacite_poubelle=0;


        $ouvrier = Ouvrier::find($id_ouvrier);
        if(!$ouvrier){
            return response([
                'message' => 'id ouvrier introuvable' 
            ],404);
        }
        $id_camion = $ouvrier->id_camion;

        $camion = Camion::find($id_camion);
        if(!$camion){
            return response([
                'message' => 'id camion introuvable' 
            ],404);
        }
        if ($poubelle->type==="plastique"){
            $camion->volume_actuelle_plastique+=$quantite;
        }else if($poubelle->type==="papier"){
            $camion->volume_actuelle_papier+=$quantite;
        }else if($poubelle->type==="composte"){
            $camion->volume_actuelle_composte+=$quantite;
        }else if($poubelle->type==="canette"){
            $camion->volume_actuelle_canette+=$quantite;
        }

        $poubelle->save();
        $camion->save();
        $myArray = [
            'nom_poubelle' =>$poubelle->nom,
            'id_poubelle'=>$poubelle->id,
            'type'=>$poubelle->type,
            'id_camion'=>$camion->id,
            'id_ouvrier'=>$ouvrier->id,
            'quantite'=>$quantite,
            'quantite_plastique_camion'=>$camion->volume_actuelle_plastique,
            'quantite_papier_camion'=>$camion->volume_actuelle_papier,
            'quantite_composte_camion'=>$camion->volume_actuelle_composte,
            'quantite_canette_camion'=>$camion->volume_actuelle_canette,
        ];
        return response($myArray);
    }
}
