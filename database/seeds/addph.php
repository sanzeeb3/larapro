<?php

use Illuminate\Database\Seeder;

class addph extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
{

DB::table('users')->insert(['name'=>'Shyam',
			   'email'=>'shyam@bam.com', 
			'password'=>'afdasdddd']);

  
    }

}
