<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required',
            'hotel_id' =>'required',
            'email' =>'required|unique:users,email',
            'password' =>'required',
            'mobile' =>'required|unique:users,mobile|max:10',
            'nic' =>'required|unique:users,nic',
            'address' =>'required',
        ];
    }
}
