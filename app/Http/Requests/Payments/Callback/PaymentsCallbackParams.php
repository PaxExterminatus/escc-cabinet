<?php

namespace App\Http\Requests\Payments\Callback;

class PaymentsCallbackParams
{
    public string $billId;

    public function __construct(PaymentsCallbackRequest $request)
    {
        $all = $request->all();
        $this->billId = $all['billId'];
    }
}
