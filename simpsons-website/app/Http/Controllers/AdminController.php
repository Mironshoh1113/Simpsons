<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        // Oddiy admin paroli - "admin123"
        if ($request->password === 'admin123') {
            $request->session()->put('is_admin', true);
            return redirect()->route('characters.index')->with('success', 'Admin sifatida kirildi!');
        }

        return back()->withErrors(['password' => 'Noto\'g\'ri parol!']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin');
        return redirect()->route('home')->with('success', 'Tizimdan chiqildi!');
    }
}
