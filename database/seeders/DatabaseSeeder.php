<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Adventure;
use App\Models\Photo;
use App\Models\Destination;


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

        // Destination::factory(2)->create()->each(function ($desitnation) {
        //  Adventure::factory(5)->for($desitnation)->create();
            
        // });
        Adventure::factory(5)->create();
        Photo::factory(5)->create();
        Destination::factory(5)->create();
    }


}
