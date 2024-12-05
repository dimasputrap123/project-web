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
        Schema::create('hasil_surveys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_pred')->unsigned();
            $table->bigInteger('kategori_man')->unsigned();
            $table->bigInteger('rekomendasi_pred')->unsigned();
            $table->bigInteger('rekomendasi_man')->unsigned();
            $table->string('catatan', 255);
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
            $table->timestamps();
            // relation
            $table->foreign('kategori_pred')->references('id')->on("master_kategoris");
            $table->foreign('kategori_man')->references('id')->on("master_kategoris");
            $table->foreign('rekomendasi_pred')->references('id')->on("master_bantuans");
            $table->foreign('rekomendasi_man')->references('id')->on("master_bantuans");
            $table->foreign('created_by')->references('id')->on("users");
            $table->foreign('updated_by')->references('id')->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_surveys');
    }
};
