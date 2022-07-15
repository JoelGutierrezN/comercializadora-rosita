<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'code' => ['required', Rule::unique('products','code')->withoutTrashed()->ignore($this->product)],
            'description' => 'required',
            'provider_id' => 'required',
            'price' => 'required',
            'provider_price' => 'required',
            'stock' => 'required'
        ];
    }
}
