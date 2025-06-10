<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswaprodi = DB::select('select prodi.nama, count(*) as jumlah from mahasiswas join prodi on mahasiswas.prodi_id = prodi.id
                                        group by prodi.nama;');

        $mahasiswaasalsma = DB::select('select asal_sma, count(*) as jumlah from mahasiswas
                                        group by asal_sma;');
        return view('dashboard.index', compact('mahasiswaprodi','mahasiswaasalsma'));
    }
}
