<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('synopses', function (Blueprint $table) {
            $table->renameColumn('link', 'links');
            $table->json("links")->change();
            $table->integer("year")->change();
            $table->boolean("shown")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('synopses', function (Blueprint $table) {
            $table->renameColumn('links', 'link');
            $table->string("link")->change();
            $table->date("year")->change();
            $table->dropColumn("shown");
        });
    }
};
