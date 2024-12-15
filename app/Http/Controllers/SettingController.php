<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return Inertia::render('Dashboard/Setting/Index', ['setting' => $setting]);
    }

    public function update(SettingRequest $request)
    {
        Setting::first()->update($request->validated());
        return redirect()->route('dashboard.setting.index');
    }
}
