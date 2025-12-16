<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            // Electronics
            ['id' => 1, 'name' => 'Mobile Phones', 'parent_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'name' => 'Laptops', 'parent_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Fashion
            ['id' => 3, 'name' => 'Men Clothing', 'parent_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'name' => 'Women Clothing', 'parent_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'name' => 'Accessories', 'parent_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Home & Kitchen
            ['id' => 6, 'name' => 'Kitchen Appliances', 'parent_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'name' => 'Furniture', 'parent_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
