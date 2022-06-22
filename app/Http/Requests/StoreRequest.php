<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'store_name' => ['required'],
			'store_category_id' => ['required'],
			//'store_type_id' =>'required|unique:stores,store_type_id,null,id,store_type_id,1,created_by,2',
			'store_type_id' =>[ 
				'required',
				Rule::unique('stores')->where(function ($query) {
					$query->where(['store_type_id' => 1, 'created_by' => \Auth::id()]);
				}),
			],
			'short_description' => ['required', 'max:100'],
			'long_description' => ['required', 'max:1000'],
			'location' => ['required'],
			'store_thumbnail' => 'required|mimes:jpg,png,jpeg',
			'store_banners.*' => ['required', 'mimes:jpg,png,jpeg'],
			'cash_on_delivery' => ['required'],
			'customer_pickup' => ['required'],
			'delivery_to_customer' => ['required'],
			'delivery_charges' => ['required', 'numeric'],
        ];
    }
	
	public function messages()
	{
		return [
			'store_name.required' => 'Store name is required.',
			'store_category_id.required' => 'Store category is required.',
			'store_type_id.required' => 'Store type is required.',
			'store_type_id.unique' => 'Hub type has already been taken, you can choose only sub type now.',
			'short_description.required' => 'Store short description is required.',
			'long_description.required' => 'Store long description is required.',
			'store_thumbnail.required' => 'Store thumbnail is required.',
			'store_banners.required' => 'Store banner is required.',
			//'store_banners.*.mimes' => 'Only jpg, jpeg and png images are allowed',
			'location.required' => 'Store location is required.',
			'cash_on_delivery.required' => 'C.O.D is required.',
			'customer_pickup.required' => 'Customer picup is required.',
			'delivery_to_customer.required' => 'Dilvery to customer  is required.',
			'delivery_charges.required' => 'Delivery Charges is required.',
			'delivery_charges.numeric' => 'Delivery Charges must be numeric.',
		];
	}
}
