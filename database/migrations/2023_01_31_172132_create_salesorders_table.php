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
        Schema::create('salesorders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('route');
            $table->string('company_name');
            $table->string('bill_type');
            $table->string('brand_name');
            $table->string('product_name');
            $table->string('uom');
            $table->string('qty');
            $table->string('gst');
            $table->string('rate');
            $table->string('product_total');
            $table->string('grand_total');
            $table->string('cash_received');
            $table->string('balance');
            $table->string('total_outstanding');
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
        Schema::dropIfExists('salesorders');
    }
};
