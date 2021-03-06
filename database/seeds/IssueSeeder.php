<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssueSeeder extends Seeder
{
    /**
     * Seed the database with template issue categories
     *
     * @return void
     */
    public function run()
    {
        factory(App\Issue::class, 20)->create()->make();
    }
}
