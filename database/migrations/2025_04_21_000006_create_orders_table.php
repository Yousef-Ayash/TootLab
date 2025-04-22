<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('order_number');
            $table->string('center_name');
            $table->string('patient_name');
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->text('notes')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->decimal('final_cost', 10, 2)->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'order_number']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
