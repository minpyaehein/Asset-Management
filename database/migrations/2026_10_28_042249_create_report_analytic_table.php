<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('report_analytics', function (Blueprint $table) {
            $table->id('report_id');
            $table->string('report_name');
            $table->text('description')->nullable();
            $table->dateTime('last_updated')->nullable();
            $table->string('availability');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('user_management')->cascadeOnDelete();
            
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('report_analytics');
    }
};
