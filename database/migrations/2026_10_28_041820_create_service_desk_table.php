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
        Schema::create('service_desk', function (Blueprint $table) {
           $table->id('service_id');
            $table->text('request_note');
            $table->string('staff_code');
            $table->string('priority');
            $table->date('date');
            $table->string('status');
            $table->string('asset_tag');

            $table->foreign('staff_code')->references('staff_code')->on('employee')->cascadeOnDelete();
            $table->foreign('asset_tag')->references('asset_tag')->on('asset')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_desk');
    }
};
