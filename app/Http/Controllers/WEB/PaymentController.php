<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class PaymentController extends Controller
{
    function dashboard(): View
    {
        return view('payments.dashboard');
    }

    function all(): View
    {
        return view('payments.all');
    }

    function pay(): View
    {
        return view('payments.pay');
    }
}
