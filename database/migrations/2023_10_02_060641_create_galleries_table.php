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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('slug');
            $table->text('image');
            $table->boolean('status')->default(false)->comment('0==draft & 1==published');
            $table->foreignId('department_id')->nullable()
                ->constrained('id')
                ->on('departments')
                ->cascadeOnDelete();
            $table->foreignId('institute_id')->nullable()
                ->constrained('id')
                ->on('institutes')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('galleries');
    }
};