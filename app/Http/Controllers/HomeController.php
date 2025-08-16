<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function show()
    {
        // Just a dummy data
        $sales = Sales::paginate(5);
        return view('sales.data', compact('sales'));
    }
}
