<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('production')) {
            throw new RuntimeException('Seeders should never run in production!');
        }

        // $this->call(UsersTableSeeder::class);
    }
}
