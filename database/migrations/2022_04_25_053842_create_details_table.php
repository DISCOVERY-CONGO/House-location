<?php
declare(strict_types=1);

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
            $table->string('key')->unique();
            $table->foreignIdFor(House::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->integer('chamberNumber')->nullable();
            $table->string('electricity')->nullable();
            $table->integer('roomNumber')->nullable();
            $table->integer('toilette')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('details');
    }
};
