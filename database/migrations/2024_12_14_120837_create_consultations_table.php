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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('consultation'); // Description of the consultation
            $table->string('day'); // Day of the consultation
            $table->string('doctor'); // Doctor's name
            // $table->decimal('price', 10, 2); // Price of the consultation (2 decimal places)
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
