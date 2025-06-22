<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('partner')->insert([
            [
                'partner_name' => 'Telkom',
                // 'partner_description' => 'IT Partner',
            ],
            [
                'partner_name' => 'Nestle',
                // 'partner_description' => 'Food Partner',
            ],
        ]);
    }
}
