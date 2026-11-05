<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up(): void
{
    Schema::table('publications', function (Blueprint $table) {
        $table->string('image')->nullable()->after('contenu');
        $table->string('titre')->unique()->change(); // <-- Ajout de la contrainte unique
    });
}
    /**
     * Reverse the migrations.
     */
   public function down(): void
{
    Schema::table('publications', function (Blueprint $table) {
        $table->dropUnique(['titre']); // <-- Annule l'unique
        $table->dropColumn('image');
    });
}
};
