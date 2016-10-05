<?php


use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class Updatecol extends Migration

{
 
    public function up()

    {
   
	
		Schema::table('users',function(Blueprint $table)
			{
				$table->integer('phone')->after('email');
				$table->dropcolumn('phone number');

    			});

    }

    
public function down()
 
  {


	 Schema::table('users',function(Blueprint $table)
		{	
			$table->dropcolumn('phone');
                 });

  }
}

 
    
