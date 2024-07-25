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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_a_menu')->default(0);
            $table->string('description',150);
            $table->string('code',16)->unique();
            $table->string('permission',100);
            $table->bigInteger('parent')->nullable();
            $table->string('icon',50)->nullable();
            $table->string('permalink',100)->nullable();
            $table->string('root')->nullable();
            $table->bigInteger('created_by');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
