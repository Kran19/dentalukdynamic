<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\-\']+$/'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^[0-9\s\+\-\(\)]{10,20}$/'],
            'preferred_date' => ['required', 'date', 'after_or_equal:today'],
            'preferred_time' => ['required', 'string', 'in:morning,afternoon,evening'],
            'visit_reason' => ['required', 'string', 'in:checkup,cleaning,whitening,consultation,emergency'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
