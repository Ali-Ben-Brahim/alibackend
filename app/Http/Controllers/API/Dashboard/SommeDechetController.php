<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bloc_poubelle;
use App\Models\Etablissement;
use App\Models\Zone_depot;
use App\Models\Zone_travail;

class SommeDechetController extends Controller{
    public function SommeDechetZoneDepot(){
        $quantite_depot_actuelle_plastique= Zone_depot::sum("quantite_depot_actuelle_plastique");
        $quantite_depot_actuelle_papier= Zone_depot::sum("quantite_depot_actuelle_papier");
        $quantite_depot_actuelle_composte= Zone_depot::sum("quantite_depot_actuelle_composte");
        $quantite_depot_actuelle_canette= Zone_depot::sum("quantite_depot_actuelle_canette");
        $myArray = [
            'somme_depot_actuelle_plastique'=>$quantite_depot_actuelle_plastique,
            'somme_depot_actuelle_papier'=>$quantite_depot_actuelle_papier,
            'somme_depot_actuelle_composte'=>$quantite_depot_actuelle_composte,
            'somme_depot_actuelle_canette'=>$quantite_depot_actuelle_canette,
        ];
        return response()->json($myArray);
    }

    public function SommeDechetZoneTravail(){
        $quantite_total_collecte_plastique= Zone_travail::sum("quantite_total_collecte_plastique");
        $quantite_total_collecte_composte= Zone_travail::sum("quantite_total_collecte_composte");
        $quantite_total_collecte_papier= Zone_travail::sum("quantite_total_collecte_papier");
        $quantite_total_collecte_canette= Zone_travail::sum("quantite_total_collecte_canette");
        $myArray = [
            'quantite_total_collecte_plastique'=>$quantite_total_collecte_plastique,
            'quantite_total_collecte_composte'=>$quantite_total_collecte_composte,
            'quantite_total_collecte_papier'=>$quantite_total_collecte_papier,
            'quantite_total_collecte_canette'=>$quantite_total_collecte_canette,

        ];
        return response()->json($myArray);
    }

    public function SommeDechetBlocEtablissement($etablissement_id){

        $bloc_poubelle = Bloc_poubelle::where('etablissement_id',$etablissement_id)->get();
     //   $bloc_poubelle = Bloc_poubelle::where('etablissement_id',$etablissement_id)->get();

      /*$quantite_total_collecte_plastique= Etablissement::sum("quantite_total_collecte_plastique");
        $quantite_total_collecte_composte= Etablissement::sum("quantite_total_collecte_composte");
        $quantite_total_collecte_papier= Etablissement::sum("quantite_total_collecte_papier");
        $quantite_total_collecte_canette= Etablissement::sum("quantite_total_collecte_canette");*/


        $myArray = [
            $bloc_poubelle,
            /*'quantite_total_collecte_plastique'=>$quantite_total_collecte_plastique,
            'quantite_total_collecte_composte'=>$quantite_total_collecte_composte,
            'quantite_total_collecte_papier'=>$quantite_total_collecte_papier,
            'quantite_total_collecte_canette'=>$quantite_total_collecte_canette,*/

        ];
        return response()->json($myArray);

    }
}
