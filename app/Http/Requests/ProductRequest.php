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
            'store_id' => ['required'],
            'product_category_id' => ['required'],
            'product_name' => ['required'],
			'product_price' => ['required', 'numeric'],
			'short_description' => ['required', 'max:100'],
			'long_description' => ['required', 'max:1000'],
			'product_thumbnail' => 'required|mimes:jpg,png,jpeg',
			// 'product_banners' => 'required|mimes:jpg,png,jpeg',
			// 'attribute_name' => ['required'],
			// 'attribute_name.*' => ['required'],
			// 'option' => ['required'],
			// 'option.*' => ['required'],
			// 'option_value' => ['required', 'numeric'],
			// 'option_value.*' => ['required', 'numeric'],
        ];
    }
	
	public function messages()
	{
		return [
			'store_id.required' => 'Store is must required.',
			'product_category_id.required' => 'Product category is must required.',
			'product_name.required' => 'Product name is required.',
			'product_price.required' => 'Product price is required.',
			'product_price.numeric' => 'Product price must be a number.',
			'short_description.required' => 'Product short description is required.',
			'long_description.required' => 'Product long description is required.',
			'product_thumbnail.required' => 'Product thumbnail is required.',
			'product_banners.required' => 'Product banner is required.',
		];
	}
}
