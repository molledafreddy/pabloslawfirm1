<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'id' => 1,
            'name' => 'Pendiente',
                     
        ]);

        Status::create([
            'id' => 2,
            'name' => 'En proceso',
                     
        ]);

        Status::create([
            'id' => 3,
            'name' => 'Terminado',
                     
        ]); 
    }
}
