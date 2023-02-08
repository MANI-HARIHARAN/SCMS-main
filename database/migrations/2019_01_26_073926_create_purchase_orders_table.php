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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('bill_type');
            $table->string('company_name');
            $table->string('po_no');
            $table->string('po_date');
            $table->string('brand_name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('uom')->nullable();
            $table->string('qty')->nullable();
            $table->string('gst')->nullable();
            $table->string('mrp')->nullable();
            $table->string('wrate')->nullable();
            $table->string('rrate')->nullable();
            $table->string('orate')->nullable();
            $table->string('product_total');
            $table->string('grand_total');
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
        Schema::dropIfExists('purchase_orders');
    }
};
