<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug', 'title', 'model', 'mpn', 'price', 'discount', 'final_price', 'inventory_cost', 'summary', 'description', 'photo', 'stock', 'brand_id',
        'cat_id', 'child_cat_id', 'upcomming', 'is_featured', 'is_student', 'status', 'special_feature', 'average_rating', 'views','serial', 'condition','is_showable_to_user', 'product_offer_id',
        //processor Attributes
        'processor_model_id', 'processor_generation_id', 'p_brand', 'c_speed', 'l1_cache', 'l2_cache', 'l3_cache', 'p_core', 'p_thread', 'p_other',
        //Display attributes
        'display_size_id', 'display_type_id', 'd_resolution', 'touch_screen', 'd_other',
        //Memory Attributes (Ram)
        'ram_id', 'm_type', 'bus_speed', 'm_slot', 'm_removal', 'm_other',
        //Storage Attributes (SSD/HDD)
        'ssd_id', 'hdd_id', 's_extra_m2_slot', 's_support_type', 's_upgrade', 's_slot', 'stor_other',
        //Graphics Attributes
        'g_model', 'graphic_id', 'g_other',
        //Keyboard & Touchpad Attributes
        'k_type', 'touchpad', 'k_other', 'k_backlight',
        //Camera & Audio Attributes
        'webcam', 'microphone', 'speaker', 'ca_other',
        //Port & Slots Attributes
        'optical_drive', 'card_reader', 'hdmi_p', 'usb2_p', 'usb3_p', 'type_c_tb_p', 'headphone_p', 'microphone_p', 'ps_other',
        //Network & Connectivity Attributes
        'wifi', 'bluetooth', 'nc_other',
        //Security Attributes
        'finger_print', 'facelock', 's_other',
        //Software Attributes
        'operating_system', 'soft_other',
        //Power Attributes
        'battery_type', 'battery_capacity', 'adapter_type', 'power_other',
        //Physical Specification Attributes
        'color', 'dimension', 'weight', 'physi_other',
        //Warranty Attributes
        'w_details', 'replacement_warranty', 'motherboard_warranty', 'service_warranty', 'disclaimer', 'note',
    ];

    static public function orderByFinalpriceAsc()
    {
        return self::select(
            '*',
            DB::raw('CAST(REPLACE(final_price, ",", "") AS UNSIGNED) AS nfinal_price'),
        )->orderBy('nfinal_price', 'desc');
    }
    static public function orderByFinalpriceDesc()
    {
        return self::select(
            '*',
            DB::raw('CAST(REPLACE(price, ",", "") AS UNSIGNED) AS nprice'),
            DB::raw('CAST(REPLACE(final_price, ",", "") AS UNSIGNED) AS nfinal_price'),
            DB::raw('CAST(REPLACE(inventory_cost, ",", "") AS UNSIGNED) AS ninventory_cost')
        )->orderBy('nfinal_price', 'desc');
    }
    static public function stringToNumber()
    {
        return self::with(['ProcessorGeneration', 'ProcessorModel', 'DisplayType', 'DisplaySize', 'Ram', 'ssd', 'hdd', 'Graphic', 'SpecialFeature'])
            ->select(
                '*',
                DB::raw('CAST(REPLACE(price, ",", "") AS UNSIGNED) AS nprice'),
                DB::raw('CAST(REPLACE(final_price, ",", "") AS UNSIGNED) AS nfinal_price'),
                DB::raw('CAST(REPLACE(inventory_cost, ",", "") AS UNSIGNED) AS ninventory_cost')
            );
    }

    static protected function serachByTitleOrNothing($search_text = null)
    {
        $seraching_products = self::orderByFinalpriceAsc()->where('status', 'active');

        if ($search_text) {
            $remove_white_space = Str::of($search_text)->squish();
            $searching_words =  explode(' ', $remove_white_space);
            foreach ($searching_words as $word) {
                $seraching_products->where('title', 'like', "%$word%");
            }
            return $seraching_products;
        }

        return $seraching_products;
    }
    public function cat_info()
    {
        return $this->hasOne('App\Models\Category', 'id', 'cat_id');
    }
    public function sub_cat_info()
    {
        return $this->hasOne('App\Models\Category', 'id', 'child_cat_id');
    }
    public static function getAllProduct()
    {
        return Product::with(['cat_info', 'sub_cat_info'])->orderBy('id', 'desc')->paginate(10);
    }
    public function rel_prods()
    {
        return $this->hasMany('App\Models\Product', 'cat_id', 'cat_id')->where('status', 'active')->orderBy('id', 'DESC')->limit(8);
    }
    public function getReview()
    {
        return $this->hasMany('App\Models\ProductReview', 'product_id', 'id')->with('user_info')->where('status', 'active')->orderBy('id', 'DESC');
    }
    public static function getProductBySlug($slug)
    {
        return Product::with(['cat_info', 'rel_prods', 'getReview'])->where('slug', $slug)->first();
    }

    public function condition()
    {
        $products = Product::with(['cat_info'])->where('slug', $this->slug)->get();
        $condition = 'N/A';
        foreach ($products as $product) {
            if ($product->cat_info->slug == "brand-new") {
                $condition =  "Brand New";
            } elseif ($product->cat_info->slug == 'pre-owned') {
                $condition = 'Pre-Owned';
            }
        }
        return $condition;
    }
    public function otherCats()
    {
        $products = Product::with(['cat_info'])
                            ->where('id','!=',$this->id)
                            ->where('slug', $this->slug)
                            ->get();
        $cats_are = '';
        foreach ($products as $product) {
           $cats_are .= $product?->cat_info?->title.' || ';
        }
        if(!$cats_are){
            return 'N/A';
        }
        return  Str::substr($cats_are,0,-3);
    }

    public static function countActiveProduct()
    {
        $data = Product::where('status', 'active')->count();
        if ($data) {
            return $data;
        }
        return 0;
    }

    public function carts()
    {
        return $this->hasMany(Cart::class)->whereNotNull('order_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function ProcessorGeneration()
    {
        return $this->belongsTo(ProcessorGeneration::class);
    }

    public function ProcessorModel()
    {
        return $this->belongsTo(ProcessorModel::class);
    }

    public function DisplayType()
    {
        return $this->belongsTo(DisplayType::class);
    }

    public function DisplaySize()
    {
        return $this->belongsTo(DisplaySize::class);
    }

    public function Ram()
    {
        return $this->belongsTo(Ram::class);
    }

    public function ssd()
    {
        return $this->belongsTo(ssd::class);
    }

    public function hdd()
    {
        return $this->belongsTo(hdd::class);
    }

    public function Graphic()
    {
        return $this->belongsTo(Graphic::class);
    }

    public function SpecialFeature()
    {
        return $this->belongsTo(SpecialFeature::class);
    }
    public function ProductOffer()
    {
        return $this->belongsTo(ProductOffer::class);
    }

    public function img()
    {
        return explode(',', $this->photo);
    }

    public function installment(): BelongsTo
    {
        return $this->belongsTo(Installment::class);
    }

    public function storage()
    {
        $strage = '';
        if ($this->ssd) {
            $strage = $strage . $this->ssd->name . ' SSD';
        }
        if ($this->hdd) {
            $strage = $strage . ', ' . $this->hdd->name . ' HDD';
        }
        return $strage;
    }

    public function totalOrder()
    {
        return count($this->carts);
    }

    public function statusWiseOrderCount($status)
    {
        if (count($this->carts) > 0) {
            $count = 0;
            foreach ($this->carts as $cart) {
                if ($cart->order->status == $status) {
                    $count++;
                }
            }
            return $count;
        } else {
            return 0;
        }
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function avgRating()
    {
        return $this->reviews()?->avg('rate');
    }

    public function echoStar(){
        $html = '';
        $star = $this->avgRating();
        if ($star) {

            // Add filled stars
            for ($i = 1; $i <= $star; $i++) {
                $html .= '<span><svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg></span>';
            }

            // Add empty stars
            for ($i = 1; $i <= 5 - $star; $i++) {
                $html .= '<span><svg viewBox="0 0 24 24" fill="white" class="w-[18px] h-[18px]" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg></span>';
            }
        } else {
            // Add 5 filled stars if no reviews
            for ($i = 1; $i <= 5; $i++) {
                $html .= '<span><svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg></span>';
            }
        }
        return $html;
    }
}
