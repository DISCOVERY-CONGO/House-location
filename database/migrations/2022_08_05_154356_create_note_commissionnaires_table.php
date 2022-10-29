<?php

declare(strict_types=1);

use App\Models\Commissioner;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('note_commissionnaires', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Commissioner::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->Integer('note');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('note_commissionnaires');
    }
};
