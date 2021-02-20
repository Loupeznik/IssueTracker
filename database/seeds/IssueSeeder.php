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
        $types = ['UI', 'Database', 'Codebase', 'Bug', 'Hardware'];
        $statuses = ['Active', 'Resolved'];
        $priorities = ['High', 'Medium', 'Low'];
        for ($i = 0; $i < count($types); $i++)
        {
            DB::table('types')->insert([
                'Name' => $types[$i]
            ]);
        }
        for ($i = 0; $i < count($statuses); $i++)
        {
            DB::table('statuses')->insert([
                'Name' => $statuses[$i]
            ]);
        }
        for ($i = 0; $i < count($priorities); $i++)
        {
            DB::table('priorities')->insert([
                'Name' => $priorities[$i]
            ]);
        }
    }
}
