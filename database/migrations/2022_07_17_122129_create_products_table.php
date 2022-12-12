<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->text('title');
            $table->float('price');
            $table->bigInteger('category_id');
            $table->text('image_path');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->bigInteger('producer_id');           
            $table->text('description');
            $table->bigInteger('brand_id');           
            $table->integer('quantity');
            $table->tinyInteger('status');
            $table->text('sku');
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
