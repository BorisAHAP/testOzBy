<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|min:3|string',
            'description'=>'required|max:65|min:3',
            'image' => 'required|image|mimes:jpeg, jpg, png, gif|max:2048',
            'price'=>'required|min:1|numeric',
            'count'=>'required|min:1|max:100|numeric'
        ];
    }
}
