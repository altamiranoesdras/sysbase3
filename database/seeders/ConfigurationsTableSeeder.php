<?php

namespace Database\Seeders;

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
        

        \DB::table('configurations')->delete();
        
        \DB::table('configurations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'name',
                'value' => 'SysBase',
                'descripcion' => 'SysBase',
                'created_at' => '2004-07-23 07:21:12',
                'updated_at' => '2021-07-16 09:30:10',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'divisa',
                'value' => 'Q',
                'descripcion' => 'Símbolo de la moneda que se utiliza',
                'created_at' => '1983-04-14 07:01:20',
                'updated_at' => '1972-08-03 18:19:12',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'cantidad_decimales',
                'value' => '2',
                'descripcion' => 'Cantidad de decimales para cantidades que no sean de precio ',
                'created_at' => '2006-06-01 15:08:36',
                'updated_at' => '1985-03-05 20:25:28',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'cantidad_decimales_precio',
                'value' => '2',
                'descripcion' => 'Cantidad de decimales para cantidades de precio',
                'created_at' => '1977-06-15 17:41:44',
                'updated_at' => '2006-08-13 11:44:56',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'separador_miles',
                'value' => ',',
                'descripcion' => 'Símbolo para separa los miles o millares en las cantidades',
                'created_at' => '1974-11-27 20:25:48',
                'updated_at' => '1971-09-03 00:11:04',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'separador_decimal',
                'value' => '.',
                'descripcion' => 'Símbolo para separar los decimales en las cantidades',
                'created_at' => '1983-02-28 21:01:09',
                'updated_at' => '2014-01-03 11:09:29',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'mail_pruebas',
                'value' => 'altamiranoesdras@gmail.com',
                'descripcion' => 'Email al que se envían los correos cuando el entorno de la aplicación esta en modo debug o local',
                'created_at' => '2005-06-14 13:13:09',
                'updated_at' => '1993-12-16 05:19:18',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'telefono_negocio',
                'value' => '12345678',
                'descripcion' => '12345678',
                'created_at' => '2021-07-16 09:30:10',
                'updated_at' => '2021-07-16 09:30:10',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'direccion_negocio',
                'value' => 'Dirección Empresa',
                'descripcion' => 'Dirección Empresa',
                'created_at' => '2021-07-16 09:30:10',
                'updated_at' => '2021-07-16 09:30:10',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'correo_negocio',
                'value' => 'cooreo@empresa.com',
                'descripcion' => 'cooreo@empresa.com',
                'created_at' => '2021-07-16 09:30:10',
                'updated_at' => '2021-07-16 09:30:10',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}