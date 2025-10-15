<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            if (!Schema::hasColumn('admins', 'name')) {
                $table->string('name')->nullable();
            }
            if (!Schema::hasColumn('admins', 'username')) {
                $table->string('username')->unique()->nullable();
            }
            if (!Schema::hasColumn('admins', 'email')) {
                $table->string('email')->unique()->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            // Kolom tidak dihapus pada rollback untuk keamanan data
        });
    }
};
