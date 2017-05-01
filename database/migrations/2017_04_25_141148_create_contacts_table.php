<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create or modify tables/ do method
             Schema::create('contacts', function(Blueprint $table)
        {
            $table->increments('id'); //id INT NOT NULL AUTO_INCREMENT
            $table->string('email')->unique(); //first_name VARCHAR(300) NOT NULL
            $table->string('first_name'); // to accept NULLs description VARCHAR(255)->nullable()<<< will add the ability for the class to be NULL
            $table->string('last_name');
            $table->string('number');
            $table->timestamps(); //audit columns create_at, updated_at DATETIME ---- used to know when columns are created to keep track of data / creates two columns
        });
    
    }

    /**
     * Reverse the migrations. VVV / undo method/ drop tables
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts'); //
    }
}
