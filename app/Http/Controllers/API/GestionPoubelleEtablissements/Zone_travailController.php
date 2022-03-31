<?php
namespace App\Http\Controllers\API\GestionPoubelleEtablissements;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\GestionPoubelleEtablissements\Zone_travail as Zone_travailResource;
use App\Http\Requests\GestionPoubelleEtablissements\Zone_travailRequest;
use App\Models\Zone_travail;
class Zone_travailController extends BaseController{
    public function index(){
        $zone_travail = Zone_travail::all();
        return $this->handleResponse(Zone_travailResource::collection($zone_travail), 'affichage de tous les zone travail!');
    }
    public function store(Zone_travailRequest $request){
        $input = $request->all();
        $zone_travail = Zone_travail::create($input);
        return $this->handleResponse(new Zone_travailResource($zone_travail), 'zone travail crée!');
    }
    public function show($id) {
        $zone_travail = Zone_travail::find($id);
        if (is_null($zone_travail)) {
            return $this->handleError('zone travail n\'existe pas!');
        }else{
            return $this->handleResponse(new Zone_travailResource($zone_travail), 'zone travail existe.');
        }
    }
    public function update(Zone_travailRequest $request, Zone_travail $zone_travail){
        $input = $request->all();
        $zone_travail->update($input);
        return $this->handleResponse(new Zone_travailResource($zone_travail), 'zone travail modifié avec succés');
    }
    public function destroy($id){
        $zone_travail =Zone_travail::find($id);
        if (is_null($zone_travail)) {
            return $this->handleError('zone travail n\'existe pas!');
        }
        else{
            $zone_travail->delete();
            return $this->handleResponse(new Zone_travailResource($zone_travail), ' zone travail supprimé!');
        }
    }
    public function searchRegion($region){
        return Zone_travail::where('region', 'like', '%'.$region.'%')->get();
    }

}
