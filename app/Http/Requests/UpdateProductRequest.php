<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            //
            'name'=>'required|min:2',
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'first_url'=>'mimes:jpeg,bmp,png|max:500',
            'second_url'=>'mimes:jpeg,bmp,png|max:500',
            'description'=>'required|min:5'
        ];
    }
}
