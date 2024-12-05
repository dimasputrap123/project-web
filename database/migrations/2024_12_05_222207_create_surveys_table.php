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
        Schema::create('surveys', function (Blueprint $table) {
            $table->bigInteger('id_survey')->unsigned();
            $table->bigInteger('id_kpm')->unsigned();
            $table->bigInteger('id_asesmen')->unsigned();
            $table->string('text_jawaban', 255);
            // relation
            $table->foreign('id_survey')->references('id')->on("hasil_surveys");
            $table->foreign('id_kpm')->references('id')->on("kpms");
            $table->foreign('id_asesmen')->references('id')->on("master_asesmens");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
