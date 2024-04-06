<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->ID();
            $table->text('article')->nullable();
            $table->text('autor')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }

    public function run()
    {
        DB::table('articles')->insert([
            'ID' => 1,
            'article' => 'Voy a hacerle una oferta que no podrá rechazar',
            'autor' => 'public',
        ]);
    }

    
};
