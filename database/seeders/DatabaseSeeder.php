<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\FaqSeeder;
use Database\Seeders\PartnerSeeder;
use Database\Seeders\ProdukSeeder;
use Database\Seeders\ProfilCompanySeeder;
use Database\Seeders\TeamSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(FaqSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(ProfilCompanySeeder::class);
        $this->call(TeamSeeder::class);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin123.')
        ]);
    }
}
