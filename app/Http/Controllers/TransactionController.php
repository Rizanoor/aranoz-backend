<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = TransactionItem::with(['product', 'transaction'])->paginate(10);

        return view('pages.transaction.index', [
            'transaction' => $transaction
        ]);
    }
}
