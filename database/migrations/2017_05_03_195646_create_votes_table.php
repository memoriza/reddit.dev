<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Votable;
use App\Models\Vote;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('votes', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('votable_id')->unsigned()->index();
            $table->string('votable_type');
            $table->integer('user_id')->unsigned()->index();
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['user_id', 'votable_id', 'votable_type']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('votes');
    }
}
