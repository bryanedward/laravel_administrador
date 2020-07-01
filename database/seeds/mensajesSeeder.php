<?php

use  App\Mensajes;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class mensajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Mensajes::truncate();

        for ($item = 0; $item  < 100 ; $item++) { 
            Mensajes::create([
                'nombre' => "prueba {$item}",
                'correo' => "usuario{$item}@gmail.com",
                'mensaje' => "mensajes de prueba {$item}",
                'created_at' => Carbon::now()->subDays(100)->addDays($item)
                ]);
        }
       
    }
}
