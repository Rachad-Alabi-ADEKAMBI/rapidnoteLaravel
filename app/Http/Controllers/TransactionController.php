<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function getTransactions()
    {
        $data = Transaction::all();

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        return json_encode($data, JSON_UNESCAPED_UNICODE);
        //  return ('Transactions', compact('data'));
    }

    public function getTransaction($id)
    {
        $data = Transaction::find($id);

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}