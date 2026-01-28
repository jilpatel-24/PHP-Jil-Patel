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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('p_name');
            $table->foreign('p_name')->references('id')->on('manage_products');
			
			$table->unsignedBigInteger('cust_name');
			$table->foreign('cust_name')->references('id')->on('customers');

            
			$table->string('t_price');
            $table->string('Address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
