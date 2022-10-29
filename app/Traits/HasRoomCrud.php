<?php

declare(strict_types=1);

namespace App\Traits;

use App\Events\ApartmentCreateEvent;
use App\Models\Detail;
use App\Models\House;
use App\Models\Image;
use App\Models\TemporaryImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait HasRoomCrud
{
    use HasUpload;

    public function created($attributes): Builder|Model
    {
        $temporary = TemporaryImage::query()
            ->where('user_id', '=', auth()->id())
            ->get();
        $apartment = $this->storeHouse($attributes);
        if ($temporary !== null) {
            $temporary->each(function ($images) use ($apartment) {
                Image::query()
                   ->create([
                       'user_id' => auth()->id(),
                       'images' => $images->file,
                       'house_id' => $apartment->id
                   ]);
            });
            $apartment->categories()->attach($attributes->input('categories'));
            $this->createDetails($apartment, $attributes);
            $temporary->map(fn($builder) => $builder->delete());
            return $apartment;
        }
        $apartment->categories()->attach($attributes->input('categories'));
        ApartmentCreateEvent::dispatch($apartment);
        return $apartment;
    }

    public function updated(string $key, $attributes): Model|Builder
    {
        $draft = TemporaryImage::query()
            ->where('user_id', '=', auth()->id())
            ->get();
        $house = $this->getHouse(key: $key);
        $this->updateHouse($house, $attributes);
        if ($draft !== null) {
            $draft->each(function ($images) use ($house) {
                Image::query()
                    ->create([
                        'user_id' => auth()->id(),
                        'images' => $images->file,
                        'house_id' => $house->id
                    ]);
            });
            $house->categories()->sync($attributes->input('categories'));
            $this->updateDetails($attributes, $house);
            $draft->map(fn($builder) => $builder->delete());
            return $house;
        }
        $house->categories()->sync($attributes->input('category'));
        $this->updateDetails($attributes, $house);
        return $house;
    }

    private function createDetails($apartment, $attributes): void
    {
        Detail::query()
            ->create([
                'house_id' => $apartment->id,
                'number_rooms' => $attributes->input('number_rooms'),
                'number_pieces' => $attributes->input('number_pieces'),
                'toilet' => $attributes->input('toilet'),
                'electricity' => $attributes->input('electricity'),
                'description' => $attributes->input('description'),
            ]);
    }

    private function updateDetails($attributes, $house): void
    {
        $department = Detail::query()
            ->where('house_id', '=', $house->id)
            ->firstOrFail();

        $department->update([
            'number_rooms' => $attributes->input('number_rooms'),
            'number_pieces' => $attributes->input('number_pieces'),
            'toilet' => $attributes->input('toilet'),
            'electricity' => $attributes->input('electricity'),
            'description' => $attributes->input('description')
        ]);
    }

    private function getHouse(string $key): Builder|Model
    {
        return House::query()
            ->where('id', '=', $key)
            ->firstOrFail();
    }

    private function storeHouse($attributes)
    {
        return auth()->user()->house()->create([
            'prices' => $attributes->input('prices'),
            'warranty_price' => $attributes->input('warranty_price'),
            'address' => [
                'town' => $attributes->input("town"),
                'commune' => $attributes->input('commune'),
                'district' => $attributes->input('district'),
                'address' => $attributes->input('address'),
            ],
            'latitude' => $attributes->input('latitude'),
            'longitude' => $attributes->input('longitude'),
            'reference' => $this->generateNumericValues(2000, 9999_9999),
            'type_id' => $attributes->input('type'),
        ]);
    }

    private function updateHouse(Model $house, $attributes): void
    {
        $house->update([
            'prices' => $attributes->input('prices'),
            'warranty_price' => $attributes->input('warranty_price'),
            'address' => [
                'town' => $attributes->input("town"),
                'commune' => $attributes->input('commune'),
                'district' => $attributes->input('district'),
                'address' => $attributes->input('address'),
            ],
            'latitude' => $attributes->input('latitude'),
            'longitude' => $attributes->input('longitude'),
            'reference' => $this->generateNumericValues(2000, 9999_9999),
            'type_id' => $attributes->input('type'),
        ]);
    }
}
