<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatchController extends Controller
{
    public function index(Request $request)
    {
        return view('catch');
    }
}
