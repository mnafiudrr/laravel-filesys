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
        Schema::create('td_camera_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_name')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_url')->nullable();
            $table->string('image_type')->nullable();
            $table->string('image_size')->nullable();
            $table->string('image_extension')->nullable();
            $table->string('image_mime')->nullable();
            $table->string('image_width')->nullable();
            $table->string('image_height')->nullable();
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
        Schema::dropIfExists('td_camera_images');
    }
};
