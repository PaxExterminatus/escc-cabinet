<?php

namespace App\Domain\Payments\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
{
    function authorize(): bool
    {
        return true;
    }

    function rules(): array
    {
        return [
            'code' => ['required', ],
            'amount' => ['required', 'numeric', 'gt:0', ],
            'email' => ['required', ],
        ];
    }

    function messages(): array
    {
        return [
            'code.required' => 'Код клиента - обязательный параметр',
            'amount.required' => 'Сумма - обязательный параметр',
            'amount.numeric' => 'Сумма должна быть числом',
            'amount.gt' => 'Сумма должна быть больше нуля',
            'email.required' => 'Электронная почта - обязательный параметр',
        ];
    }

    function params(): PayParams
    {
        return new PayParams($this);
    }
}
