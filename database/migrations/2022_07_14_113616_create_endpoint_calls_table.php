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
        Schema::create('endpoint_calls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('endpoint');
            $table->string('user_id');
            $table->string('created_at');
            $table->string('updated_at');
            $table->string('message_id');
            $table->string('uuid');
        });
    }
};
