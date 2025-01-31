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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')
                ->constrained('id')
                ->on('brands')
                ->cascadeOnDelete();
            $table->foreignId('model_id')->nullable()
                ->constrained('id')
                ->on('vehicle_models')
                ->cascadeOnDelete();
            $table->foreignId('year_id')->nullable()
                ->constrained('id')
                ->on('years')
                ->cascadeOnDelete();
            $table->foreignId('fuel_type_id')->nullable()
                ->constrained('id')
                ->on('fuel_types')
                ->cascadeOnDelete();
            $table->text('title');
            $table->text('slug');
            $table->text('short_description');
            $table->longText('description');
            $table->text('main_image');
            $table->boolean('status')->default(true)->comment('0==active & 1==inactive');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
