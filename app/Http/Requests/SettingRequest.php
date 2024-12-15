<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'account_name' => 'required|string',
            'account_number' => 'required|string',
            'account_channel' => 'required|string',
        ];
    }
}
