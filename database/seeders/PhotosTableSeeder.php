<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Factory::create();

        for($i = 0; $i < 10; $i++)
        {
            DB::table('photos')->insert([
                'photoable_type' => 'App\Models\Post',
                'photoable_id' => Post::all()->random()->id,
                'path' => $faker->imageUrl(800,400, 'post')
            ]);
        }

        for ($i = 0; $i < 10; $i++)
        {
            DB::table('photos')->insert([
                'photoable_type' => 'App\Models\User',
                'photoable_id' => User::all()->random()->id,
                'path' => $faker->imageUrl(275, 150, 'people')
            ]);
        }
        for ($i = 0; $i < 10; $i++) {

            DB::table('photos')->insert([
                'photoable_type' => 'App\Models\Category',
                'photoable_id' => Category::all()->random()->id,
                'path' => $faker->imageUrl(800, 400, 'category')
            ]);
        }
    }
}
