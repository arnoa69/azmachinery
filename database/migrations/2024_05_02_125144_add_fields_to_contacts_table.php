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
        Schema::table('contacts', function (Blueprint $table) {
            // Flag for when a sales agent has contacted the potential client
            $table->boolean('contacted')->default(false);

            // Flag for when this contact has migrated to user table as a client
            $table->boolean('migrated_to_user')->default(false);

            // Add foreign key for relation to the new table to hold notices
            $table->unsignedBigInteger('notice_id')->nullable();
            $table->foreign('notice_id')->references('id')->on('notices')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('contacted');
            $table->dropColumn('migrated_to_user');
            $table->dropForeign(['notice_id']);
            $table->dropColumn('notice_id');
        });
    }
};
