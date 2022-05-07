<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserPublicRequest extends FormRequest
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
            'name_public' => [
                'required',
                Rule::unique('users','name')->ignore(Auth::id()),
                Rule::unique('user_public','name_public')->ignore(Auth::id(),'user_id')
            ],
            'email_public' => [
                'email:rfc,dns',
                'nullable',
                Rule::unique('users','email')->ignore(Auth::id()),
                Rule::unique('user_public','email_public')->ignore(Auth::id(),'user_id')
            ],
            'telephone_public' => 'numeric|digits:10|nullable',
            'ville_public' => 'string|max:190|nullable',
            'nom_societe_public' => 'string|max:190|nullable',
            'url_website_societe_public' => 'string|max:190|nullable',
        ];
    }
}
