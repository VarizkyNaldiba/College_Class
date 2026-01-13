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
        Schema::table('m_barang', function (Blueprint $table) {
            $table->decimal('margin_persen', 5, 2)->default(0)->after('harga_jual')->comment('Margin dalam persen');
            $table->integer('margin_nominal')->default(0)->after('margin_persen')->comment('Margin dalam rupiah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_barang', function (Blueprint $table) {
            $table->dropColumn(['margin_persen', 'margin_nominal']);
        });
    }
};
