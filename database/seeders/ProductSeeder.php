<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'iPhone 14',
                'price' => 80000,
                'quantity' => 4,
                'category_id' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'MacBook Air M1',
                'price' => 89999,
                'quantity' => 5,
                'category_id' => 2,
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 15,
                'name' => 'Samsung Galaxy S23',
                'price' => 64999,
                'quantity' => 15,
                'category_id' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 16,
                'name' => 'Dell Inspiron 15',
                'price' => 55999,
                'quantity' => 8,
                'category_id' => 2,
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Fashion
            ['id' => 17, 'name' => 'Men Cotton Shirt', 'price' => 1499, 'quantity' => 30, 'category_id' => 3, 'created_by' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 18, 'name' => 'Men Denim Jeans', 'price' => 2499, 'quantity' => 25, 'category_id' => 3, 'created_by' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 19, 'name' => 'Women Kurti', 'price' => 1999, 'quantity' => 20, 'category_id' => 4, 'created_by' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 20, 'name' => 'Women Saree', 'price' => 4999, 'quantity' => 12, 'category_id' => 4, 'created_by' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 25, 'name' => 'Leather Wallet', 'price' => 999, 'quantity' => 40, 'category_id' => 5, 'created_by' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 26, 'name' => 'Sunglasses', 'price' => 1999, 'quantity' => 35, 'category_id' => 5, 'created_by' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Home & Kitchen
            ['id' => 21, 'name' => 'Mixer Grinder', 'price' => 3499, 'quantity' => 10, 'category_id' => 6, 'created_by' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 22, 'name' => 'Microwave Oven', 'price' => 8999, 'quantity' => 6, 'category_id' => 6, 'created_by' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 23, 'name' => 'Wooden Dining Table', 'price' => 15999, 'quantity' => 4, 'category_id' => 7, 'created_by' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 24, 'name' => 'Office Chair', 'price' => 6999, 'quantity' => 10, 'category_id' => 7, 'created_by' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
