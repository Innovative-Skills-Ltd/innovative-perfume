<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'slug' => 'required|string|unique:products,slug',
            'photo' => 'required|array',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'mpn' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'brand_id' => 'required|exists:brands,id',
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'boolean',
            'status' => ['required', Rule::in(['active', 'inactive'])],
            'serial' => 'required|integer',
            'condition' => 'nullable|string',
            'is_showable_to_user' => 'boolean',
            'product_offer_id' => 'nullable|exists:product_offers,id',
            'replacement_warranty' => 'nullable|string',
            'motherboard_warranty' => 'nullable|string',
            'service_warranty' => 'nullable|string',
            'disclaimer' => 'nullable|string',
            'note' => 'nullable|string',
            'w_details' => 'nullable|string',

            // Product sizes validation
            'sizes' => 'required|array|min:1',
            'sizes.*.display_size_id' => 'required|exists:display_sizes,id',
            'sizes.*.price' => 'required|numeric|min:0',
            'sizes.*.discount' => 'nullable|numeric|min:0',
            'sizes.*.final_price' => 'required|numeric|min:0',
            'sizes.*.is_show' => 'nullable|boolean'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Product title is required',
            'slug.required' => 'Product slug is required',
            'slug.unique' => 'This slug has already been taken',
            'photo.required' => 'Product photo is required',
            'serial.required' => 'Product serial is required',
            'status.required' => 'Product status is required',
            'sizes.required' => 'At least one size is required',
            'sizes.*.display_size_id.required' => 'Size selection is required',
            'sizes.*.price.required' => 'Price is required for each size',
            'sizes.*.final_price.required' => 'Final price is required for each size'
        ];
    }
}
