<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Inertia\Inertia;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();
        return Inertia::render('Dashboard/Transaction/Index', ["transactions" => $transactions]);
    }

    public function show($id)
    {
        $data = Transaction::find($id);
        return Inertia::render('Dashboard/Transaction/Detail', ["transaction" => $data]);
    }

    public function status($id)
    {
        Transaction::find($id)->update(['status' => 'PAID']);
        return redirect()->route('dashboard.transaction.index');
    }
}
