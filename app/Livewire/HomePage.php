<?php

namespace App\Livewire;

use App\Models\Banner;
use App\Models\Category;
use App\Models\CompanyReview;
use App\Models\OtherSetting;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
class HomePage extends Component
{
    #[Rule("required", message: "Please,Enter a email")]
    #[Rule("email", message: "Please,Enter a valid email")]
    public $email;

    #[Rule("required", message: "Please,Enter a name")]
    #[Rule("string", message: "Name contain only letter and space")]
    public $name;
    // use WithPagination;

    // public $email;
    public $subject;

    #[Rule("required", message: "Please, Write a message")]
    #[Rule("string", message: "Message should be contain only letter and space")]
    public $msg;

    public $user_id;
    public $post_success_msg;
    public $post_error_msg;


    public function mount()
    {
        // dd(auth()->user());
        if ($user = auth()->user()) {
            $this->name = $user->name;
            $this->email = $user->email;
            $this->user_id = $user->id;
        }
    }

    public function post()
    {

        $this->validate();
        // dd($this->name,$this->email,$this->subject,$this->msg);
        $insert = CompanyReview::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'msg' => $this->msg,
            'user_id' => $this->user_id,
        ]);

        if ($insert) {
            $this->post_success_msg = 'Your post is successfully submitted';
            $this->name = '';
            $this->email = '';
            $this->subject = '';
            $this->msg = '';
            $this->user_id = '';
        } else {
            $this->post_error_msg = "Something went wrong";
        }
    }

    public function render()
    {
        $os =  OtherSetting::first();
        $n['news'] = DB::table('news')->where('status','active')->orderBy('serial','desc')->get();
        $pd = Product::orderBy('views')
                        ->where('is_showable_to_user',1)
                        ->orderBy('serial','desc')
                        ->get();
        // $n['new_arrival'] = $pd->whereBetween('created_at', [Carbon::now()->subDays($os->new_product), Carbon::now()]);
        $n['new_arrival'] = Product::where('status','active')
                                    ->where('is_showable_to_user',1)
                                    ->orderBy('serial','desc')
                                    ->get()
                                    ->take(10);
        $n['features'] = $pd;

        $n['student_laptops'] = Product::where('cat_id',39)
                                ->orderBy('serial','desc')
                                ->get();
        $n['gamming_laptops'] = Product::where('cat_id',4)
                                ->orderBy('serial','desc')
                                ->get();
        // $n['gamming_laptops'] = Category::with('products')->find(4);
        $n['dpds'] = Product::where('status', 'active')
                            ->where('is_showable_to_user',1)
                            ->orderBy('serial','desc')
                            ->get();
        // $n['menus'] = Category::with('child_cat')->where('status', 'active')->where('is_parent', 1)->orderBy('title', 'ASC')->get();
        $n['home_banner'] = Banner::where('status', 'active')->where('slug', 'home-page')->first();

        if (auth()->user()) {
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
        }
        return view('livewire.home-page', $n);
    }
}
