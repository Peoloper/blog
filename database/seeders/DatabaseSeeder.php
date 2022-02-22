<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
           RolesAndPermissionsTableSeeder::class, //1
           UserTableSeeder::class, //1
            //PhotosTableSeeder::class //3
            ]);
    }
}

//2

//PostTag::withoutEvents(function () {
//    return PostTag::factory()->count(5)->create();
//});
