<?php

use Illuminate\Database\Seeder;

class BusInformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BusInformation::class, 30)->create();
    }
}
