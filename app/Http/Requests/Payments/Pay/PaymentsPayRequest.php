<?php

namespace App\Http\Requests\Payments\Pay;

use Illuminate\Foundation\Http\FormRequest;

class PaymentsPayRequest extends FormRequest
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

    function params(): PaymentsPayParams
    {
        return new PaymentsPayParams($this);
    }
}
