<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Sesi;

class SesiSeeder extends Seeder
{
    public function run(): void
    {
        $list = [
            '07.50-09.30',
            '09.40-11.20',
            '11.30-13.10',
            '13.20-15.00',
            '15.10-16.50'
        ];
        foreach ($list as $nama) {
            Sesi::create(['nama' => $nama]);
        }
    }
}
