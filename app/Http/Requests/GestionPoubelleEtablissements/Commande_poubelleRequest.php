<?php
namespace App\Http\Requests\GestionPoubelleEtablissements;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class Commande_poubelleRequest extends FormRequest{
    public function authorize(){
        return true;
    }
    public function rules()  {
        if ($this->isMethod('post')) {
            return [
            'responsable_etablissement_id'=> 'required|numeric',
            'quantite'=> 'required|numeric',
            'montant_total'=> 'required|numeric',
            'date_commande'=> 'required|date_format:Y-m-d',
            'date_livraison'=> 'required|date_format:Y-m-d',
            ];
        }else if($this->isMethod('PUT')){
            return [
                // 'responsable_etablissement_id'=> 'required|numeric',
                // 'quantite'=> 'required|numeric',
                // 'montant_total'=> 'required|numeric',
                // 'date_commande'=> 'required|date_format:Y-m-d',
                // 'date_livraison'=> 'required|date_format:Y-m-d',
               ];
        }

    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Validation errors',
                'data'      => $validator->errors()
            ]));
    }
}
