<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faq')->insert([
            [
                'faq_quest' => 'What is Coco Fiber?',
                'faq_answ' => 'Cocofiber is a natural fiber extracted from coconut husks, known for its strength, elasticity, and eco-friendly properties. Widely used in various industries,
                Cocofiber serves as a key material for car seats, mattresses, brooms, geotextiles, mats, and handicrafts.
                Processed with high standards to ensure cleanliness and durability, our Cocofiber is the perfect choice for businesses seeking reliable, export-quality natural fiber products.',
            ],
        ]);
    }
}
