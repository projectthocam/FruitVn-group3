<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:4',
            'Unit_price' => 'required|',
            'category_id' => 'required',
            'description' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name can"t be not blank  ',
            'name.unique' => 'Name can"t be not uniform',
            'name.max' => 'Name does not exceed 255 characters',
            'name.min' => 'Name No less than 4 characters',
            'price.required' => 'Price can"t be not price',
            'category_id.required' => 'Category can"t be not blank',
            'contents.required' => 'Content is not left blank'
        ];
    }
}
