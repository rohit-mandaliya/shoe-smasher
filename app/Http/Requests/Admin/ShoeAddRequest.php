<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShoeAddRequest extends FormRequest
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
            'name' => ['required'],
            'discount' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png'],
            'price' => ['required', 'numeric'],
            'type' => ['not_in:0', 'required'],
            'size' => ['required'],
            'stock' => ['required'],
            'description' => ['required']
        ];
    }
}
