<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->id('articleID');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->longText('text');
            $table->text('img')->nullable();
            $table->foreignId('created_by')
                ->references('userID')
                ->on('users')
                ->nullable()
                ->constrained()
                ->onDelete('set default')
                ->onUpdate('cascade');
            $table->foreignId('modified_by')
                ->references('userID')
                ->on('users')
                ->nullable()
                ->constrained()
                ->onDelete('set default')
                ->onUpdate('cascade');
//            $table->timestamps();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));//useCurrent();
            $table->timestamp('modified_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
}
