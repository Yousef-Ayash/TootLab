<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepUsersTable extends Migration
{
    public function up()
    {
        Schema::create('step_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('step_id')->constrained('procedure_steps');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('step_users');
    }
}
