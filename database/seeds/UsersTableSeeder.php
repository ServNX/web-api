<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Mike Wiley',
            'email' => 'servnx@gmail.com',
            'password' => bcrypt('Test1234'),
            'remember_token' => str_random(10),
        ]);

        factory(User::class, 10)->create();
    }
}