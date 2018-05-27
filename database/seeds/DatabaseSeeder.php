<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        $this->call(SectionTableSeeder::class);
        $this->call(ModalTableSeeder::class);
        $this->call(ButtonTableSeeder::class);
        $this->call(ComponentTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CaseClientsTableSeeder::class);
        $this->call(CaseUserTableSeeder::class);
    }
}
