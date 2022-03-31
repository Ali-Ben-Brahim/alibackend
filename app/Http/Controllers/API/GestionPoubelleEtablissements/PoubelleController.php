<?php
namespace App\Http\Controllers\API\GestionPoubelleEtablissements;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\GestionPoubelleEtablissements\Poubelle as PoubelleResource;
use App\Models\Poubelle;
use App\Http\Requests\GestionPoubelleEtablissements\PoubelleRequest;
class PoubelleController extends BaseController{
    public function index(){
        $poubelle = Poubelle::all();
        return $this->handleResponse(PoubelleResource::collection($poubelle), 'Tous les poubelles!');
    }
    public function store(PoubelleRequest $request){
        $input = $request->all();
        $poubelle = Poubelle::create($input);
        return $this->handleResponse(new PoubelleResource($poubelle),'poubelle crée!');
    }
    public function show($id){
        $poubelle = Poubelle::find($id);
        if (is_null($poubelle)) {
            return $this->handleError('poubelle n\'existe pas!');
        }else{
            return $this->handleResponse(new PoubelleResource($poubelle), 'poubelle existe');
        }
    }
    public function update(PoubelleRequest $request, Poubelle $poubelle){
        $input = $request->all();
        $poubelle->update($input);
        return $this->handleResponse(new PoubelleResource($poubelle), ' poubelle modifié!');
    }
    public function destroy($id){
        $poubelle =Poubelle::find($id);
        if (is_null($poubelle)) {
            return $this->handleError('poubelle n\'existe pas!');
        }
        else{
            $poubelle->delete();
            return $this->handleResponse(new PoubelleResource($poubelle), ' poubelle supprimé!');
        }
    }
    public function searchBlocPoubelle($id_bloc_poubelle){
        return Poubelle::where('id_bloc_poubelle', 'like', '%'.$id_bloc_poubelle.'%')->get();
    }
    public function searchEType($type){
        return Poubelle::where('type', 'like', '%'.$type.'%')->get();
    }
}
