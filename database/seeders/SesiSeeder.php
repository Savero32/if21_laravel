namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sesi;

class SesiSeeder extends Seeder
{
    public function run(): void
    {
        $list = ['Pagi', 'Siang', 'Sore'];
        foreach ($list as $nama) {
            Sesi::create(['nama' => $nama]);
        }
    }
}
