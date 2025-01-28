<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Blogs')]

class Blog extends Component
{


    public $blogs;

    public function mount(){
        // url set to cache for login
        session(['login_previous_url' => request()->url()]);

        //User checking
        $this->blogs = Blog::all();

    }


    public function render()
    {
        $n['categories'] = Category::where('status','active')
                            ->where('is_parent',true)
                            ->get();
        return view('livewire.blog',$n);
    }
}
