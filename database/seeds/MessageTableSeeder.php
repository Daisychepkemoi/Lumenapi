<?php

use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	
    	
         factory(App\Messages::class, 50)->create([
         	
         ]);
    }
}
