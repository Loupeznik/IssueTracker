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
            'Name' => ['UI', 'Database', 'Codebase', 'Bug', 'Hardware']
        ]);
        DB::table('status')->insert([
            'Name' => ['Active', 'Resolved']
        ]);
        DB::table('priority')->insert([
            'Name' => ['High', 'Medium', 'Low']
        ]);
    }
}
