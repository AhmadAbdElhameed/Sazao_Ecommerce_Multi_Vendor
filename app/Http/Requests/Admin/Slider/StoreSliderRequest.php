<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'banner' => 'required|image|max:2048|mimes:png,jpg,jpeg,webp',
            'type' => 'string|max:200|min:2',
            'title' => 'required|max:255|min:5',
            'starting_price' => 'max:200',
            'btn_url' => 'url',
            'serial' => 'required|integer',
            'status' => 'required'
        ];
    }
}
