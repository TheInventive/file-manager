<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $collection = Category::all();
        if($collection->isEmpty())
            return [
                'category_name' => 'root',
            ];

        return [
            'category_name' => $this->faker->domainName(),
            'parent_id' => $collection->random()->id
        ];
        //TODO: Két kategória nem lehet egymásnak szülője és gyereke egyszerre!
    }
}
