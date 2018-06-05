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
        //
        App\User::create([
           'name'=>'adminseed',
           'avatar'=>'http://localhost/discussionApp/public/avatars/avatar.png',
           'email'=>'adminseed@yahoo.com',
           'password'=>bcrypt('123456'),
           'admin'=>1,
        ]);
    }
}
