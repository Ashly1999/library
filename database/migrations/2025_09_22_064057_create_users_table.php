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
            $table->bigIncrements('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default(1)->comment('1:Admin,0:User');
            $table->string('membership_no');
            $table->string('address');
            $table->string('image');
            $table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('set null');
            $table->string('status')->default(1)->comment('1:Assigned,0:Not Assigned');
            $table->date('join_date');
            $table->date('issue_date')->nullable();
            $table->date('due_date')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
