<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeders = [
            RoleSeeder::class,
            AdminSeeder::class,
            ModeratorSeeder::class
        ];
         Team::create([
             'user_id' => 1,
             'name' => 'Admin',
             'personal_team' => 1,
         ]);
        Team::create([
            'user_id' => 2,
            'name' => 'Moderator',
            'personal_team' => 1,
        ]);
        User::factory(1)->create();
        Team::create([
            'user_id' => 3,
            'name' => 'User',
            'personal_team' => 1,
        ]);
         Category::factory(10)->create();
         Tag::factory(10)->create();

        $this->call($seeders);
    }
}
