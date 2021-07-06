<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('language');
            $table->text('description');
            $table->date('releas_date');
            $table->string('image');
            $table->string('file');
            $table->enum('status',['active','inactive']);
            $table->foreignId('category_id')->constrained('categories','id');
            $table->foreignId('author_id')->constrained('authors','id');
            $table->foreignId('user_id')->constrained('users','id');
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
        Schema::dropIfExists('books');
    }
}
