    <!-- shopping cart Us Start -->
    <section class="pb-20">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl ">
            <div class="py-8 flex items-center gap-2 text-sm">
                <a href="#">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 1024 1024">
                    <path fill=""
                        d="M452.864 149.312a29.12 29.12 0 0 1 41.728.064L826.24 489.664a32 32 0 0 1 0 44.672L494.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752L764.736 512L452.864 192a30.59 30.59 0 0 1 0-42.688m-256 0a29.12 29.12 0 0 1 41.728.064L570.24 489.664a32 32 0 0 1 0 44.672L238.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752L508.736 512L196.864 192a30.59 30.59 0 0 1 0-42.688" />
                </svg>
                <span>Shopping Cart</span>
            </div>
            <h2 class="text-xl font-semibold mb-10 uppercase">SHOPPING CART</h2>
        </div>
        <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl ">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <div>
                    <table class="border rounded-md w-full" x-data="{
                        confirmDelete(el, cartId) {
                            if (confirm('Are you sure you want to remove this item?')) {
                                fetch(`/cart/delete/${cartId}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'Accept': 'application/json',
                                            'X-Requested-With': 'XMLHttpRequest',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log(data);
                                        if (data.status) {
                                            el.closest('tr').remove();
                                            window.location.reload();
                                            toast.success(data.message);
                                        } else {
                                            toast.error(data.message);
                                        }
                                    });
                            }
                        }
                    }">
                        @php
                            $total_price = $carts->sum(function ($cart) {
                                $price = $cart->size ? $cart->size->final_price : $cart->product->final_price;
                                return $price * $cart->quantity;
                            });
                        @endphp
                        @foreach ($carts as $cart)
                            <input type="hidden" name="product[{{ $loop->index }}][slug]"
                                value="{{ $cart->product->slug }}">
                            @php
                                $photo = explode(',', $cart->product->photo);
                            @endphp
                            <tr class="border-b">
                                <td class="p-7">
                                    <img class="w-24 h-24" src="{{ $photo[0] }}" />
                                    <a href="{{ route('product.details', $cart->product->slug) }}" class="block">
                                        {{ $cart->product->title }}
                                    </a>
                                    <span class="text-sm text-secondary">
                                        @if ($cart->color)
                                            {{ $cart->color->color->name }},
                                        @endif
                                        @if ($cart->size)
                                            {{ $cart->size->size->size }}
                                        @endif
                                    </span>
                                </td>
                                <td class="hidden md:block p-7 ps-0">
                                    <a href="{{ route('product.details', $cart->product->slug) }}" class="block">
                                        {{ $cart->product->title }}
                                    </a>
                                    <span class="text-sm text-secondary">
                                        @if ($cart->color)
                                            {{ $cart->color->color->name }},
                                        @endif
                                        @if ($cart->size)
                                            {{ $cart->size->size->size }}
                                        @endif
                                    </span>
                                </td>
                                <td class="p-7 ps-0">
                                    <div class="flex">
                                        <div class="border px-1 flex items-center justify-center gap-2">
                                            <button type="button" class="text-secondary hover:text-primary"
                                                onclick="updateQuantity(this, -1)">-</button>
                                            <input type="number" name="product[{{ $loop->index }}][quantity]"
                                                value="{{ $cart->quantity }}" min="1" class="w-10 text-center"
                                                onchange="validateQuantity(this)">
                                            <button type="button" class="text-secondary hover:text-primary"
                                                onclick="updateQuantity(this, 1)">+</button>
                                        </div>
                                        <script>
                                            function updateQuantity(btn, change) {
                                                const input = btn.parentElement.querySelector('input');
                                                const newValue = parseInt(input.value) + change;
                                                if (newValue >= 1) {
                                                    input.value = newValue;
                                                    input.dispatchEvent(new Event('change'));
                                                }
                                            }

                                            function validateQuantity(input) {
                                                if (input.value < 1) input.value = 1;
                                            }
                                        </script>
                                    </div>
                                </td>
                                <td class="p-7 ps-0">
                                    <span class="text-xl font-medium">
                                        @php
                                            $price = $cart->size
                                                ? $cart->size->final_price
                                                : $cart->product->final_price;
                                            $total = $price * $cart->quantity;
                                        @endphp
                                        ${{ number_format($total, 2) }}
                                    </span>
                                </td>
                                <td class="py-7">
                                    <button type="button" @click="confirmDelete($el, {{ $cart->id }})"
                                        class="text-xl font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24">
                                            <path fill="#333"
                                                d="M7.616 20q-.691 0-1.153-.462T6 18.384V6H5V5h4v-.77h6V5h4v1h-1v12.385q0 .69-.462 1.153T16.384 20zm2.192-3h1V8h-1zm3.384 0h1V8h-1z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div
                        class="flex flex-col md:flex-row items-center justify-between py-12 ps-7 pe-14 border border-t-0">
                        <div class="flex flex-col md:flex-row items-center gap-1">
                            <label class="font-medium">Coupon Code:</label>
                            <div class="relative">
                                <input class="py-2 px-5 border w-full rounded-full" type="text"
                                    placeholder="Promotion code Here" />
                                <button class="absolute top-0 right-5 bottom-0 my-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24">
                                        <path fill="#333"
                                            d="M13.884 6.116a1.25 1.25 0 0 0-1.768 1.768l2.866 2.866H6a1.25 1.25 0 1 0 0 2.5h8.982l-2.866 2.866a1.25 1.25 0 0 0 1.768 1.768l5-5a1.25 1.25 0 0 0 0-1.768z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div>
                            <span class="font-medium">Total Price: $</span>
                            <span class="text-xl font-medium">{{ $total_price }}</span>
                        </div>
                    </div>
                    <div class="mt-7 flex items-center justify-end gap-5">
                        <a href="{{ route('shop') }}">
                            <span class="px-5 font-semibold py-2 border rounded-full text-sm uppercase">
                                CONTINUE SHOPPING
                            </span>
                        </a>
                        <button type="submit">
                            <button class="px-5 font-semibold py-2 rounded-full text-sm uppercase border">
                                CHECKOUT
                            </button>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- shopping cart End -->

    @push('scripts')
        <script>
            // Make sure CSRF token is available for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    @endpush
