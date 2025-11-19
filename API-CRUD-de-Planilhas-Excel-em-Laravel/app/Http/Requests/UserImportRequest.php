<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserImportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => [
                'required',
                'mimes:xlsx,xls',
                'max:5120',
            ],

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
