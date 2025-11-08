<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Check if column exists before trying to drop it
        if (Schema::hasColumn('products', 'video')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('video');
            });
        }
    }

    public function down(): void
    {
        // Do nothing for rollback
    }
};
