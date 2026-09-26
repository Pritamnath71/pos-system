<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('purchase_returns', function (Blueprint $table) {
            $table->id();

            $table->foreignId('purchase_id')
                  ->constrained('purchases')
                  ->cascadeOnDelete();

            $table->string('reference_no');

            $table->date('return_date');

            $table->integer('quantity');

            $table->decimal('amount', 15, 2);

            $table->text('reason')->nullable();

            $table->string('status')->default('Pending');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_returns');
    }
};