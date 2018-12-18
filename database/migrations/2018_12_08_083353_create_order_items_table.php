<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name','30');
            $table->integer('price');
            $table->integer('quantity')->unsigned();
            $table->string('type',30);
            $table->integer('order_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('order_items',function (Blueprint $table){
           $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items',function (Blueprint $table){
           $table->dropForeign('order_id');
        });
        Schema::dropIfExists('order_items');
    }
}
