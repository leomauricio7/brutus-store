<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->decimal('valor', 5, 2);
            $table->decimal('peso', 5, 2);
            $table->decimal('largura', 5, 2);
            $table->decimal('comprimento', 5, 2);
            $table->enum('status', ['Ativo','Inativo']);
            $table->integer('quantidade');
            //$table->integer('categoria_id')->unsigned();
            //$table->foreign('categoria_id')->references('id')->on('categorias')->onDelete();
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
        Schema::dropIfExists('produtos');
    }
}
