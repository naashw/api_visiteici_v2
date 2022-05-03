<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPublicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'numeric',
            'name_public' => 'required|string|max:190',
            'email_public' => 'required|string',
            'telephone_public' => 'numeric|digits:10',
            'ville_public' => 'string|max:190',
            'nom_societe_public' => 'string|max:190',
            'url_website_societe_public' => 'string|max:190',
        ];
    }
}
