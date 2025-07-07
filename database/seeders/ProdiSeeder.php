namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        Prodi::create(['id' => Str::uuid(), 'nama' => 'Sistem Informasi']);
        Prodi::create(['id' => Str::uuid(), 'nama' => 'Teknik Informatika']);
    }
}
