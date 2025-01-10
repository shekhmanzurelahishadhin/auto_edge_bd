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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('slug');
            $table->longText('description');
            $table->string('image');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('event_venue')->nullable();
            $table->string('fee')->nullable();
            $table->boolean('status')->default(1)->comment('0=>inactive,1=active');
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
        Schema::dropIfExists('events');
    }
};
