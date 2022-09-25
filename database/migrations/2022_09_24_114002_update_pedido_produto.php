<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePedidoProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedido_produtos', function(Blueprint $table){
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')
                  ->references('id')
                  ->on('clientes')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido_produtos', function(Blueprint $table){
            $table->dropColumn('cliente_id');
            $table->dropForeign('cliente_id')
                  ->references('id')
                  ->on('clientes')
                  ->onDelete('cascade');
        });
    }
}
