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
            $table->string('brand_name');
            $table->string('product_name');
            $table->string('uom');
            $table->string('qty');
            $table->string('gst');
            $table->string('mrp');
            $table->string('gst');
            $table->string('wrate');
            $table->string('rrate');
            $table->string('orate');
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
