<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->text('long_description')->nullable();
            $table->float('price');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'fk_category_products')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
             $table->enum('activo', ['SI', 'NO']);
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
