<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'moderator',
            'email' => 'moderator@moderator.com',
            'email_verified_at' => now()->subDays(5),
            'password' => Hash::make('moderator1234'),
        ]);

        $user->assignRole(['moderator']);
    }
}
