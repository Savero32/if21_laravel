<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        Prodi::create([
            'id' => Str::uuid(),
            'nama' => 'Sistem Informasi',
            'singkatan' => 'SI',
            'kaprodi' => 'Drs. Kaprodi SI',
            'sekretaris' => 'Sekretaris SI',
            'fakultas_id' => 1 // sesuaikan dengan id fakultas yang ada
        ]);
        Prodi::create([
            'id' => Str::uuid(),
            'nama' => 'Teknik Informatika',
            'singkatan' => 'TI',
            'kaprodi' => 'Drs. Kaprodi TI',
            'sekretaris' => 'Sekretaris TI',
            'fakultas_id' => 1 // sesuaikan dengan id fakultas yang ada
        ]);
    }
}
