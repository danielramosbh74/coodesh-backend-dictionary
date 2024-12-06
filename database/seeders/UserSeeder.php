<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add user
        $user = new User();
        $user->name = "User 1";
        $user->email = "example@email.com";
        $user->password = bcrypt("test");
        $user->save();
    }
}
