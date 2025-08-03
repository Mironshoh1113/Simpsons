<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class HomeController extends Controller
{
    public function index()
    {
        $characters = Character::take(6)->get();
        return view('welcome', compact('characters'));
    }
}
