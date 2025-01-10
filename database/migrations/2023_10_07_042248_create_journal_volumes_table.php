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
        Schema::create('journal_volumes', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('slug');
            $table->string('writer_name');
            $table->string('keywords')->nullable();
            $table->text('abstract')->nullable();
            $table->text('attachment');
            $table->foreignId('journal_id')->nullable()
                ->constrained('id')
                ->on('journals')
                ->cascadeOnDelete();
            $table->foreignId('volume_id')->nullable()
                ->constrained('id')
                ->on('volumes')
                ->cascadeOnDelete();
            $table->foreignId('issue_id')->nullable()
                ->constrained('id')
                ->on('volume_issues')
                ->cascadeOnDelete();
            $table->boolean('status')->default(false)->comment('0==unpublished & 1==published');
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
        Schema::dropIfExists('journal_volumes');
    }
};
