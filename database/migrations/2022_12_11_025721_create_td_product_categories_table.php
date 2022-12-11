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
        Schema::create('td_product_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('td_products')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('td_categories')->onDelete('cascade');
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
        Schema::dropIfExists('td_product_categories');
    }
};
