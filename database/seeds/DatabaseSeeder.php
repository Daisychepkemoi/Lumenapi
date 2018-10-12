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
       $this->call([
        // UserTableSeeder::class,
        // MeetingTableSeeder::class,
        // ContactTableSeeder::class,
        // OpportunityTableSeeder::class,
        MessageTableSeeder::class,
        // AccountTableSeeder::class,

    ]);
    }
}
