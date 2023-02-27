<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function getPayments()
    {
        $data = Payment::all();

        /* header('Access-Control-Allow-Origin: *');
         header('Content-Type: application/json');*/
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}