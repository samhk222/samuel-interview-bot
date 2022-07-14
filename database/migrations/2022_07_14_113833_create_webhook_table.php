<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webhook', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('method');
            $table->string('header');
            $table->string('body');
            $table->string('referer');
            $table->string('dt_chamada');
            $table->string('imported');
        });
    }
};
