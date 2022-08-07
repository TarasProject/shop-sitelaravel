<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'TarasAdmin',
            'email' => 'taras@gmail.com',
            'password' => bcrypt('123456'),
            'role' => User::ROLE_ADMIN,
            'phone' => '098354423',
            'file_name'=>'my_foto.jpg',
            'file_size'=>'1599737',
            'remember_token' => str_random(20),
        ]);

        User::create([
            'name' => 'Oleg',
            'email' => 'oleg@gmail.com',
            'password' => bcrypt('123456'),
            'role' => User::ROLE_MANAGER,
            'phone' => '0987766555',
            'remember_token' => str_random(20),
        ]);

        User::create([
            'name' => 'Dima',
            'email' => 'dima@gmail.com',
            'password' => bcrypt('123456'),
            'role' => User::ROLE_MANAGER,
            'phone' => '0953534546',
            'remember_token' => str_random(20),
        ]);
        factory(User::class,15)->create();
    }
}
