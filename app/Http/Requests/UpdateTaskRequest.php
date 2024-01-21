<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'is_completed' => ['required', 'boolean'] // the required rule could change depending on how we use the request
        ];
    }
}
