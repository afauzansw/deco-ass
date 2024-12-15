<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $images = json_encode([
            'logo' => asset('logo.png'),
            'banner' => asset('banner.jpeg'),
            'mockup' => [
                asset('mockup1.png'),
                asset('mockup2.png'),
                asset('mockup3.png')
            ]
        ]);

        $setting = Setting::firstOrFail();

        return Inertia::render('Home', [
            'images' => json_decode($images),
            'setting' => $setting
        ]);
    }

    public function checkout(TransactionRequest $request)
    {
        $params = $request->validated();
        $photo = $params['photo'];

        unset($params['photo']);

        $transaction = Transaction::create($params);
        $transaction->addMediaFromRequest('photo')->toMediaCollection('photo');

        return redirect()->route('checkout.success', $transaction->id);
    }

    public function checkoutSuccess($id)
    {
        $transaction = Transaction::findOrFail($id);
        return Inertia::render('Transaction/Success', ['transaction' => $transaction]);
    }
}
