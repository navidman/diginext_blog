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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('user_username');
            $table->foreign('user_username')->references('username')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');


            $table->unsignedBigInteger('parent_id')->default(0);


            $table->boolean('approved')->default(0);
            $table->text('text');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
