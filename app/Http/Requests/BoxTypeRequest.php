<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoxTypeRequest extends FormRequest
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
            //
            'name' => 'required',
            'depth' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'description' => 'required',
            'ebike_option' => 'required|boolean',
            'first_floor_option' => 'required|boolean',
        ];
    }
}
