<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => [
				'required','unique:product_categories,category_name,' . $this->id . ',id,store_id,' . $this->store_id
			],
			'store_id' => ['required'],
			'category_icon' => 'required|mimes:jpg,png,jpeg',
        ];
    }
	
	public function messages()
	{
		return [
			'category_name.required' => 'Category name is required.',
			'store_id.required' => 'Store is required.',
			'category_icon.required' => 'Icon is required.',
		];
	}
}
