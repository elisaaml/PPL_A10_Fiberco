<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            [
                'team_name' => 'Panji Harmoko',
                'team_position' => 'Chief Executive Officer',
                'team_description' => 'The CEO is responsible for leading the company, making key decisions,
                managing overall operations, and ensuring business goals are achieved.',
            ],
        ]);
    }
}
