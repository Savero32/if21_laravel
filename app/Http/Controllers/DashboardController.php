<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Anda bisa menambahkan logika statistik atau data dashboard di sini
        return view('dashboard.index');
    }
}
