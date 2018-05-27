<?php

use Illuminate\Database\Seeder;
use App\Section;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Section::class)->create([
            'id'=>1,
            'name' => 'Home',
            'identifier'=>'home'
        ]);

        factory(Section::class)->create([
            'id'=>2,
            'name' => 'Services',
            'identifier'=>'services'
        ]);

        factory(Section::class)->create([
            'id'=>3,
            'name' => 'Process',
            'identifier'=>'process'
        ]);

        factory(Section::class)->create([
            'id'=>4,
            'name' => 'About',
            'identifier'=>'about'
        ]);

        factory(Section::class)->create([
            'id'=>5,
            'name' => 'Contact',
            'identifier'=>'contact'
        ]);

        factory(Section::class)->create([
            'id'=>6,
            'name' => 'Foot',
            'identifier'=>'footer'
        ]);

         factory(Section::class)->create([
            'id'=>7,
            'name' => 'Visas',
            'identifier'=>'visas'
        ]);

         factory(Section::class)->create([
            'id'=>8,
            'name' => 'Testimony',
            'identifier'=>'testimony'
        ]);
    }
}
