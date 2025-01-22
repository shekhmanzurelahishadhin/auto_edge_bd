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
        Schema::create('page_titles', function (Blueprint $table) {
            $table->id();
            $table->string('page_name')->unique();
            $table->string('page_title');
            $table->string('page_sub_title')->nullable();
            $table->boolean('status')->default(1)->comment('0==inactive & 1==active');
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
        Schema::dropIfExists('page_titles');
    }
};
