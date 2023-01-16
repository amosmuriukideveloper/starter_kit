<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return  [
            'product_name' => 'required',
            'product_type_id' => 'required',
            'manufacturer' => 'required',
            'price' => 'integer',
            'model_id' => 'required',
            'brand_id' => 'required',
            
        ];
    }
}
