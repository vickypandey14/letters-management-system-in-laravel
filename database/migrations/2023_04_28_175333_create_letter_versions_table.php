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
        Schema::create('letter_versions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('letter_id');
            $table->foreign('letter_id')->references('id')->on('letters')->onDelete('cascade');
            $table->unsignedBigInteger('editor_id');
            $table->foreign('editor_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('edited_date');
            $table->integer('version_number')->default(1);
            $table->text('content');
            $table->timestamps();
        });          
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_versions');
    }
};
