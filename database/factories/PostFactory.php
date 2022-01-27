<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Post::class;

    public function definition()
    {
        $title = $this->faker->unique()->text(10);
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->text(300),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
            'is_published' => 1,

            'user_id' => function() {
                return User::all()->random()->id;
            },
            'category_id' => function(){
                return Category::factory()->create()->id;
            }
        ];
    }
}
