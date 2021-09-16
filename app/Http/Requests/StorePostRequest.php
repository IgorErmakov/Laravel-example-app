<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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

    /*
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
    */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required | min: 20 | max:100',
            'description' => 'required',
            'publish_at' => 'nullable|date|after:tomorrow',
            'is_active' => 'accepted',
        ];
    }
}
