<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->text('info');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
