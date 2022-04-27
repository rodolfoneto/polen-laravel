<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('sku', 32)->unique('products_sku_unique');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->text('excerpt')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('price_promotional')->nullable();
            $table->enum('type', ['simples','variable','variation'])->default('simples');
            $table->boolean('manage_stock')->default(false);
            $table->enum('stock_status', ['in_stock','out_stock'])->default(0);
            $table->boolean('b2b_highlights')->nullable();
            $table->decimal('b2b_price_from')->nullable();

            $table->enum('status',['publish','hidden','draft'])->index('product_status');

            $table->string('seo_title', 255);
            $table->text('seo_description');

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
};
