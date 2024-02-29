<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seller_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->foreignId('category_id')->constrained('product_categories');
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->integer('quantity')->default(0);
            $table->boolean('instock');
            $table->string('description');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_products');
    }
};
