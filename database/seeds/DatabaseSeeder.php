<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUsersTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(BusRoutersTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(BusInformationsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(DetailOrderBusInfomationsTableSeeder::class);
        $this->call(SocialAccountsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
    }
}
