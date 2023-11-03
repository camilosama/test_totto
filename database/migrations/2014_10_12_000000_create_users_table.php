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
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('email')->unique();
            $table->integer('document');
            $table->string('name');
            $table->string('last_name');
            $table->integer('phone');
            $table->string('deparment');
            $table->string('city');
            $table->string('birth_date');
            $table->string('have_children');
            $table->integer('gener');
            $table->integer('is_edit')->default(0);
            $table->timestamp('create_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
