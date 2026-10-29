<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('acknowledgement', function (Blueprint $table) {
            $table->id('ack_id');
            $table->string('staff_code');
            $table->string('asset_tag');
            $table->date('issue_date');
            $table->date('ack_date')->nullable();
            $table->string('status');

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
        Schema::dropIfExists('acknowledgement');
    }
};
