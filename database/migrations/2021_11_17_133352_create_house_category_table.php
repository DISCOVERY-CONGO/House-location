<?php

declare(strict_types=1);

use App\Models\Category;
use App\Models\House;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('house_category', function (Blueprint $table) {
            $table->foreignIdFor(House::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Category::class)
                ->constrained()
                ->cascadeOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('house_category');
    }
};
