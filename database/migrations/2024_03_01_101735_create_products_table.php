<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('mobile');
            $table->string('base_name')->default('star');
            $table->string('version');
            $table->decimal('base_price', 10, 2);
            $table->integer('weight_capacity')->nullable();
            $table->integer('total_length')->nullable();
            $table->integer('total_width')->nullable();
            $table->integer('width_used')->nullable();
            $table->integer('length_inclined_plane')->nullable();
            $table->integer('length_plateform_horizontal')->nullable();
            $table->integer('length_lip_penetrating')->nullable();
            $table->integer('entrance_tray_length')->nullable();
            $table->integer('exit_lip_length')->nullable();
            $table->decimal('slope_min', 10, 2)->nullable();
            $table->decimal('slope_max', 10, 2)->nullable();
            $table->string('unloaded_weight')->nullable();
            $table->integer('min_height')->nullable();
            $table->integer('max_height')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
