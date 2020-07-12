<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->foreignID('post_id')
//                ->references('id')
//                ->on('posts')
                ->nullable()
                ->constrained('posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('tag_id')
//                ->references('id')
//                ->on('tags')
                ->nullable()
                ->constrained('tags')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('post_tag');
    }
}
