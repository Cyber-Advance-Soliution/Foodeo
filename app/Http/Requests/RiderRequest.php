<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RiderRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
			'store_id' => ['required'],
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
			'phone_number' => ['required', 'numeric'],
			'address' => ['required'],
        ];
    }
	
	public function messages()
	{
		return [
			'store_id.required' => 'Store is required (Firstly create store if not created).',
			'name.required' => 'Full name is required.',
			'password.required' => 'Password is required.',
			'phone_number.required' => 'Phone number is required.',
			'address.numeric' => 'Address is required.',
		];
	}
}
