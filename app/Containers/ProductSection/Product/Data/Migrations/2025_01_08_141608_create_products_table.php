<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('products', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Product name');
            $table->string('slug')->comment('Unique product identifier for URL');
            $table->text('description')->comment('Full product description');
            $table->text('short_description')->comment('Brief description of the product');
            $table->decimal('price')->comment('Product price');
            $table->decimal('old_price')->nullable()->comment('Old price (if there is a discount)');
            $table->integer('stock')->comment('Quantity of product in stock');
            $table->string('sku')->nullable()->comment('Unique product code (article)');
            $table->integer('status')->comment('Product status');
            $table->boolean('is_featured')->comment('Featured Product or Bestseller Flag');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
