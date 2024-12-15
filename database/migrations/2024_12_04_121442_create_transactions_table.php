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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('receipt_name');
            $table->text('address');
            $table->string('village');
            $table->string('post_code');
            $table->string('subdistrict');
            $table->string('regency');
            $table->string('province');
            $table->string('email');
            $table->string('phone_number');
            $table->string('product');
            $table->integer('price')->default(0);
            $table->enum('status', ['PAID', 'UNPAID'])->default('UNPAID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
