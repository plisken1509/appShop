<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('cart_id')->unsigned();
            $table->foreign('cart_id', 'fk_cart_cartdatails')->references('id')->on('carts')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('product_id', 'fk_cartsdetails_products')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('quantity');
            $table->integer('discount')->default(0);//en porcentaje
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
        Schema::dropIfExists('cart_details');
    }
}
