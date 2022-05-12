<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('surname')->comment('Фамилия');
            $table->string('name')->comment('Иия');
            $table->string('patronymic')->nullable()->comment('Отчество');
            $table->string('email')->unique()->comment('Почта');
            $table->date('birthday')->comment('День рождение');
            $table->date('date_of_issue')->comment('Паспорт дата выдачи');
            $table->text('birthday_place')->comment('Паспорт место рождения');
            $table->unsignedInteger('series')->comment('Паспорт серия');
            $table->unsignedInteger('number')->comment('Паспорт номер');
            $table->text('issued_by')->comment('Паспорт кем выдан');
            $table->text('propiska')->comment('Паспорт адрес регистрации');
            $table->timestamp('email_verified_at')->nullable()->comment('Дата подтверждения почты');
            $table->string('password')->comment('Пароль');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
