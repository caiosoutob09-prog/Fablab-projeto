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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')->references('id')->on('locais')->onDelete('cascade');
            $table->integer('quantidade')->unsigned();
            $table->timestamp('horario_retirada')->useCurrent();
            $table->date('prazo');
            $table->timestamp('horario_devolucao')->nullable();
            $table->text('responsavel')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::table('emprestimos', function (Blueprint $table) {
            $table->dropForeign(['usuario_id']);
            $table->dropColumn('usuario_id');
        });
        
        Schema::dropIfExists('emprestimos');
    }
};
