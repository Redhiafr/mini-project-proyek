<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'name' => 'Bear Brands',
                'description' => 'Merupakan Susu murni yang berasal dari luar Indonesia .',
                'image' => 'images/bear-brand.jpg'
            ],
            [
                'name' => 'Snack Chitato',
                'description' => 'Merupakan Snack terkenal yang berasal dari luar Indonesia .',
                'image' => 'images/chitato.jpg'
            ],
        ]);
    }
}
