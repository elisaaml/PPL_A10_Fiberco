<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profil_company')->insert([
            [
                'company_name' => 'Fiberco',
                'address' => 'Jalan Bengawan Solo No.56 Desa Lembengan Kec. Ledokombo, Jember',
                'about1' => 'CV. SUMBERSARI is an agro-industrial company located in Klonceng, Lembengan Village, Ledokombo District, Jember Regency, Indonesia. We specialize in the processing of coconut coir waste into valuable, eco-friendly products such as cocofiber and cocopeat, which are widely used in agriculture, horticulture, and various industrial applications.
                            Since our establishment, we have been committed to supporting sustainable development by transforming agricultural waste into high-quality export products. Our products are known for their consistency, durability, and environmentally friendly properties',
                'about2' => '',
            ],
        ]);
    }
}
