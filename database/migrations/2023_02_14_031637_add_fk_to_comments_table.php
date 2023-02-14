<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Простые индексы
            $table->index('post_id', 'comment_post_idx');
            $table->index('user_id', 'comment_user_idx');
            // Внешние ключи
            $table->foreign('post_id', 'comment_post_fk')
                ->references('id')->on('posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id', 'comment_user_fk')
                ->references('id')->on('users')
                ->onDelete('cascade')
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
        Schema::table('comments', function (Blueprint $table) {
            // Сначала удаление внешних ключей
            $table->dropForeign('comment_post_fk');
            $table->dropForeign('comment_user_fk');
            // Затем индексов
            $table->dropIndex('comment_post_idx');
            $table->dropIndex('comment_user_idx');
        });
    }
}
