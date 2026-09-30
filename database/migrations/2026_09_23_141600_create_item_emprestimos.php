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
        Schema::create('item_emprestimos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('itens')->onDelete('cascade');
            $table->unsignedBigInteger('emprestimo_id');
            $table->foreign('emprestimo_id')->references('id')->on('emprestimos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_emprestimos', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
            $table->dropColumn('item_id');
            $table->dropForeign(['emprestimo_id']);
            $table->dropColumn('emprestimo_id');
        });
        Schema::dropIfExists('item_emprestimos');
    }
};
