<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable1 extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas');
            $table->string('aprasymas');
            $table->unsignedBigInteger('fk_Kategorijaid_Kategorija'); // Corrected column definition
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('fk_Kategorijaid_Kategorija')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategorijos');
    }
}
