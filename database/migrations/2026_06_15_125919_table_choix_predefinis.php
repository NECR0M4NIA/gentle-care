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
        Schema::create("choix_predefinis", function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_question")->constrained("questions")->cascadeOnDelete();
            $table->unique(["id_question"]);
            $table->string("titre_choix");
            $table->integer("valeur_score");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("choix_predefinis");
    }
};
