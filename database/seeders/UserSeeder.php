<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "ali";
        $user->email = "ali@gmail.com";
        $user->password = bcrypt("ali12345");
        $user->save();
        $user2 = new User;
        $user2->name = "fernando";
        $user2->email = "fernando@gmail.com";
        $user2->password = bcrypt("fernando12345");
        $user2->save();
    }
}
