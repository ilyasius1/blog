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
            $table->id('commentID');
            //$table->unsignedBigInteger('author')->index();
            $table->foreignId('author')
                ->references('userID')
                ->on('users')
                ->nullable()
                ->constrained()
                ->onDelete('set default')
                ->onUpdate('cascade');
//            $table->unsignedBigInteger('article')->index();
            $table->foreignId('article')
                ->references('articleID')
                ->on('articles')
                ->nullable()
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('text');
            $table->timestamp('created_at')->useCurrent();
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
