<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProducts extends FormRequest
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
        $sku = $this->segment(3);
        return [
            'sku' => "required|unique:products,sku,{$sku},sku|max:255",
            'title' => 'required|max:255',
            'type' => 'required',
            'price' => "nullable|regex:/^\d+(\.\d{1,2})?$/",
            "price_promotional" => "nullable|regex:/^\d+(\.\d{1,2})?$/",
            'status' => 'required'
        ];
    }
}
