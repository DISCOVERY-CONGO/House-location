<?php

declare(strict_types=1);

use App\Models\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $types = ['Maison à vendre', 'Maison à Louer', 'Autre'];

        foreach ($types as $type) {
            Type::query()
                ->create([
                    'name' => $type,
                ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
};
