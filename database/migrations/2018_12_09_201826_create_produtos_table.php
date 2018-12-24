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
            $table->string('nome');
            $table->string('slug');
            $table->text('descricao');
            $table->decimal('valor', 5, 2)->default(0);
            $table->decimal('peso', 5, 2)->default(0);
            $table->decimal('largura', 5, 2)->default(0);
            $table->decimal('altura', 5, 2)->default(0);
            $table->decimal('comprimento', 5, 2)->default(0);
            $table->string('image');
            $table->enum('tamanho', ['P','M', 'G','GG','ND'])->default('ND');
            $table->enum('ativo', ['S','N'])->default('S');
            $table->integer('quantidade')->default(0);
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
