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
            // Таблицы
            $table->id()->comment('Уникальный идентификатор комментария');
            $table->unsignedBigInteger('post_id')->comment('Уникальный идентификатор статьи');
            $table->unsignedBigInteger('user_id')->comment('Уникальный идентификатор пользователя');
            $table->text('text')->comment('Текст статьи');
            $table->tinyInteger('active')->default('0')->comment('Признак активности комментария (одобрено(1) / не одобрено(0))');
            $table->timestamp('created_at')->useCurrent()->comment('Дата и время создания комментария');
            $table->timestamp('updated_at')->useCurrent()->comment('Дата и время обновления данных комментария');
            // Уникальные индексы
            $table->unique('id');

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
