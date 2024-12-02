<?php

namespace Database\Seeders;

use App\Models\Brands;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Loop to create 100 products
        foreach (range(1, 100) as $value) {
            Product::create([
                'name' => $faker->randomElement(Brands::pluck('name')->toArray()) . " Watch", 
                'price' => $faker->randomFloat(2, 1000, 10000), 
                'sale_price' => $faker->randomFloat(2, 500, 9000), 
                'color' => $faker->safeColorName(), 
                'brand_id' => Brands::inRandomOrder()->first()->id,
                'product_code' => strtoupper($faker->bothify('??-#####')),
                'gender' => $faker->randomElement(['male', 'female', 'children', 'unisex']), 
                'function' => $faker->randomElement(['sport', 'casual', 'formal', 'fashion']),
                'stock' => $faker->numberBetween(0, 100),
                'description' => $faker->sentence(10),
                'image' => $faker->imageUrl(640, 480, 'fashion'),
                'status' => $faker->boolean(90),
            ]);
        }
    }
}
