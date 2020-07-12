<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->id();
            $table->foreignId('user_id')
//                ->references('id')
//                ->on('users')
                ->nullable()
                ->constrained('users')
                ->onDelete('set default')
                ->onUpdate('cascade');
            $table->foreignId('post_id')
//                ->references('id')
//                ->on('posts')
                ->nullable()
                ->constrained('posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('text');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
