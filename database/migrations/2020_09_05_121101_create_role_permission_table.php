<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permission', function (Blueprint $table) {
            $table->foreignID('role_id')
                ->nullable()
                ->constrained('roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('permission_id')
                ->nullable()
                ->constrained('permissions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unique(['role_id', 'permission_id']);
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
        Schema::dropIfExists('role_permission');
    }
}
