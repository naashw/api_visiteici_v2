<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAppartementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'categories' => 'numeric|between:0,254',
            'nom' => 'required|string|max:190',
            'description' => 'required|string',
            'code_postal' => 'required|digits:5',
            'ville' => 'required|string|max:190',
            'adresse' => 'required|string|max:190',
            'prix' => 'required|numeric|between:0,99999999999.99',
            'charges_comprises' => 'boolean',
            'meublé' => 'boolean',
            'surface' => 'required|numeric|between:0,99999999.99',
            'nb_pieces' => 'required|numeric|between:0,254',
            'nb_chambres' => 'required|numeric|between:0,254',
            'fibre_optique' => 'required|boolean',
            'balcon' => 'required|boolean',
            'terrasse' => 'required|boolean',
            'terrasse_surface' => 'numeric|between:0,9999999.99',
            'cave' => 'required|boolean',
            'jardin' => 'required|boolean',
            'jardin_surface' => 'numeric|between:0,9999999.99',
            'parking' => 'required|boolean',
            'garage' => 'required|boolean',
            'ascenseur' => 'required|boolean',
            'classe_energie' => 'required|numeric|between:0,254',
            'GES' => 'required|numeric|between:0,254',
            'photos' => 'array|max:5',
            'photos.*' => 'image|mimes:jpeg,png,jpg,svg|max:16384|dimensions:min_width=500,min_height=500',
        ];
    }
}
