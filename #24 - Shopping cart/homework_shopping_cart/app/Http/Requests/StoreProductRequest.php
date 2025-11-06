<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"          =>  "required|string|min:5|unique:products",
            "amount"        =>  "required|integer|min:0",
            "price"         =>  "required|numeric|min:1",
            "image"         =>  ["required","url","min:10","max:255","regex:/^https:\/\/images\.pexels\.com\/photos\/\d+\/pexels-photo-\d+\.(?:jpg|jpeg|png|webp)$/"],
            "description"   =>  "required|string",
        ];
    }
}
