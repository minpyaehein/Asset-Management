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
        Schema::create('maintenance', function (Blueprint $table) {
           $table->id('maintenance_id');
            $table->string('asset_tag');
            $table->string('maintenance_type');
            $table->date('completed_date')->nullable();
            $table->string('staff_code');
            $table->string('status');
            $table->text('note')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('maintenance_task');
            $table->date('due_date')->nullable();
            $table->string('priority');

            $table->foreign('asset_tag')->references('asset_tag')->on('asset')->cascadeOnDelete();
            $table->foreign('staff_code')->references('staff_code')->on('employee')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance');
    }
};
