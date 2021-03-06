<?php
namespace App\Http\Controllers\API\GestionCompte;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\GestionCompte\Ouvrier as OuvrierResource;
use App\Models\Ouvrier;
use App\Http\Requests\GestionCompte\OuvrierRequest;

class OuvrierController extends BaseController{
    public function index(){
        $ouvrier = Ouvrier::all();
        return $this->handleResponse(OuvrierResource::collection($ouvrier), 'Affichage des Ouvriers!');
    }
    public function store(OuvrierRequest $request){
        $input = $request->all();
        if ($image = $request->file('photo')) {
            $destinationPath = 'storage\images\ouvrier';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }
        $input['mot_de_passe'] = Hash::make($input['mot_de_passe']);
        $ouvrier = Ouvrier::create($input);
        return $this->handleResponse(new OuvrierResource($ouvrier), 'Ouvrier crée!');
    }
    public function show($id) {
        $ouvrier = Ouvrier::find($id);
        if (is_null($ouvrier)) {
            return $this->handleError('ouvrier n\'existe pas!');
        }else{
            return $this->handleResponse(new OuvrierResource($ouvrier), 'Ouvrier existe.');
        }
    }
    public function update(OuvrierRequest $request, Ouvrier $ouvrier){
        $input = $request->all();
        if ($image = $request->file('photo')) {
            $destinationPath = 'ouvrier/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }else{
            unset($input['photo']);
        }
        if(!($request->mot_de_passe==null)){
            $input['mot_de_passe'] = Hash::make($input['mot_de_passe']);
        }

        $ouvrier->update($input);
        return $this->handleResponse(new OuvrierResource($ouvrier), 'Ouvrier modifié!');
    }
    public function destroy($id) {
        $ouvrier = Ouvrier::find($id);
        if (is_null($ouvrier)) {
            return $this->handleError('ouvrier n\'existe pas!');
        }
        else{
            unlink(public_path('storage\images\ouvrier\\').$ouvrier->photo );
            $ouvrier->delete();
            return $this->handleResponse(new OuvrierResource($ouvrier), 'Ouvrier supprimé!');
        }
    }
}
