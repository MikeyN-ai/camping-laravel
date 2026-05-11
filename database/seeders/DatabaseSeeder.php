<?php

namespace Database\Seeders;

use App\Models\Usuario;
use App\Models\Tarifa;
use App\Models\Parcela;
use App\Models\Checkin;
use App\Models\Idiomas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CampingSeeder::class,
            ClienteSeeder::class,
        ]);

        Usuario::factory()->create([
            'email' => 'admin@gmail.com',
            'usuario' => 'admin',
            'id_camping' => 1,
            'id_idioma' => 1,
            'rol' => 'admin',
            'password' => bcrypt('Admin.123'),
        ]);

        Idiomas::factory()->create();
        Tarifa::factory()->create();
        Parcela::factory()->create();
        Checkin::factory()->create();
    }
}
