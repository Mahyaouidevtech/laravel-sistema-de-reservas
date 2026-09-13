<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSalaRequest extends FormRequest
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
        'sala_id'      => 'required|exists:salas,id',
        'cliente'      => 'required|string|max:255',
        'fecha_inicio' => 'required|date',
        'fecha_fin'    => 'required|date|after:fecha_inicio',
    ];
}
}
