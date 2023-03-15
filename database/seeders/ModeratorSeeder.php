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
            'email' => 'Moderator@moderator.com',
            'email_verified_at' => now()->subDays(5),
            'phone' => '+123456789123',
            'password' => Hash::make('moderator1234'),
        ]);

        $user->assignRole(['moderator']);
    }
}
