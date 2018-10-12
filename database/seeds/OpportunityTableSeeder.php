<?php

use Illuminate\Database\Seeder;

class OpportunityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Opportunity::class, 50)->create();
    }
}
