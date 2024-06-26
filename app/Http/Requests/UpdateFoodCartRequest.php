<?php
// UpdateFoodCartRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFoodCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'prijs' => 'required|string',
            // Add other rules as needed
        ];
    }
}
