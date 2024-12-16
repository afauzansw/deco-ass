<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'receipt_name' => 'required|string',
            'address' => 'required|string',
            'village' => 'required|string',
            'post_code' => 'required|string',
            'subdistrict' => 'required|string',
            'regency' => 'required|string',
            'province' => 'required|string',
            'email' => 'required|string',
            'phone_number' => 'required|string',
            'price' => 'integer',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
        ];
    }
}
