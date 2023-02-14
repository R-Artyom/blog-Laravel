<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            // Таблицы
            $table->id()->comment('Уникальный идентификатор настройки');
            $table->string('name')->comment('Название настройки');
            $table->string('value')->comment('Значение настройки');
            $table->string('description')->comment('Описание настройки');
            $table->timestamp('created_at')->useCurrent()->comment('Дата и время создания настройки');
            $table->timestamp('updated_at')->useCurrent()->comment('Дата и время обновления настройки');
            // Уникальные индексы
            $table->unique('id');
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
