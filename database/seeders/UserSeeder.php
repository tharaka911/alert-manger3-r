<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

        User::create(
            [
                'name' => 'lakshan',
                'email' => "lakshan.tharaka.eds@gmail.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$1MpVfZCs9067v0iH1s0Dk.60/N1R5okal03Ep13JN.M.TKBWTyjlC', // password
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'current_team_id' => 1,
            ]
        );


    }
}
