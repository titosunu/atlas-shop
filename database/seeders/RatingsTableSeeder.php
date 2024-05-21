<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratingRecords = [
            ['id'=>1, 'user_id'=>2, 'product_id'=>1, 'review'=> 'very good', 'rating'=>4, 'status'=>0],
            ['id'=>2, 'user_id'=>2, 'product_id'=>2, 'review'=> 'good', 'rating'=>3, 'status'=>0],
            ['id'=>3, 'user_id'=>2, 'product_id'=>3, 'review'=> 'very good product', 'rating'=>5, 'status'=>0],
        ];

        Rating::insert($ratingRecords);
    }
}
