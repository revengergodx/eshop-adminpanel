<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('sizes')->insert([
            ['title' => 'XS'],
            ['title' => 'S'],
            ['title' => 'M'],
            ['title' => 'L'],
            ['title' => 'XL'],
        ]);

        DB::table('colors')->insert([
           ['name' => 'Black', 'hex' =>'000000'],
           ['name' => 'Red', 'hex' =>'FF0000'],
           ['name' => 'Yellow', 'hex' =>'FFF000'],
           ['name' => 'Blue', 'hex' =>'0000FF'],
           ['name' => 'Green', 'hex' =>'00FF00'],
        ]);

        Tag::factory(20)->create();

    }
}
