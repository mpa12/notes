<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('notes', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name');
            $table->string('slug')->comment('Slug');
            $table->text('description')->comment('Description');
            $table->timestamps();
            $table->softDeletes();

            $table->comment('Notes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
