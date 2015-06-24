<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory('Larabook\Users\User', 50)->create();
    }
}
