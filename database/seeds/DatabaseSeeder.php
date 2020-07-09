<?php

use App\Purchase;
use App\User;
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
        // $this->call(UsersTableSeeder::class);
        // factory(User::class, 40)->create();
        factory(Purchase::class, 2)->create();
    }
}
