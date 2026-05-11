<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Camping;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenemos todos los campings que ya existen
        $campings = Camping::all();

        foreach ($campings as $camping) {

            // Creamos 10 clientes para cada camping
            Cliente::factory()
                ->count(5)
                ->create([
                    'id_camping' => $camping->id, // Sobrescribimos el ID del factory
                ]);
        }
    }
}
