<?php

namespace App\Http\Requests\Payments\Callback;

use Illuminate\Foundation\Http\FormRequest;

class PaymentsCallbackRequest extends FormRequest
{
    function authorize(): bool
    {
        return false;
    }

    function rules(): array
    {
        return [];
    }

    function params(): PaymentsCallbackParams
    {
        return new PaymentsCallbackParams($this);
    }
}
