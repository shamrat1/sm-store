<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('price');
            $table->string('quantity');
            $table->text('description');
            $table->boolean('approved');
            $table->integer('product_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('subproducts', function ($table){
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subproducts', function (Blueprint $table) {
            $table->dropForeign('product_id');
        });
        Schema::dropIfExists('subproducts');
    }
}
