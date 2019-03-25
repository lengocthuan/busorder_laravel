<?php

use Illuminate\Database\Seeder;

class DetailOrderBusInfomationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DetailOrderBusInfomation::class, 90)->create();
    }
}
