<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->index()->nullable();
            $table->string('image')->nullable();
            $table->string('designation')->nullable();
            $table->string('type')->nullable();
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
            $table->boolean('status')->default(true)->comment('0=>inactive,1=active');
            $table->boolean('deletable')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
