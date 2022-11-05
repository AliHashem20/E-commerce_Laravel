<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Tab P12 Pro',
            'price'=> '800',
            'description'=> 'Premium tablet with 12.6" 2K AMOLED display ',
            'category'=> 'tablet',
            'gallery'=> '../../public/images/download.jpg',
        ]);
    }
}
