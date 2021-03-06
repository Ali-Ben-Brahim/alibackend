<?php

namespace App\Http\Requests\GestionCompte;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class OuvrierRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }
    public function rules()  {
        if ($this->isMethod('post')) {
            return [
            'zone_travail_id' =>'required',
            'camion_id' =>'required',
            'poste' =>'required',
            'qrcode' =>'required|string',
            'nom' => 'required|string|regex:/^[A-Za-z ]*$/i',
            'prenom' => 'required|string|regex:/^[A-Za-z ]*$/i',
            'CIN' => 'required|numeric',
            'numero_telephone'=> 'required',
            'email' => 'required|email|max:50',
            'mot_de_passe' => 'required|string|min:6',
            'photo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ];
        }else if($this->isMethod('PUT')){
             return [
        //         'zone_travail_id' =>'required',
        //         'camion_id' =>'required',
        //         'poste' =>'required',
        //         'qrcode' =>'required|string',
        //         'nom' => 'required|string|regex:/^[A-Za-z ]*$/i',
        //         'prenom' => 'required|string|regex:/^[A-Za-z ]*$/i',
        //         'CIN' => 'required|numeric',
        //         'numero_telephone'=> 'required|integer',
        //         'email' => 'required|email|max:50',
        //         'mot_de_passe' => 'required|string|min:6',
        //         'photo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

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
