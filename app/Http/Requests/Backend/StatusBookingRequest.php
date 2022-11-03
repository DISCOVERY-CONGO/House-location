<?php

declare(strict_types=1);

namespace App\Http\Requests\Backend;

use App\Models\Reservation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StatusBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'booking' => [
                'required',
                Rule::exists(Reservation::class, 'id')
            ],
            'status' => [
                'required',
                'boolean',
            ],
        ];
    }
}
