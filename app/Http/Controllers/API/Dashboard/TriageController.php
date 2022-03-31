<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Etablissement;
use App\Models\Zone_travail;
use Illuminate\Http\Request;

class TriageController extends Controller
{
    public function EtablissementParZoneEtablissement($id_zone_travail){
        //$dechet_plastique = Etablissement::orderBy('id', 'DESC')->get();
     //$zone_travail = Zone_travail::find($id_zone_travail);
        return Etablissement::where('id_zone_travail',$id_zone_travail)->get();
    }
}
