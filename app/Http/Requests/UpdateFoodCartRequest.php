<?php

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
            'soort' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'foodcart' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust based on your needs
            // Add other rules as needed
        ];
    }
}
