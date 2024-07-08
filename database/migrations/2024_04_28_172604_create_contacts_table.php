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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('company_name')->nullable()->change();
            $table->string('phone_number')->nullable()->change();
            $table->string('locale')->nullable()->change();
            $table->string('source')->nullable()->change();
            $table->text('message')->nullable()->change();
            $table->string('pipedrive_state')->nullable()->change();
            $table->timestamp('pipedrive_state_change_date')->nullable()->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
