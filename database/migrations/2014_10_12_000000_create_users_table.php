<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // Таблицы
            $table->id()->comment('Уникальный идентификатор пользователя');
            $table->unsignedBigInteger('role_id')->default('2')->comment('Роль пользователя на сайте');
            $table->string('name')->comment('Имя пользователя');
            $table->string('email')->comment('Электронная почта (логин)');
            $table->string('password')->comment('Пароль (в зашифрованном виде)');
            $table->string('img_name')->comment('Аватар (название файла)');
            $table->string('about_me')->default('')->comment('Краткая информация о себе');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent()->comment('Дата и время регистрации пользователя');
            $table->timestamp('updated_at')->useCurrent()->comment('Дата и время обновления данных пользователя');
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
        Schema::dropIfExists('users');
    }
}
