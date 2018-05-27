<?php

use Illuminate\Database\Seeder;
use App\CaseClient;

class CaseClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CaseClient::class,10)->create();
    }
}
