<?php
declare(strict_types=1);

use App\Enums\HouseEnum;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->integer('prices');
            $table->string('commune');
            $table->string('town');
            $table->string('district');
            $table->string('address');
            $table->integer('guarantees');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->string('images');
            $table->boolean('status')
                ->default(HouseEnum::PENDING_HOUSE);
            $table->string('reference')->unique();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('houses');
    }
};
