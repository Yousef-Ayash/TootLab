<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProceduresTable extends Migration
{
    public function up()
    {
        Schema::create('order_procedures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('procedure_id')->constrained('procedures');
            $table->foreignId('order_id')->constrained('orders');
            $table->unsignedTinyInteger('tooth_number');
            $table->foreignId('color_id')->constrained('colors');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_procedures');
    }
}
