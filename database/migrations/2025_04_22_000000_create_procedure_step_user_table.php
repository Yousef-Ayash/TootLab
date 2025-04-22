<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('procedure_step_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('procedure_step_id')
                ->constrained('procedure_steps')
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['procedure_step_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('procedure_step_user');
    }
};
