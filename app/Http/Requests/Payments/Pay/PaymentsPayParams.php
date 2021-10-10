<?php

namespace App\Http\Requests\Payments\Pay;

class PaymentsPayParams
{
    public string $code;
    public float $amount;
    public ?string $name;
    public ?string $surname;
    public ?string $email;
    public ?string $phone;

    public function __construct(PaymentsPayRequest $request)
    {
        $all = $request->all();

        $this->code = $all['code'];
        $this->amount = $all['amount'];
        $this->email = $all['email'];

        $this->name = $all['name'] ?? null;
        $this->surname = $all['surname'] ?? null;
        $this->phone = $all['phone'] ?? null;
    }
}
