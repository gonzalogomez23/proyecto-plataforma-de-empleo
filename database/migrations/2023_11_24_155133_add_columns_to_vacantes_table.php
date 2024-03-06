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
        Schema::table('vacantes', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->date('last_day');
            $table->text('description');
            $table->string('image');
            $table->integer('published')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->dropForeign('vacantes_categoria_id_foreign');
            $table->dropForeign('vacantes_salario_id_foreign');
            $table->dropForeign('vacantes_user_id_foreign');
            $table->dropColumn(['title', 'salario_id', 'categoria_id', 'company', 'last_day', 'description', 'image', 'published', 'user_id']);
        });
        /* Schema::dropColumns('vacantes', ['title', 'salario_id', 'categoria_id', 'last_day', 'description', 'image', 'published', 'user_id'] ); */
    }
};
