<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('product_categories', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Category name');
            $table->string('slug')->comment('Unique category identifier for URL');
            $table->text('description')->nullable()->comment('Category Description');
            $table->bigInteger('parent_id')->nullable()->comment('Indicates the parent category');
            $table->string('image')->nullable()->comment('Link to category icon');
            $table->integer('status')->comment('Category Status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
