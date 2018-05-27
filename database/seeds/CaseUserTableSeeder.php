<?php

use Illuminate\Database\Seeder;
use App\CaseUser;

class CaseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CaseUser::class,10)->create();
    }
}
