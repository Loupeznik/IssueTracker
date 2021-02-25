<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the database with template issue categories
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->make();
    }
}
