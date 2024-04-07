<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "menu_name"=>"required",
            "menu_price"=> "required|numeric",
            "menu_image"=> "required|image",
            "menu_description"=> "required",
            "category_id"=> "required|exists:categories,id"
        ];
    }
}
