<?php


use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class Addph extends Migration

{
 
    public function up()

    {
   
	
		Schema::table('users',function(Blueprint $table)
			{
				$table->integer('phone number')->after('email');

    			});

    }

    
public function down()
 
  {


	 Schema::table('users',function(Blueprint $table)
		{	
			$table->dropcolumn('phone number');
                 });

  }
}

 
    
