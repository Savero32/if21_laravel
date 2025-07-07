<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Prodi;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswaprodi = DB::table('mahasiswas')
            ->join('prodi', 'mahasiswas.prodi_id', '=', 'prodi.id')
            ->select('prodi.nama as prodi', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('prodi.nama')
            ->get();

        $mahasiswaasalsma = DB::table('mahasiswas')
            ->select('asal_sma', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('asal_sma')
            ->get();

        $mahasiswapertahun = DB::table('mahasiswas')
            ->selectRaw('YEAR(created_at) as tahun, COUNT(*) as jumlah')
            ->groupByRaw('YEAR(created_at)')
            ->orderByRaw('YEAR(created_at)')
            ->get();

        $data = DB::table('prodi')
            ->leftJoin('mata_kuliahs', 'mata_kuliahs.prodi_id', '=', 'prodi.id')
            ->leftJoin('jadwal', 'jadwal.mata_kuliah_id', '=', 'mata_kuliahs.id')
            ->select('prodi.nama as prodi', DB::raw('COUNT(jadwal.id) as jumlah'))
            ->groupBy('prodi.nama')
            ->get();

        return view('dashboard.index', compact('mahasiswaprodi', 'mahasiswaasalsma', 'mahasiswapertahun', 'data'));
    }
}
