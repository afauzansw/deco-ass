<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'number' => 'required|string',
            'email' => 'required|email',
        ];
    }
}
