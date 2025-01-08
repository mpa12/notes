<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::table('products', static function (Blueprint $table) {
            $table->foreignId('product_category_id')->constrained('product_categories')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('products', static function (Blueprint $table) {
            $table->dropColumn('product_category_id');
        });
    }
};
