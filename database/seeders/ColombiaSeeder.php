<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Departamento;
use App\Models\Municipio;

class ColombiaSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/colombia.json'));

        $departamentos = json_decode($json, true);

        foreach ($departamentos as $departamento) {

            $dep = Departamento::create([
                'codigo' => $departamento['id'],
                'nombre' => $departamento['departamento'],
            ]);

            foreach ($departamento['ciudades'] as $ciudad) {

                Municipio::create([
                    'departamento_id' => $dep->id,
                    'codigo' => '',
                    'nombre' => $ciudad,
                ]);
            }
        }
    }
}