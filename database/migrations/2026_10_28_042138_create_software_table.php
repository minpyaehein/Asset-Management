<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('software', function (Blueprint $table) {
            $table->id('software_id');
            $table->string('product');
            $table->string('vendor');
            $table->string('license_key')->nullable();
            $table->integer('purchased_seat')->default(1);
            $table->date('expiry_date')->nullable();
            $table->string('software_name');
            $table->string('asset_tag');
            $table->string('employee')->nullable();
            $table->date('install_date')->nullable();
            $table->string('status');
            $table->date('purchase_date')->nullable();
            $table->string('warranty_period')->nullable();

            $table->foreign('asset_tag')->references('asset_tag')->on('asset')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('software');
    }
};
