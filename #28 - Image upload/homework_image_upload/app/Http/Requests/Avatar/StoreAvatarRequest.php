<?php

namespace App\Http\Requests\Avatar;

use Illuminate\Foundation\Http\FormRequest;

class StoreAvatarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //
            'profile_image' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:4096',
        ];
    }
}
