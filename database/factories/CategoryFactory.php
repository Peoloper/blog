<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Category::class;

    public function definition()
    {
        $title = $this->faker->unique()->word();
        $slug = Str::slug($title);

        return [
            'name' => $title,
            'slug' => $slug
        ];
    }
}
