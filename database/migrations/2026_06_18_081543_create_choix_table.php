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
        Schema::create('choixes', function (Blueprint $table) {
            $table->id("id_choix");
            $table->string("nom_choix");
            $table->integer("valeur_choix");

            $table->foreignId("id_question")->constrained("questions", "id_question")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choixes');
    }
};
