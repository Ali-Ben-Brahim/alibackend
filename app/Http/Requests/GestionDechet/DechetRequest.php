<?php

namespace App\Http\Requests\GestionDechet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class DechetRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }
    public function rules()  {
        if ($this->isMethod('post')) {
            return [
                'responsable_etablissement_id' =>'required',
                'type_dechet' => 'required|numeric',
                'prix_unitare' =>'required|between:0,99999999.99',
            ];
        }else if($this->isMethod('PUT')){
            return [
        //          'responsable_etablissement_id' =>'required',
        //          'quantite' => 'required|numeric',
        //          'montant_total' =>'required|between:0,99999999.99',
        //          'date_commande' =>'date_format:Y-m-d',
        //          'date_livraison' =>'date_format:Y-m-d',
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
