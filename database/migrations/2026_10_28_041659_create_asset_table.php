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
        Schema::create('asset', function (Blueprint $table) {
            $table->string('asset_tag')->primary();
            $table->string('category');
            $table->string('asset_name');
            $table->string('model')->nullable();
            $table->string('serial_no')->nullable();
            $table->decimal('purchase_cost', 10, 2)->nullable();
            $table->string('location')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('warranty_end')->nullable();
            $table->text('note')->nullable();
            $table->dateTime('check_in')->nullable();
            $table->dateTime('check_out')->nullable();
            $table->string('transfer_id')->nullable();
            $table->string('asset_from')->nullable();
            $table->string('asset_to')->nullable();
            $table->date('transfer_date')->nullable();
            $table->string('status');
            $table->string('disposal_id')->nullable();
            $table->text('reason')->nullable();
            
            $table->string('staff_code')->nullable();
            $table->foreign('staff_code')->references('staff_code')->on('employee')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset');
    }
};
