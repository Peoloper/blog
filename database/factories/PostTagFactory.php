<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = PostTag::class;

    public function definition()
    {
        return [
            'post_id' => function() {
                return Post::factory()->create()->id;
            },
            'tag_id' => function(){
                return Tag::factory()->create()->id;
            },
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];
    }
}
