<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Простой индекс
            $table->index('role_id','user_role_idx');

            // Внешний ключ - ссылка на столбец id в таблице roles
            $table->foreign('role_id', 'user_role_fk')
                ->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Сначала удаление внешних ключей
            $table->dropForeign('user_role_fk');
            // Затем индексов
            $table->dropIndex('user_role_idx');
        });
    }
}
