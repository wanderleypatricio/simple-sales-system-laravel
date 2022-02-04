<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 80);
            $table->string('cpf', 11);
            $table->string('email', 80);
            $table->string('rua', 40);
            $table->string('numero', 4);
            $table->string('bairro', 30);
            $table->string('cidade', 30);
            $table->string('complemento', 100);
            $table->string('uf', 2);
            $table->string('cep', 9);
            $table->string('data_nasc', 10);
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
        Schema::drop('clientes');
    }
}
