<?php

declare(strict_types=1);

use App\Enums\HouseEnum;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->integer('prices');
            $table->integer('warranty_price')->nullable();
            $table->json('address')->default("[]");
            $table->string('phone_number')
                ->nullable()
                ->default("+243990416691");
            $table->string('email')
                ->nullable()
                ->default("info@karibukwako.com");
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->boolean('status')
                ->default(HouseEnum::PENDING_HOUSE);
            $table->string('reference')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('houses');
    }
};
