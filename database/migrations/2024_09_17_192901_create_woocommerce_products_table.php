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
        Schema::create('woocommerce_products', function (Blueprint $table) {
            $table->id();
            $table->string('order_id', 100)->nullable();
            $table->longText('order_uuid', 100)->nullable();
            $table->longText('name')->nullable();
            $table->string('product_id', 100)->nullable();
            $table->string('variation_id', 100)->nullable();
            $table->string('quantity', 100)->nullable();
            $table->string('tax_class', 100)->nullable();
            $table->string('subtotal', 100)->nullable();
            $table->string('subtotal_tax', 100)->nullable();
            $table->string('total', 100)->nullable();
            $table->string('total_tax', 100)->nullable();
            $table->string('taxes', 100)->nullable();
            $table->string('sku', 100)->nullable();
            $table->string('price', 100)->nullable();
            $table->longText('image')->nullable();
            $table->string('parent_name', 100)->nullable();
            $table->string('unique_id', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('woocommerce_products');
    }
};
