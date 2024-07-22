<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("testimonials", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("quote");
            $table->string("author");
            $table->string("label");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("testimonials");
    }
};
