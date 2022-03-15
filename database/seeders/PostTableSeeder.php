<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => "What's new in php 8.1",
            'slug' => "what's-new-in-php-8.1",
            'content' => 'PHP 8.1 is the first minor release in the PHP 8 series, and comes with its own new features and deprecations',
            'user_id' => 1,
            'category_id' => 1,
            'is_published' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'title' => 'How to install Laravel 8',
            'slug' => 'how-to-install-laravel-8',
            'content' => 'For managing dependencies, Laravel uses composer',
            'user_id' => 2,
            'category_id' => 2,
            'is_published' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'title' => 'How to install Bootstrap 5',
            'slug' => 'how-to-install-bootstrap-5',
            'content' => 'In this tutorial i will show you how to install booststrap 5 in Laravel',
            'user_id' => 3,
            'category_id' => 2,
            'is_published' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'title' => 'How to install Vue in Laravel 8',
            'slug' => 'how-to-install-vue-in-laravel-8',
            'content' => 'In this tutorial i will show you how to install Vue 3 in Laravel',
            'user_id' => 3,
            'category_id' => 2,
            'is_published' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'title' => 'What us the future of jQuery?',
            'slug' => 'what-us-the-future-of-jQuery-?',
            'content' => 'Web community hasn’t been kind to jQuery in recent years',
            'user_id' => 2,
            'category_id' => 4,
            'is_published' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
