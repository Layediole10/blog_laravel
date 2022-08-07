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
        Schema::create('articles', function (Blueprint $table) {
            
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->string("photo")->nullable();
            $table->date("publish_date")->nullable();
            $table->boolean("publish")->default(false);
            $table->unsignedBigInteger("author_id");
            $table->foreign("author_id")->references("id")->on("users");
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
        Schema::dropIfExists('articles');
    }
};
