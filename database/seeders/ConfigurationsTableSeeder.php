<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        factory(Configuration::class,1)->create([
            'key' => 'name',
            'value' => 'ASISTENCIA',
            'descripcion' => 'Nombre de la aplicacion'
        ]);
        factory(Configuration::class,1)->create([
            'key' => 'tiempo_oculta_alerta',
            'value' => '5',
            'descripcion' => 'Tiempo en segundos para ocultar las alertas de exito o error'
        ]);
        factory(Configuration::class,1)->create([
            'key' => 'divisa',
            'value' => 'Q',
            'descripcion' => 'Símbolo de la moneda que se utiliza'
        ]);
        factory(Configuration::class,1)->create([
            'key' => 'cantidad_decimales',
            'value' => '2',
            'descripcion' => 'Cantidad de decimales para cantidades que no sean de precio '
        ]);
        factory(Configuration::class,1)->create([
            'key' => 'separador_miles',
            'value' => ',',
            'descripcion' => 'Símbolo para separa los miles o millares en las cantidades'
        ]);
        factory(Configuration::class,1)->create([
            'key' => 'separador_decimal',
            'value' => '.',
            'descripcion' => 'Símbolo para separar los decimales en las cantidades'
        ]);
        factory(Configuration::class,1)->create([
            'key' => 'cantidad_decimales_precio',
            'value' => '2',
            'descripcion' => 'Cantidad de decimales para cantidades de precio'
        ]);
        factory(Configuration::class,1)->create([
            'key' => 'mail_pruebas',
            'value' => 'altamiranoesdras@gmail.com',
            'descripcion' => 'Email al que se envían los correos cuando el entorno de la aplicación esta en modo debug o local'
        ]);

    }
}
