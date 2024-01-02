<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('gamintojai', function (Blueprint $table) {
        $table->id('id_Gamintojas'); // This line makes it an auto-incrementing primary key
        $table->string('Gamintojas')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gamintojai');
    }
};
