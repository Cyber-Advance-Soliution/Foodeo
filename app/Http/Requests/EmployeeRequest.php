<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => ['required'],
            'designation_id' => ['required'],
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
			'name.required' => 'Name is required.',
			'designation_id.required' => 'Designation is required.',
			'password.required' => 'Password is required.',
			'phone_number.required' => 'Phone number is required.',
			'address.numeric' => 'Address is required.',
		];
	}
}
