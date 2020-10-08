<?php

namespace AbdallhSamy\Helpers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoftDeleteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ids' => 'required|array',
            'ids.*' => 'required|numeric'
        ];
    }
}
