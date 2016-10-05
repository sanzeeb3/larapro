<?php

use Illuminate\Database\Seeder;

class adddetais extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
{

DB::table('users')->insert(['name'=>'Ram',
			   'email'=>'ram@bam.com', 
			'password'=>'afdasd']);

  
    }

}
