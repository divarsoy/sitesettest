<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->boolean('is_active')->default(true);
            $table->integer('site_id')->unsigned()->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('site_id')
                ->references('id')->on('sites')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
