<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating');
            $table->string('review');
            $table->integer('sub_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('sub_reviews', function ($table){
            $table->foreign('sub_id')->references('id')->on('subproducts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_reviews', function (Blueprint $table) {
            $table->dropForeign('sub_id');
        });
        Schema::dropIfExists('sub_reviews');

    }
}
