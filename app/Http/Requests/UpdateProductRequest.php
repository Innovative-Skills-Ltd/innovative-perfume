<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'summary' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id',
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'boolean',
            'stock' => 'required|integer|min:0',
            'photo' => 'nullable|array',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'serial' => 'required|integer',
            'status' => ['required', Rule::in(['active', 'inactive'])],

            // Product sizes validation
            'sizes' => 'required|array|min:1',
            'sizes.*.display_size_id' => 'required|exists:display_sizes,id',
            'sizes.*.price' => 'required|numeric|min:0',
            'sizes.*.discount' => 'nullable|numeric|min:0',
            'sizes.*.final_price' => 'required|numeric|min:0',
            'sizes.*.is_show' => 'nullable|boolean',

            // Required attributes
            'colors' => 'required|array|min:1',
            'colors.*' => 'exists:colors,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Product title is required',
            'slug.required' => 'Product slug is required',
            'slug.unique' => 'This slug has already been taken',
            'serial.required' => 'Product serial is required',
            'status.required' => 'Product status is required',
            'sizes.required' => 'At least one size is required',
            'sizes.*.display_size_id.required' => 'Size selection is required',
            'sizes.*.price.required' => 'Price is required for each size',
            'sizes.*.final_price.required' => 'Final price is required for each size',
            'colors.required' => 'Please select at least one color',
            'colors.*.exists' => 'Selected color is invalid'
        ];
    }
}
