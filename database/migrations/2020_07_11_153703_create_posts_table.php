<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->id();
            $table->foreignID('user_id')
//                ->references('id')
//                ->on('users')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('image', 255)->nullable();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->string('tagline', 255)->nullable();
            $table->text('announce')->nullable();
            $table->text('fulltext')->nullable();
//            $table->integer('views_count', 255)->nullable()->default(null);
//            $table->boolean('is_active')->default(TRUE);
//            $table->boolean('is_favorite')->default(FALSE);
            $table->timestamp('active_from')->nullable();
            $table->timestamp('active_to')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
