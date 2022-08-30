<?php

declare(strict_types=1);

use App\Enums\ElectricityEnum;
use App\Enums\ToiletEnum;
use App\Models\House;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(House::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->integer('number_rooms')->nullable();
            $table->integer('number_pieces')->nullable();
            $table->string('toilet')
                ->default(ToiletEnum::INTERNE);
            $table->boolean('electricity')
                ->default(ElectricityEnum::NOT_EXIST_ELECTRICITY);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('details');
    }
};
