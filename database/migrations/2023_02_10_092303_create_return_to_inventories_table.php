<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_to_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('customer_name')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('stock_type')->nullable();
            $table->string('qty')->nullable();
            $table->string('mrp')->nullable();
            $table->string('gst');
            $table->string('total_amount');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('return_to_inventories');
    }
};
