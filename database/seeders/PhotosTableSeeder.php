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

        for ($i = 1; $i <= 10; $i++)
        {
            DB::table('photos')->insert([
                'photoable_type' => 'App\Models\Category',
                'photoable_id' => $i,
                'path' => 'categories/'.$i.'.png'
            ]);
        }

        for ($i = 1; $i <= 3; $i++)
        {
            DB::table('photos')->insert([
                'photoable_type' => 'App\Models\User',
                'photoable_id' => $i,
                'path' => 'users/'.$i.'.png'
            ]);
        }

        for($i = 1; $i <= 10; $i++)
        {
            DB::table('photos')->insert([
                'photoable_type' => 'App\Models\Post',
                'photoable_id' => $i,
                'path' => 'posts/'.$i.'.png'
            ]);
        }
    }
}
