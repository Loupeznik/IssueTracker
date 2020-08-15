<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'Name' => [1 => 'UI', 2 => 'Database', 3 => 'Codebase', 4 => 'Bug', 5 => 'Hardware']
        ]);
        DB::table('statuses')->insert([
            'Name' => [1 => 'Active', 2 => 'Resolved']
        ]);
        DB::table('priorities')->insert([
            'Name' => [1 => 'High', 2 => 'Medium', 3 => 'Low']
        ]);
    }
}
