<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ## Adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function(Blueprint $table){
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        ## Atribuindo a nova coluna para o campo já existente
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        ## Criação da FK e remover a coluna motivo_contato
        Schema::table('site_contatos', function(Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        ## Criar a coluna motivo_contato e remover a FK
        Schema::table('site_contatos', function(Blueprint $table){
            $table->integer('motivo_contatos');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        ## Atribuindo a motivos_contatos_id para a motivo_contatos
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        ## Remover a coluna motivo_contatos_id
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
