<?php

use Illuminate\Database\Seeder;

class BusRoutersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BusRouter::class, 18)->create();
    }
}
