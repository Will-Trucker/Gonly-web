<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->name();
        $slug = Str::slug($title);

        $subCategories =  [1,2,3,4,5,6,7];
        $subCategoryRandKey = array_rand($subCategories);

        $brands =  [1,2,3,4,5,6,7];
        $brandRandKey = array_rand($brands);


        return [
           'title' => $title,
           'slug' => $slug,
           'category_id' => 28,
           'sub_category_id' => $subCategories[$subCategoryRandKey],
           'brand_id' =>  $brands[$brandRandKey],
           'price' => rand(10,100),
           'sku' => rand(1000,100000),
           'track_qty' => 'Yes',
           'qty' => 10,
           'is_featured' => 'Yes',
           'status' => 1,
        ];
    }
}
