<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    public function run()
    {
        factory('Larabook\Statuses\Status', 50)->create();
    }
}
