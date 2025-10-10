<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Indonesia
            $table->string('name_en')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable(); // Indonesia
            $table->text('description_en')->nullable();
            $table->string('shopee_url')->nullable();
            $table->string('tokopedia_url')->nullable();
            $table->string('button_label')->nullable(); // Indonesia
            $table->string('button_label_en')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void
    {
    Schema::dropIfExists('products');
    }
};
