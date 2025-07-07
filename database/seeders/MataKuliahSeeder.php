<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\MataKuliah;
use App\Models\Prodi;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        $prodi = Prodi::first(); // ambil prodi pertama
        if ($prodi) {
            MataKuliah::create([
                'id' => Str::uuid(),
                'kode_mk' => 'IF001',
                'nama' => 'Pemrograman Web',
                'prodi_id' => $prodi->id
            ]);

            MataKuliah::create([
                'id' => Str::uuid(),
                'kode_mk' => 'IF002',
                'nama' => 'Basis Data',
                'prodi_id' => $prodi->id
            ]);
        }
    }
}
