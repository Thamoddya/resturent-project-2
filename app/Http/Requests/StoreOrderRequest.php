<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "selectedItems"=>"required",
            "name"=>"sometimes",
            "email"=>"sometimes",
            "mobile"=>"sometimes",
            "total"=>"required",
        ];
    }
}
