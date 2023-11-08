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
        Schema::create('llibres', function (Blueprint $table) {
            $table->id();
            $table->string('titol', 255);
            $table->string('autor', 255);
            $table->text('descripcio');
            $table->string('editorial', 255);
            $table->string('img_url', 512);
            $table->unsignedInteger('any');
            $table->decimal('preu', 8, 2);
            $table->string('isbn', 13);
            $table->unsignedInteger('stock')->default(0);
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('llibres');
    }
};
