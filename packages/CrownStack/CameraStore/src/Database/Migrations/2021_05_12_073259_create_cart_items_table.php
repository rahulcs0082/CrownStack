<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity')->unsigned()->default(0);
            $table->string('name')->nullable();

            $table->decimal('price', 12,4)->default(1);
            $table->decimal('base_price', 12,4)->default(0);

            $table->decimal('total', 12,4)->default(0);
            $table->decimal('base_total', 12,4)->default(0);

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade');
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
        Schema::dropIfExists('cart_items');
    }
}
