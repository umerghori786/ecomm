<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        return [
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'title'=>'required',
            'short_description'=>'required',
            'long_description'=>'required',
            'strike_price'=>'required',
            'discount_price'=>'required',
            'quantity' => 'required'
        ];
    }
}
