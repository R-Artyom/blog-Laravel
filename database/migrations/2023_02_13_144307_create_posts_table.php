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
            // Таблицы
            $table->id()->comment('Уникальный идентификатор статьи');
            $table->string('title')->comment('Заголовок статьи');
            $table->text('short_text')->comment('Краткое описание статьи');
            $table->text('text')->comment('Текст статьи');
            $table->string('img_name')->default('default.jpg')->comment('Название файла с изображением к статье');
            $table->timestamp('created_at')->useCurrent()->comment('Дата и время создания статьи');
            $table->timestamp('updated_at')->useCurrent()->comment('Дата и время обновления данных статьи');
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
        Schema::dropIfExists('posts');
    }
}
