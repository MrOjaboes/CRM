<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_notes', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->boolean('status')->default(false);  
            $table->integer('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->integer('athr_id')->unsigned()->references('id')->on('athrs')->onDelete('cascade')->nullable(); 
            $table->integer('school_id')->unsigned()->references('id')->on('schools')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_notes');
    }
}
