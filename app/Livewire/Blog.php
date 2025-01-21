<?php

namespace App\Livewire;

use App\Models\Cart;
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

        //User checking
        $this->blogs = Blog::all();

    }


    public function render()
    {
        return view('livewire.blog');
    }
}
