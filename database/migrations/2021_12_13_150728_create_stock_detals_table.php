<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockDetalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_detals', function (Blueprint $table) {
            $table->id();
            $table->integer('stock_id');
            $table->text('supplier');
            $table->string('product');
            $table->string('size');
            $table->string('color');
            $table->string('unit_price');
            $table->string('stock_amount');
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
        Schema::dropIfExists('stock_detals');
    }
}
