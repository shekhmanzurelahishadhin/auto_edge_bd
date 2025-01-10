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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('slug');
            $table->longText('description');
            $table->string('attachment')->nullable();
            $table->date('published_at');
            $table->string('notice_type')->nullable();
            $table->boolean('status')->default(false)->comment('0==draft & 1==published');
            $table->foreignId('department_id')->nullable()
                ->constrained('id')
                ->on('departments')
                ->cascadeOnDelete();
            $table->foreignId('institute_id')->nullable()
                ->constrained('id')
                ->on('institutes')
                ->cascadeOnDelete();
            $table->foreignId('office_id')->nullable()
                ->constrained('id')
                ->on('offices')
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
        Schema::dropIfExists('notices');
    }
};
