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
            'slug' => ['required', 'string', Rule::unique('products')->ignore($this->product)],
            'photo' => 'nullable|array',
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

            // Product sizes validation
            'sizes' => 'required|array|min:1',
            'sizes.*.display_size_id' => 'required|exists:display_sizes,id',
            'sizes.*.price' => 'required|numeric|min:0',
            'sizes.*.discount' => 'nullable|numeric|min:0',
            'sizes.*.final_price' => 'required|numeric|min:0',
            'sizes.*.is_show' => 'nullable|boolean',

            'price' => 'required|string',
            'final_price' => 'nullable|string',
            'inventory_cost' => 'required|string',
            'model' => 'string|nullable|max:255',
            'discount' => 'nullable|numeric',
            'other_cats.*' => 'nullable|exists:categories,id',
            'condition' => 'string|nullable|max:255',
            'brand_name' => 'nullable|string|max:255',
            'processor_model_name' => 'nullable|string|max:255',
            'processor_generation_name' => 'nullable|string|max:255',
            'display_size_name' => 'nullable|string|max:255',
            'display_type_name' => 'nullable|string|max:255',
            'ram_name' => 'nullable|string|max:255',
            'ssd_name' => 'nullable|string|max:255',
            'hdd_name' => 'nullable|string|max:255',
            'graphic_name' => 'nullable|string|max:255',
            'special_feature' => 'nullable',

            //Processore Attributes
            'processor_generation_id' => 'nullable|exists:processor_generations,id',
            'processor_model_id' => 'nullable|exists:processor_models,id',
            'p_brand' => 'nullable|string|max:255',
            'c_speed' => 'nullable|string|max:255',
            'l1_cache' => 'nullable|string|max:255',
            'l2_cache' => 'nullable|string|max:255',
            'l3_cache' => 'nullable|string|max:255',
            'p_core' => 'nullable|numeric',
            'p_thread' => 'nullable|numeric',

            //display Attributes
            'display_size_id' => 'nullable|exists:display_sizes,id',
            'display_type_id' => 'nullable|exists:display_types,id',
            'd_resolution' => 'nullable|string|max:255',
            'd_other_features' => 'nullable|string',

            //Memory Attributes
            'ram_id' => 'nullable|exists:rams,id',
            'm_type' => 'nullable|string',
            'bus_speed' => 'nullable|string|max:255',
            'm_slot' => 'nullable|numeric',
            'm_removal' => 'sometimes|in:1',

            //Storage Attributes
            'ssd_id' => 'nullable|exists:ssds,id',
            'hdd_id' => 'nullable|exists:hdds,id',
            's_slot' => 'nullable|numeric',
            's_extra_m2_slot' => 'sometimes|in:1',
            's_support_type' => 'nullable|string|max:255',
            's_upgrade' => 'nullable|string|max:255',

            //Graphic Attributes
            'graphic_id' => 'nullable|exists:graphics,id',
            'g_model' => 'nullable|string|max:255',

            //Keyboar & Touchpad Attributes
            'k_type' => 'nullable|string|max:255',
            'touchpad' => 'sometimes|in:1',

            //Camera & Audio Attributes
            'webcam' => 'nullable|string|max:255',
            'microphone' => 'nullable|string|max:255',
            'speaker' => 'nullable|string|max:255',

            //Ports & Slots Attributes
            'optical_drive' => 'nullable|string|max:255',
            'card_reader' => 'nullable|string|max:255',
            'hdmi_p' => 'nullable|string|max:255',
            'usb2_p' => 'nullable|string|max:255',
            'usb3_p' => 'nullable|string|max:255',
            'type_c_tb_p' => 'nullable|string|max:255',
            'headphone_p' => 'nullable|string|max:255',
            'microphone_p' => 'nullable|string|max:255',

            //Network & Connectivity Attributes
            'wifi' => 'nullable|string|max:255',
            'bluetooth' => 'nullable|string|max:255',

            //Security Attributes
            'finger_print' => 'nullable|string|max:255',

            //Software Attributes
            'operating_system' => 'nullable|string|max:255',

            //Power Attributes
            'battery_type' => 'nullable|string|max:255',
            'battery_capacity' => 'nullable|string|max:255',
            'adapter_type' => 'nullable|string|max:255',

            //Physical Specification Attributes
            'color' => 'nullable|string|max:255',
            'dimension' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',

            //Warranty Attributes
            'w_details' => 'nullable|string|max:255',
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
            'sizes.*.final_price.required' => 'Final price is required for each size'
        ];
    }
}
