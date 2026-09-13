<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   public function authorize(): bool
{
    return true; // Permitir que los usuarios autenticados envíen la petición
}

public function rules(): array
{
    return [
        'nombre'    => 'required|string|max:255',
        'capacidad' => 'required|integer|min:1',
    ];
}
}
