<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'=>'admin',
            'password'=>bcrypt('admin'),
            'email'=>'admin@admin.admin',
            'admin'=>1,
            'avatar'=>'/avatar.png'
        ]);



        App\User::create([
            'name'=>'user',
            'password'=>bcrypt('user'),
            'email'=>'user@user.user',
            'avatar'=>'/avatar.png'
        ]);
    }
}
