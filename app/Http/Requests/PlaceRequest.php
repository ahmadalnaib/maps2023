<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'category_id' => 'required',
            'overview' => 'required',
            'address' => 'required',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'image' => 'image|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => __('place.Place name')]),
            'category_id.required' => __('validation.required', ['attribute' => __('place.Choose state')]),
            'overview.required' => __('validation.required', ['attribute' => __('place.Place Info/Notes')]),
            'address.required' => __('validation.required', ['attribute' => __('place.Address')]),
            'longitude.required' => __('validation.required', ['attribute' => __('place.Longitude')]),
            'latitude.required' => __('validation.required', ['attribute' => __('place.Latitude')]),
            'image.image' => __('validation.image', ['attribute' => __('place.Upload Image')]),
            'image.max' => __('validation.max.file', ['attribute' => __('place.Upload Image'), 'max' => '2 MB']),
        ];
    }
}
