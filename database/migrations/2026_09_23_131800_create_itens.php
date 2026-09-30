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
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')->references('id')->on('locais')->onDelete('cascade');
            $table->string('nome', 100);
            $table->integer('quantidade_total');
            $table->integer('quantidade_disponivel');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
     {
        Schema::table('itens', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
            $table->dropColumn('categoria_id');
            $table->dropForeign(['local_id']);
            $table->dropColumn('local_id');
        });
        
        Schema::dropIfExists('itens');
    }
};
