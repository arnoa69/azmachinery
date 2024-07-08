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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('operation');
            $table->string('product_image')->nullable();
            $table->string('product_name');
            $table->string('product_code');
            $table->decimal('product_price', 10, 2);
            $table->string('type');
            $table->string('usage');
            $table->integer('weight_capacity');
            $table->string('slug')->unique();
            $table->string('slug_de')->unique();
            $table->string('slug_dk')->unique();
            $table->string('slug_ee')->unique();
            $table->string('slug_es')->unique();
            $table->string('slug_fi')->unique();
            $table->string('slug_fr')->unique();
            $table->string('slug_it')->unique();
            $table->string('slug_lu')->unique();
            $table->string('slug_ne')->unique();
            $table->string('slug_no')->unique();
            $table->string('slug_pt')->unique();
            $table->string('slug_se')->unique();
            $table->integer('total_length');
            $table->integer('total_width');
            $table->integer('width_used');
            $table->integer('length_inclined_plane');
            $table->integer('length_plateform_horizontal');
            $table->integer('length_lip_penetrating');
            $table->integer('entrance_tray_length');
            $table->integer('exit_lip_length');
            $table->decimal('slope_min', 10, 2);
            $table->decimal('slope_max', 10, 2);
            $table->integer('unloaded_weight');
            $table->integer('min_height');
            $table->integer('max_height');
            $table->boolean('hydraulic_leveler')->default(false);
            $table->string('amount_feet');
            $table->boolean('electric_leveler')->default(false);
            $table->integer('side_railings_height');
            $table->json('application')->nullable();
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
