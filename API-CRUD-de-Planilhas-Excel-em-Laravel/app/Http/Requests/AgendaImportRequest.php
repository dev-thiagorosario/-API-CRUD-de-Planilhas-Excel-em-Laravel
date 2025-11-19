<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaImportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => [
                'required',
                'mimes:xlsx, xls, csv',
                'max:5120',
            ]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
