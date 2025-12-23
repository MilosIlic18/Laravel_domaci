<?php

namespace App\Http\Requests\Shipment;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentRequest extends FormRequest
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
            //
            'title'             => 'required|string|max:128',
            'from_city'         => 'required|string|max:64',
            'from_country'      => 'required|string|max:64',
            'to_city'           => 'required|string|max:64',
            'to_country'        => 'required|string|max:64',
            'price'             => 'required|integer|min:0',
            'status'            => 'required|in:in_progress,unassigned,completed,problem',
            User::TABLE . '_id' => 'required|integer|exists:' . User::TABLE . ',id',
            'details'           => 'nullable|string',
        ];
    }
}
