<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Team;
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

        $this->call($seeders);
    }
}
