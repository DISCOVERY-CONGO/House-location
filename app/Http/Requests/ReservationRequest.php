<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\House;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;

class ReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'apartment' => [
                'required',
                new Exists(House::class, 'id')
            ],
            'username' => ['required', 'string', 'min:3'],
            'email' => [
                'nullable',
                'email',
                'regex:/(.+)@(.+)\.(.+)/i'
            ],
            'phone_number' => [
                'required',
                'numeric',
                'min:10',
                'regex:/^([0-9\s\-\+\(\)]*)$/'
            ],
            'messages' => ['nullable', 'string'],
        ];
    }
}
