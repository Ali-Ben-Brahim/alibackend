<?php
namespace App\Http\Controllers\API\GestionDechet;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\GestionDechet\Dechet as DechetResource;
use App\Models\Dechet;
use App\Http\Requests\GestionDechet\DechetRequest;

class DechetController extends BaseController{
    public function index(){
        $dechet = Dechet::all();
        return $this->handleResponse(DechetResource::collection($dechet), 'tous les dechets!');
    }
    public function store(DechetRequest $request){
        $input = $request->all();
        $dechet = Dechet::create($input);
        return $this->handleResponse(new DechetResource($dechet), 'dechet crée!');
    }
    public function show($id){
        $dechet = Dechet::find($id);
        if (is_null($dechet)) {
            return $this->handleError('dechet n\'existe pas!');
        }else{
            return $this->handleResponse(new DechetResource($dechet), 'dechet existante.');
        }
    }
    public function update(DechetRequest $request, Dechet $dechet){
        $input = $request->all();
        $dechet->update($input);
        return $this->handleResponse(new DechetResource($dechet), 'dechet modifié!');
    }
    public function destroydestroy($id) {
        $dechet =Dechet::find($id);
        if (is_null($dechet)) {
            return $this->handleError('dechet n\'existe pas!');
        }
        else{
            $dechet->delete();
            return $this->handleResponse(new DechetResource($dechet), 'dechet supprimé!');
        }
    }
}
