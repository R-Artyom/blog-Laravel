<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            // Таблицы
            $table->id()->comment('Уникальный идентификатор группы');
            $table->string('name')->comment('Название группы');
            $table->string('description')->comment('Описание группы');
            $table->timestamp('created_at')->useCurrent()->comment('Дата создания группы');
            $table->timestamp('updated_at')->useCurrent()->comment('Дата обновления группы');
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
        Schema::dropIfExists('roles');
    }
}
