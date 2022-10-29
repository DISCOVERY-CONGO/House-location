<?php

declare(strict_types=1);

use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Reservation::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->date('payment_date');
            $table->string('code_transaction');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
