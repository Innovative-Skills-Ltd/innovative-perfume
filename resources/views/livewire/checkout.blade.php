<div>
    <!-- CHECKOUT Start -->
    <section class="pb-20">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="py-8 flex items-center gap-2 text-sm">
                <a href="#">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 1024 1024">
                    <path fill="currentColor"
                        d="M452.864 149.312a29.12 29.12 0 0 1 41.728.064L826.24 489.664a32 32 0 0 1 0 44.672L494.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752L764.736 512L452.864 192a30.59 30.59 0 0 1 0-42.688m-256 0a29.12 29.12 0 0 1 41.728.064L570.24 489.664a32 32 0 0 1 0 44.672L238.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752L508.736 512L196.864 192a30.59 30.59 0 0 1 0-42.688" />
                </svg>
                <span>Checkout</span>
            </div>
            <h2 class="text-xl font-semibold mb-10 uppercase">Checkout</h2>
            <form action="{{ route('checkout.order') }}" method="POST">
                @csrf
                <div x-data="{
                    step: 'shipping',
                    shipping: { firstName: '', lastName: '', country: '', state: '', city: '', zipCode: '', address: '' },
                    payment: { method: 'CREDIT CARD', cardNumber: '', month: '', year: '', cvv: '' },
                    orderConfirmed: false
                }">
                    <!-- Shipping Start -->
                    <div x-show="step === 'shipping'" class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
                        <div class="border rounded px-5 md:ps-7 py-10 mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-20">
                                <div class="md:col-span-2">
                                    <h3 class="pb-1 text-lg font-medium">Shipping Address</h3>
                                    <div class="mb-6">
                                        <span class="inline-block h-[2px] w-5 bg-primary"></span>
                                    </div>

                                    @if (session('errors'))
                                        @foreach (session('errors')->all() as $error)
                                            <div class="text-red-500 mb-1">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                        <div>
                                            <label class="text-sm mb-1">Address <span class="text-red-500">*</span></label>
                                            <input name="address" type="text" value="{{ old('address') }}" class="py-2 px-5 rounded-full w-full border" />
                                        </div>
                                        <div>
                                            <label class="text-sm mb-1">City <span class="text-red-500">*</span></label>
                                            <input name="city" type="text" value="{{ old('city') }}" class="py-2 px-5 rounded-full w-full border" />
                                        </div>
                                        <div>
                                            <label class="text-sm mb-1">Zip Code <span class="text-red-500">*</span></label>
                                            <input name="post_code" type="number" value="{{ old('post_code') }}" class="py-2 px-5 rounded-full w-full border" />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                        <div>
                                            <label class="text-sm mb-1 font-bold">Delivery Charge:</label>
                                            <div class="flex items-center">
                                                <input type="radio" id="insideDhaka" name="delivery_charge" value="inside_dhaka" class="mr-2" checked />
                                                <label for="insideDhaka" class="mr-4">Inside Dhaka (70)</label>
                                                <input type="radio" id="outsideDhaka" name="delivery_charge" value="outside_dhaka" class="mr-2" />
                                                <label for="outsideDhaka">Outside Dhaka (130)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="pb-1 text-lg font-medium">Your Order</h3>
                                    <div class="mb-6">
                                        <span class="inline-block h-[2px] w-5 bg-primary"></span>
                                    </div>
                                    <div>
                                        @php
                                            $total_amount = 0;
                                        @endphp
                                        @foreach ($carts as $cart)
                                            @php
                                                $price = $cart->size ? $cart->size->final_price : $cart->product->final_price;
                                                $total_amount += $price * $cart->quantity;
                                            @endphp
                                            <div class="flex items-center gap-7 pb-7 border-b mb-7">
                                                <img class="w-24 h-24" src="{{ $cart->product->thumbnail_url }}" />
                                                <div>
                                                    <h4 class="py-1 font-medium">{{ $cart->product->title }}</h4>
                                                    <h4 class="font-semibold">BDT {{ $price }} x{{ $cart->quantity }}</h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <h3 class="font-medium">Total Price: <span class="text-xl font-medium">BDT <span id="totalPrice">{{ $total_amount }}</span></span></h3>
                                </div>
                            </div>
                            <div class="flex items-end justify-end mb-12">
                                <button type="button" class="flex items-center gap-2 py-2 px-5 border rounded-full text-xs font-semibold uppercase" @click="step = 'payment'">
                                    <span>PAYMENT</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M13.293 7.293a1 1 0 0 0 0 1.414L15.586 11H8a1 1 0 0 0 0 2h7.586l-2.293 2.293a.999.999 0 1 0 1.414 1.414L19.414 12l-4.707-4.707a1 1 0 0 0-1.414 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Shipping End -->

                    <!-- Payment Start -->
                    <div x-show="step === 'payment'" x-transition class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
                        <div class="border rounded px-5 md:ps-7 py-10 mb-6">
                            <h3 class="pb-1 text-lg font-medium">Payment Method</h3>
                            <div class="mb-6">
                                <span class="inline-block h-[2px] w-5 bg-primary"></span>
                            </div>
                            <div class="space-y-6">
                                <!-- Mobile Banking Option -->
                                <div class="border rounded-lg pl-6 py-4 pr-4">
                                    <label class="flex items-center gap-4 mb-6 cursor-pointer">
                                        <input type="radio" name="payment_type" value="mobile_banking" x-model="payment.method" class="w-4 h-4">
                                        <div class="flex gap-4">
                                            <img src="{{ asset('images/default/bkash-nagad.jpg') }}" alt="bKash" class="h-12">
                                        </div>
                                    </label>
                                    <div x-show="payment.method === 'mobile_banking'" class="mt-4">
                                        <label class="text-sm mb-1 block">Enter Transaction ID <span class="text-red-500">*</span></label>
                                        <input type="text" name="mobile_transaction_id" class="py-2 px-5 rounded-md w-full border" placeholder="Enter your transaction ID">
                                    </div>
                                </div>

                                <!-- Bank Transfer Option -->
                                <div class="border rounded-lg pl-6 py-4 pr-4">
                                    <label class="flex items-center gap-4 mb-6 cursor-pointer">
                                        <input type="radio" name="payment_type" value="bank_transfer" x-model="payment.method" class="w-4 h-4">
                                        <img src="{{ asset('images/default/dutch-bangla.png') }}" alt="Dutch-Bangla Bank" class="h-12">
                                    </label>
                                    <div x-show="payment.method === 'bank_transfer'" class="mt-4">
                                        <label class="text-sm mb-1 block">Enter Transaction ID <span class="text-red-500">*</span></label>
                                        <input type="text" name="bank_transaction_id" class="py-2 px-5 rounded-md w-full border" placeholder="Enter your transaction ID">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-end justify-end mb-12 gap-5">
                            <button @click="step = 'shipping'" type="button" class="flex items-center gap-2 py-2 px-5 border rounded-full text-xs font-semibold uppercase">
                                <span>BACK TO SHIPPING</span>
                            </button>
                            <button type="submit" class="flex items-center gap-2 py-2 px-5 border bg-primary text-white rounded-full text-xs font-semibold uppercase">
                                <span>PAY NOW</span>
                            </button>
                        </div>
                    </div>
                    <!-- Payment End -->
                </div>
            </form>
        </div>
    </section>
    <!-- CHECKOUT End -->
</div>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const baseTotal = Number('{{ $total_amount }}');

        const shippingRates = {
            inside_dhaka: 70,
            outside_dhaka: 130
        };

        const deliveryRadios = document.querySelectorAll('input[name="delivery_charge"]');
        const totalPriceEl = document.getElementById('totalPrice');

        deliveryRadios.forEach((radio) => {
            radio.addEventListener('change', function() {
                const selectedShipping = this.value;
                const shippingCost = shippingRates[selectedShipping] || 0;
                const newTotal = baseTotal + shippingCost;

                totalPriceEl.textContent = newTotal;
            });
        });

        const defaultRate = shippingRates['inside_dhaka'];
        totalPriceEl.textContent = baseTotal + defaultRate;
    });
</script>
