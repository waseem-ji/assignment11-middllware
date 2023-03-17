<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
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
        User::create([
            'name' =>'waseemji',
            'email' => 'waseemji4217@gmail.com',
            'password' => 'waseemji',
            'is_admin' => 1

        ]);
        $user = User::factory(5)->create();

        for ($i=0; $i < 5; $i++) {
            Post::create([
                'user_id' => $user[$i]->id,
                'title' =>fake()->text(30),
                'body' => fake()->paragraph(10)
            ]);
        }

    }
}
