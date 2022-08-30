<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\House;
use App\Models\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'town' => ['required', 'string', 'max:255'],
            'commune' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'regex:/(^[-0-9A-Za-z.,\/ ]+$)/'],
            'email' => ['required', 'email', 'regex:/(.+)@(.+)\.(.+)/i'],
            'phone_number' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'prices' => ['required', 'numeric'],
            'warranty_price' => ['required', 'numeric'],
            'number_rooms' => ['required', 'numeric'],
            'number_pieces' => ['required', 'numeric'],
            'images' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:5000'],
            'categories' => ['required'],
            'categories.*' => ['integer', Rule::exists(Category::class, 'id')],
            'type' => ['required', Rule::exists(Type::class, 'id')],
            'latitude' => ['nullable', 'required_with:longitude', 'max:15'],
            'longitude' => ['nullable', 'required_with:latitude', 'max:15'],
            'electricity' => ['required', 'string'],
            'toilet' => ['required', 'string'],
            'description' => ['required', 'string', 'min:30'],
        ];
    }
}
