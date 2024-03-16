<?php

namespace App\Http\Requests;

use App\Models\Advertisement;
use Illuminate\Foundation\Http\FormRequest;

class EditAdvertisementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $advertisement = Advertisement::findOrFail($this->route('advertisement'));
        return $advertisement->user_id == auth()->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'category' => ['nullable', 'string'],
            'price' => ['nullable', 'integer'],
            'location' => ['nullable', 'string'],
        ];
    }
}
