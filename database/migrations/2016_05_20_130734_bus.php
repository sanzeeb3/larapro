<?php


use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class Bus extends Migration

{
  public function up()
    {
      

Schema::create('bus', function (Blueprint $table)
 {

            $table->increments('id');

            $table->string('name');

	    $table->integer('contact');
	    $table->string('booked_seats');
	    $table->date('booked_for');
	    $table->integer('active');
            $table->timestamps();
    
});
}

    public function down()
    {
     Schema::drop('bus');
 

    }
}
