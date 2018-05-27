<?php

use Illuminate\Database\Seeder;
use App\Button;

class ButtonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Button::class)->create([
            'id' => 1,
            'button_name' => 'LEER MAS',
            'modal_id' => 1,
            'button_link' => null
        ]);

        factory(Button::class)->create([
            'id' => 2,
            'button_name' => 'LEER MAS',
            'modal_id' => 2,
            'button_link' => null
        ]);

        factory(Button::class)->create([
            'id' => 3,
            'button_name' => 'LEER MAS',
            'modal_id' => 3,
            'button_link' => null
        ]);

        factory(Button::class)->create([
            'id' => 4,
            'button_name' => 'LEER MAS',
            'modal_id' => 4,
            'button_link' => null
        ]);

        factory(Button::class)->create([
            'id' => 5,
            'button_name' => 'LEER MAS',
            'modal_id' => 5,
            'button_link' => null
        ]);

        factory(Button::class)->create([
            'id' => 6,
            'button_name' => 'Contáctanos',
            'modal_id' => null,
            'button_link' => null
        ]);
    }
}
