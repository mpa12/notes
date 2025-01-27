<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('product_images', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('url')->comment('URL or path to the image file');
            $table->string('alt_text')->nullable()->comment('Text for the alt attribute');
            $table->integer('position')->comment('Image display order (for sorting)');
            $table->boolean('is_main')
                ->comment('Flag indicating whether the image is the main one for the product');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
