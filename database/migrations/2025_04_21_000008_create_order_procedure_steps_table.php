<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProcedureStepsTable extends Migration
{
    public function up()
    {
        Schema::create('order_procedure_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('procedure_id')->constrained('procedures');
            $table->foreignId('step_id')->constrained('procedure_steps');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('is_done')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_procedure_steps');
    }
}
