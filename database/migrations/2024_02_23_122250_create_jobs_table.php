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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('jobtype_id');
            $table->foreign('jobtype_id')->references('id')->on('jobtypes')->onDelete('cascade');
            $table->integer('vacancy');
            $table->integer('status')->default(1);
            $table->integer('isFeatured')->default(0);
            $table->string('salary')->nullable();
            $table->string('location');
            $table->text('description')->nullable();
            $table->text('benefits')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('qualifications')->nullable();
            $table->text('keywords')->nullable();
            $table->string('experience')->nullable();
            $table->string('company_name');
            $table->string('company_location')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
