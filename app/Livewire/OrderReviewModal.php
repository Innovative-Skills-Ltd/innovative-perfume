<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\ProductReview;
use LivewireUI\Modal\ModalComponent;
use Livewire\Attributes\Rule;

class OrderReviewModal extends ModalComponent
{
    public $orderId;
    public $order;

    #[Rule('required|integer|min:1|max:5')]
    public $rating = 5;

    #[Rule('required|string|min:10')]
    public $review = '';

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->order = Order::with('cart_info.product')->findOrFail($orderId);
    }

    public function submitReview()
    {
        $this->validate();

        foreach($this->order->cart_info as $item) {
            ProductReview::create([
                'user_id' => auth()->id(),
                'product_id' => $item->product->id,
                'rate' => $this->rating,
                'review' => $this->review,
                'status' => 'active',
                'f_name' => auth()->user()->name,
                'l_name' => '',
                'ip' => request()->ip()
            ]);
        }

        $this->dispatch('review-submitted');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.order-review-modal');
    }
}
