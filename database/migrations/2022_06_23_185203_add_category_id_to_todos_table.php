<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Creamos con el comando 'php artisan make:migration add_category_id_to_todos_table --table=todos'

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned();
            $table
                ->foreign('category_id') // la llave foranea.
                ->references('id') // referencia
                ->on('categories') // donde se ubica la referencia
                ->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todos', function (Blueprint $table) {
            //
        });
    }
};
