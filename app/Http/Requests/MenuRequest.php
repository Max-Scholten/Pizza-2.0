<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
/**
* Determine if the user is authorized to make this request.
*/
    public function rules(): array
    {
        return [
            'soort' => 'required|string|max:100',
            'beschrijving' => 'required|string|max:255',
            'foodcart' => 'required|string', // Adjusted for file uploads
            'prijs' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }



    /**
* Get the error messages for the defined validation rules.
*
* @return array<string, string>
*/
public function messages(): array
{
return [

];
}
}
