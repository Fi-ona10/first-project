<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Spalte nur hinzufügen, wenn sie noch nicht existiert
            if (!Schema::hasColumn('articles', 'user_id')) {
                $table->unsignedBigInteger('user_id');

                // Foreign Key hinzufügen
                $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->cascadeOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Foreign Key zuerst entfernen
            $table->dropForeign(['user_id']);
            
            // Spalte entfernen
            $table->dropColumn('user_id');
        });
    }
};
