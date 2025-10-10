<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_landings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_subtitle_top')->nullable();
            $table->string('hero_subtitle_bottom')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('product_landings');
    }
};
