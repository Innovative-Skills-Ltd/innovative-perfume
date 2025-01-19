    <!-- shopping cart Us Start -->
    <section class="pb-20">
        <div class="container mx-auto px-2 md:px-0">
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
        <div class="container mx-auto px-2 md:px-0">
            <form action="{{route('checkout')}}" method="POST">
                @csrf
                <div>
                    <table class="border rounded-md w-full">
                        @foreach ($carts as $cart)
                        <input type="hidden" name="product[{{$loop->index}}][slug]" value="{{$cart->product->slug}}">
                        @php
                            $photo = explode(',', $cart->product->photo);
                        @endphp
                            <tr class="border-b">
                                <td class="p-7">
                                    <img class="w-24 h-24"
                                        src="{{$photo[0]}}" />
                                    <a href="{{route('product.details', $cart->product->slug)}}" class="block"> {{$cart->product->title}} </a>
                                        <span class="text-sm text-secondary">Black, XXL</span>
                                </td>
                                <td class="hidden md:block p-7 ps-0">
                                    <a href="{{route('product.details', $cart->product->slug)}}" class="block"> {{$cart->product->title}} </a>
                                    <span class="text-sm text-secondary">Black, XXL</span>
                                </td>
                                <td class="p-7 ps-0">
                                    <div class="flex">
                                        <div class="border px-1 flex items-center justify-center gap-2">
                                            <span class="text-secondary">-</span>
                                            <input type="number" name="product[{{$loop->index}}][quantity]" value="{{$cart->quantity}}" class="w-10 text-center">
                                            <span class="text-secondary">+</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-7 ps-0">
                                    <span class="text-xl font-medium">{{$cart->product->final_price * $cart->quantity}}</span>
                                </td>
                                <td class="py-7">
                                    <span class="text-xl font-medium"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                            height="14" viewBox="0 0 24 24">
                                            <path fill="#333"
                                                d="M7.616 20q-.691 0-1.153-.462T6 18.384V6H5V5h4v-.77h6V5h4v1h-1v12.385q0 .69-.462 1.153T16.384 20zm2.192-3h1V8h-1zm3.384 0h1V8h-1z" />
                                        </svg>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="flex flex-col md:flex-row items-center justify-between py-12 ps-7 pe-14 border border-t-0">
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
                            <span class="text-xl font-medium">95</span>
                        </div>
                    </div>
                    <div class="mt-7 flex items-center justify-end gap-5">
                        <a href="{{route('shop')}}">
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
