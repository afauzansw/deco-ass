<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $count = Transaction::count();
        return Inertia::render('Dashboard/Index', ['transaction_count' => $count]);
    }
}
