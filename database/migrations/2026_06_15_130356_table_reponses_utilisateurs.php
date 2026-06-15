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
        Schema::create("reponses_utilisateurs", function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user")->constrained("users")->cascadeOnDelete();
            $table->foreignId("id_choix")->constrained("choix_predefinis")->cascadeOnDelete();
            $table->unique(["id_user", "id_choix"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("reponses_utilisateurs");
    }
};
