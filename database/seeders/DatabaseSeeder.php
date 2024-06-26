<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use App\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Color::truncate();
        Size::truncate();
        Product::truncate();
        Variant::truncate();
        User::truncate();

        User::factory(10)->create();
        $cate = ['Nam', 'Nữ', 'Váy', 'Đầm', 'Vest', 'Sơ mi nam'];
        foreach ($cate as $key => $value) {
            Category::create([
                'name' => $value,
                'img' => 'category.png',
                'parent_id' => ($value === 'Nam' || $value === 'Nữ') ? 0 
                            : (($value === 'Váy' || $value === 'Đầm') ? 2 
                            : 1)
            ]);
        }

        foreach(['blue',  'green', 'red', 'yellow', 'black'] as $key => $value) {
            Color::create([
                'name' => $value
            ]);
        }
        
        foreach(['S',  'M', 'L', 'XL', 'XXL'] as $key => $value) {
            Size::create([
                'name' => $value
            ]);
        }

        for($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => fake()->name(),
                'thumbnail' => 'product1.png',
                'price' => fake()->numberBetween(100000, 500000),
                'desc' => fake()->sentence(),
                'status' => 1,
                'category_id' => random_int(3, 6),
            ]);

            Variant::create([
                'quantity' => 200,
                'img' => 'variant.png',
                'product_id' => $i+1,
                'color_id' => random_int(1, 3),
                'size_id' => random_int(1, 3),
            ]);

            Variant::create([
                'quantity' => 200,
                'img' => 'variant.png',
                'product_id' => $i+1,
                'color_id' => random_int(4, 5),
                'size_id' => random_int(4, 5),
            ]);
        }
        

    }
}
