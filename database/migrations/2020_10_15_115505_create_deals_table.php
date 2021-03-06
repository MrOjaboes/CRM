<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('users');
            $table->string('package');
            $table->double('package_amount',18,2)->default(0.00);
            $table->double('balance',18,2)->nullable();
            $table->boolean('paid')->default(false);  
            $table->integer('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->integer('school_id')->unsigned()->references('id')->on('schools')->onDelete('cascade');
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
        Schema::dropIfExists('deals');
    }
}
