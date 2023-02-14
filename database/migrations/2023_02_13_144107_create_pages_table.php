<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            // Таблицы
            $table->id()->comment('Уникальный идентификатор статичной страницы');
            $table->string('title', 30)->comment('Заголовок страницы');
            $table->text('text')->comment('Текст страницы');
            $table->string('img_name')->default('default.jpg')->comment('Название файла с изображением к странице');
            $table->timestamp('created_at')->useCurrent()->comment('Дата создания страницы');
            $table->timestamp('updated_at')->useCurrent()->comment('Дата обновления страницы');
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
        Schema::dropIfExists('pages');
    }
}
