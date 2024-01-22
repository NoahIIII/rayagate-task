<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CategoryExists;

class CreateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|unique:products',
            'price'=> 'required|numeric',
            'quantity'=> 'required|integer',
            'description'=> 'nullable',
            'categories' => ['required', 'array', new CategoryExists],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The product name is required.',
            'name.unique' => 'The product name must be unique.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'categories.required' => 'Please select at least one category.',
            'categories.array' => 'Categories must be an array.',
            'categories.exists' => 'One or more selected categories do not exist.',
        ];
    }
}
