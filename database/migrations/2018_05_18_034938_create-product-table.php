<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('supplier_id')->unsigned();
            $table->string('description');
            $table->float('unit_price');
            $table->float('unit_weight');
            $table->unsignedInteger('quantity');
            $table->float('unit_in_stock')->nullable();
            $table->unsignedInteger('units_on_order')->nullable();
            $table->integer('discount')->nullable();
            $table->string('images');
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
        Schema::dropIfExists('products');
    }
}
