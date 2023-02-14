<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            // Таблицы
            $table->id()->comment('Уникальный идентификатор подписчика');
            $table->string('email')->useCurrent()->comment('Электронная почта подписчика');
            $table->string('token')->useCurrent()->comment('Уникальная последовательность символов для формирования защищенной от подбора ссылки для отписки');
            // Уникальные индексы
            $table->unique('id');
            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}
