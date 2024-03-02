<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "hotel_name"=>'required',
            "hotel_email"=>'required|unique:hotels,hotel_email',
            "hotel_image_path"=>'required',
            "hotel_address"=>'required',
            "hotel_mobile"=>'required|unique:hotels,hotel_mobile',
        ];
    }
}
