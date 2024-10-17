<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reporte;
use Faker\Factory as Faker;

class ReporteSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('es_ES'); // Configura Faker en español

        // Crear 10 reportes aleatorios
        for ($i = 0; $i < 10; $i++) {
            Reporte::create([
                'f' => $faker->word(),
                'f_2' => $faker->word(),
                'f_3' => $faker->word(),
                'control' => $faker->numerify('#####'),
                'minutos' => $faker->numberBetween(1, 60),
                'telefono' => $faker->phoneNumber(),
                'personal' => $faker->name(),
                'fecha' => $faker->date(),
                'salida' => $faker->word(),
                'hora_salida' => $faker->time('H:i'),
                'entrada' => $faker->word(),
                'hora_entrada' => $faker->time('H:i'),
                'direccion' => $faker->address(),
                'solicitantes' => $faker->name(),
                'pacientes1' => $faker->name(),
                'pacientes2' => $faker->name(),
                'pacientes3' => $faker->name(),
                'fallecidos1' => $faker->numberBetween(0, 1),
                'fallecidos2' => $faker->numberBetween(0, 1),
                'edades' => implode(', ', $faker->randomElements([20, 30, 40, 50, 60], 3)),
                'domicilios' => $faker->streetAddress(),
                'escoltas' => $faker->name(),
                'maternidad' => $faker->randomElement(['Sí', 'No']),
                'transito' => $faker->randomElement(['Sí', 'No']),
                'trabajo' => $faker->randomElement(['Sí', 'No']),
                'accidente_otro1' => $faker->word(),
                'accidente_otro2' => $faker->word(),
                'hospital_roosevelt' => $faker->randomElement(['Sí', 'No']),
                'hospital_general' => $faker->randomElement(['Sí', 'No']),
                'hospital_igss' => $faker->randomElement(['Sí', 'No']),
                'hospital_otro' => $faker->company(),
                'radiotelefonista' => $faker->name(),
                'pilotos' => $faker->name(),
                'unidades' => 'Unidad ' . $faker->numberBetween(1, 10),
                'personal1' => $faker->name(),
                'personal2' => $faker->name(),
                'formalizado' => 'Formalizado',
                'conforme' => 'Conforme',
                'vobo' => 'Jefe de Servicio',
                'razon1' => $faker->sentence(),
                'razon2' => $faker->sentence(),
                'sra1' => 'Sr./Sra. ' . $faker->lastName(),
                'sra2' => 'Sr./Sra. ' . $faker->lastName(),
                'dia' => $faker->dayOfMonth(),
                'mes' => $faker->monthName(),
                'anio' => $faker->year(),
                'secretaria' => $faker->name(),
                'observaciones' => $faker->sentence(),
                'si_fallecido' => $faker->randomElement(['Sí', 'No']),
                'no_fallecido' => $faker->randomElement(['Sí', 'No']),
            ]);
        }
    }
}
