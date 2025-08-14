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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('book_id');
            $table->string('title');
            $table->string('author');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('category_id')->on('categorys');
            $table->string('langauge');
            $table->string('publisher');
            $table->string('no_of_pages');
            $table->string('status')->default(1)->comment('1:Available,0:Non_avaialable');
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
