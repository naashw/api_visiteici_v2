<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVirtualRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|max:8',
            'code' => 'string|max:8',
            'picture' => 'array|max:30',
            'picture.*' => 'image|mimes:jpeg,png,jpg|ratio:3/1',
        ];
    }
}
