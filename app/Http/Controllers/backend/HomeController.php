<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System;
class HomeController extends Controller
{
    public function index()
    {
        $Systems = System::all();
        return view('backend.dashboard', compact('Systems'));
    }
}
