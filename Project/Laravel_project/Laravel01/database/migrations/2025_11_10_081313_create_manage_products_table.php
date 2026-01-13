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
        Schema::create('manage_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cate_id');
            $table->foreign('cate_id')->references('id')->on('manage_categories');

            $table->string('product_name');
            $table->string('product_description');
            $table->string('product_price');
            $table->string('product_img');
            $table->enum('status',['Block','Unblock'])->default('Unblock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manage_products');
    }
};
