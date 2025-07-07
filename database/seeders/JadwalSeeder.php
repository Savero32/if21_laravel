<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Sesi;
use App\Models\User;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        $mk = MataKuliah::first();
        $sesi = Sesi::first();
        $dosen = User::where('role', 'dosen')->first();

        if ($mk && $sesi && $dosen) {
            Jadwal::create([
                'tahun_akademik' => '2024/2025',
                'kode_smt' => 'Gasal',
                'kelas' => 'SI-4A',
                'dosen_id' => $dosen->id,
                'mata_kuliah_id' => $mk->id,
                'sesi_id' => $sesi->id,
            ]);
        }
    }
}
