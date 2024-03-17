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
        Schema::create('goal_one_metas', function (Blueprint $table) {
            $table->id();
            $table->string('indicator');
            $table->string('target');
            $table->string('goal');
            $table->string('contact_persons');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goal_one_metas');
    }
};
