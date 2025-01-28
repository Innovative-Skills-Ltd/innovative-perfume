<div>
    <!-- cHECKOUT Start -->

    <section class="pb-20">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl ">
            <div class="py-8 flex items-center gap-2 text-sm">
                <a href="#">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 1024 1024">
                    <path fill=""
                        d="M452.864 149.312a29.12 29.12 0 0 1 41.728.064L826.24 489.664a32 32 0 0 1 0 44.672L494.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752L764.736 512L452.864 192a30.59 30.59 0 0 1 0-42.688m-256 0a29.12 29.12 0 0 1 41.728.064L570.24 489.664a32 32 0 0 1 0 44.672L238.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752L508.736 512L196.864 192a30.59 30.59 0 0 1 0-42.688" />
                </svg>
                <span>Checkout</span>
            </div>
            <h2 class="text-xl font-semibold mb-10 uppercase">Checkout</h2>
            <form action="{{ route('user.order.store') }}" method="POST">
                @csrf
                <div x-data="{
                    step: 'shipping',
                    shipping: { firstName: '', lastName: '', country: '', state: '', city: '', zipCode: '', address: '' },
                    payment: { method: 'CREDIT CARD', cardNumber: '', month: '', year: '', cvv: '' },
                    orderConfirmed: false
                }">
                    <!-- Shipping Start -->
                    <div x-show="step === 'shipping'" class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl ">
                        <div class="border rounded px-5 md:ps-7 py-10 mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-20">
                                <div class="md:col-span-2">
                                    <h3 class="pb-1 text-lg font-medium">Shipping Address</h3>
                                    <div class="mb-6">
                                        <span class="inline-block h-[2px] w-5 bg-primary"></span>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                        <div>
                                            <label class="text-sm mb-1">First name</label>
                                            <input name="name" type="text" value="{{ $name }}"
                                                class="py-2 px-5 rounded-full w-full border" />
                                        </div>
                                        <div>
                                            <label class="text-sm mb-1">Last name</label>
                                            <input name="l_name" type="text" value="{{ $l_name }}"
                                                class="py-2 px-5 rounded-full w-full border" />
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
                                        <div>
                                            <label class="text-sm mb-1">Country</label>
                                            <select name="country" class="py-2 px-5 rounded-md w-full border">
                                                <option>India</option>
                                                <option>Malaysian</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="text-sm mb-1">State</label>
                                            <select name="state" class="py-2 px-5 rounded-md w-full border">
                                                <option>Faridpur</option>
                                                <option>Dhaka</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="text-sm mb-1">City</label>
                                            <select name="city" class="py-2 px-5 rounded-md w-full border">
                                                <option>Dhaka</option>
                                                <option>GopalGonj</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                        <div>
                                            <label class="text-sm mb-1">Zip Code</label>
                                            <input name="zip_code" type="text"
                                                class="py-2 px-5 rounded-full w-full border" />
                                        </div>
                                        <div>
                                            <label class="text-sm mb-1">Address</label>
                                            <input name="address" accept=""type="text"
                                                class="py-2 px-5 rounded-full w-full border" />
                                        </div>
                                    </div>
                                    <!-- NEW ROW FOR DELIVERY CHARGE CHECKBOXES -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                        <div>
                                            <label class="text-sm mb-1">Delivery Charge</label>
                                            <div class="flex items-center">
                                                <input type="checkbox" id="insideDhaka" name="delivery_charge[]"
                                                    value="inside_dhaka" class="mr-2" />
                                                <label for="insideDhaka" class="mr-4">Inside Dhaka</label>

                                                <input type="checkbox" id="outsideDhaka" name="delivery_charge[]"
                                                    value="outside_dhaka" class="mr-2" />
                                                <label for="outsideDhaka">Outside Dhaka</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
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
                                                $photo = explode(',', $cart->product->photo);
                                                $price = $cart->size
                                                    ? $cart->size->final_price
                                                    : $cart->product->final_price;
                                                $total_amount += $price * $cart->quantity;
                                            @endphp
                                            <div class="flex items-center gap-7 pb-7 border-b mb-7">
                                                <img class="w-24 h-24" src="{{ $photo[0] }}" />
                                                <div>
                                                    <h4 class="py-1 font-medium">{{ $cart->product->title }}</h4>
                                                    <p class="text-sm py-1 text-secondary">
                                                        @if ($cart->color)
                                                            {{ $cart->color->color->name }},
                                                        @endif
                                                        @if ($cart->size)
                                                            {{ $cart->size->size->size }}
                                                        @endif
                                                    </p>
                                                    <h4 class="font-semibold">
                                                        BDT{{ $price }}
                                                        <span class="text-secondary">x{{ $cart->quantity }}</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <h3 class="font-medium">
                                        Total Price: <span class="text-xl font-medium">${{ $total_amount }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-end justify-end mb-12">
                            <button type="button"
                                class="flex items-center gpa-2 py-2 px-5 border rounded-full text-xs font-semibold uppercase"
                                @click="step = 'payment'">
                                <span>PAYMENT</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M13.293 7.293a1 1 0 0 0 0 1.414L15.586 11H8a1 1 0 0 0 0 2h7.586l-2.293 2.293a.999.999 0 1 0 1.414 1.414L19.414 12l-4.707-4.707a1 1 0 0 0-1.414 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- Shipping End -->

                    <!-- Pay Start -->
                    <div x-show="step === 'payment'" class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
                        <div class="border rounded px-5 md:ps-7 py-10 mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-20">
                                <div class="md:col-span-2">
                                    <h3 class="pb-1 text-lg font-medium">Payment Method</h3>
                                    <div class="mb-6">
                                        <span class="inline-block h-[2px] w-5 bg-primary"></span>
                                    </div>
                                    <div class="flex items-end mb-5 gap-5">
                                        <input type="hidden" id="paymentMethod" name="payment_method"
                                            value="CREDIT CARD" />
                                        <label type="button" onclick="selectPaymentMethod('CREDIT CARD', this)"
                                            class="payment-option flex items-center gpa-2 py-2 px-5 border bg-primary text-white rounded-full text-xs font-semibold uppercase">
                                            CREDIT CARD
                                        </label>
                                        <label type="button" onclick="selectPaymentMethod('PAYPAL', this)"
                                            class="payment-option flex items-center gpa-5 py-2 px-5 border rounded-full text-xs font-semibold uppercase">
                                            <span>PAYPAL</span>
                                        </label>
                                    </div>
                                    <script>
                                        function selectPaymentMethod(method, element) {
                                            // Update hidden input value
                                            document.getElementById('paymentMethod').value = method;

                                            // Remove active class from all options
                                            // document.querySelectorAll('.payment-option').forEach(option => {
                                            //     option.classList.remove('bg-primary', 'text-white');
                                            // });

                                            // Add active class to selected option
                                            // element.classList.add('bg-primary', 'text-white');
                                        }
                                    </script>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                        <div>
                                            <label class="text-sm mb-1">Card number</label>
                                            <input name="card_number" type="text"
                                                class="py-2 px-5 rounded-full w-full border" />
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
                                        <!-- Month Dropdown -->
                                        <div>
                                            <label for="month" class="text-sm mb-1 block">Month</label>
                                            <select id="month" name="month"
                                                class="py-2 px-5 rounded-md w-full border">
                                                <option value="" disabled selected>Select Month</option>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>

                                        <!-- Year Dropdown -->
                                        <div>
                                            <label for="year" class="text-sm mb-1 block">Year</label>
                                            <select id="year" name="year"
                                                class="py-2 px-5 rounded-md w-full border">
                                                <option value="" disabled selected>Select Year</option>
                                                @php
                                                    $currentYear = date('Y');
                                                    $endYear = $currentYear + 10; // Show years up to 10 years in the future
                                                @endphp
                                                @for ($year = $currentYear; $year <= $endYear; $year++)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <!-- CVV Field -->
                                        <div>
                                            <label for="cvv" class="text-sm mb-1 block">CVV</label>
                                            <input id="cvv" name="cvv" type="text"
                                                class="py-2 px-5 rounded-md w-full border" placeholder="Enter CVV"
                                                maxlength="3" />
                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <h3 class="pb-1 text-lg font-medium">Your Order</h3>
                                    <div class="mb-6">
                                        <span class="inline-block h-[2px] w-5 bg-primary"></span>
                                    </div>
                                    <div>
                                        @foreach ($carts as $cart)
                                            @php
                                                $photo = explode(',', $cart->product->photo);
                                            @endphp
                                            <div class="flex items-center gap-7 pb-7 border-b mb-7">
                                                <img class="w-24 h-24" src="{{ $photo[0] }}" />
                                                <div>
                                                    <h4 class="py-1 font-medium">{{ $cart->product->title }}</h4>
                                                    <p class="text-sm py-1 text-secondary">
                                                        @if ($cart->color)
                                                            {{ $cart->color->color->name }},
                                                        @endif
                                                        @if ($cart->size)
                                                            {{ $cart->size->size->size }}
                                                        @endif
                                                    </p>
                                                    <h4 class="font-semibold">
                                                        ${{ $cart->size ? $cart->size->final_price : $cart->product->final_price }}
                                                        <span class="text-secondary">x{{ $cart->quantity }}</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <h3 class="font-medium">
                                        Total Price: <span class="text-xl font-medium">BDT {{ $total_amount }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-end justify-end mb-12 gap-5">
                            <button @click="step = 'shipping'" type="button"
                                class="flex items-center gpa-5 py-2 px-5 border rounded-full text-xs font-semibold uppercase">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M11.884 6.116a1.25 1.25 0 0 0-1.768 0l-5 5a1.25 1.25 0 0 0 0 1.768l5 5a1.25 1.25 0 0 0 1.768-1.768L9.018 13.25H18a1.25 1.25 0 1 0 0-2.5H9.018l2.866-2.866a1.25 1.25 0 0 0 0-1.768" />
                                </svg>
                                <span>BACK TO SHIPPING</span>
                            </button>
                            <button type="submit"
                                class="flex items-center gpa-2 py-2 px-5 border bg-primary text-white rounded-full text-xs font-semibold uppercase">
                                <span>PAY NOW</span>
                            </button>
                        </div>
                    </div>
                    <!-- Pay End -->

                    <!-- Confirmation Start -->
                    <div x-show="step === 'confirmation'" class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl ">
                        <div class="border rounded px-5 md:ps-7 py-10 mb-6 flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" class="mb-6"
                                viewBox="0 0 1200 1200">
                                <path fill="#000"
                                    d="M600 0C268.63 0 0 268.63 0 600s268.63 600 600 600s600-268.63 600-600S931.369 0 600 0m0 130.371c259.369 0 469.556 210.325 469.556 469.629S859.369 1069.556 600 1069.556c-259.37 0-469.556-210.251-469.556-469.556C130.445 340.696 340.63 130.371 600 130.371m229.907 184.717L482.153 662.915L369.36 550.122L258.691 660.718l112.793 112.793l111.401 111.401l110.597-110.669l347.826-347.754z" />
                            </svg>
                            <h3 class="text-center text-xl font-medium mb-2">
                                Congratulation! Your order has been processed.
                            </h3>
                            <p class="text-center text-sm mb-10 text-secondary">
                                Aenean dui mi, tempus non volutpat eget, molestie a orci. Nullam
                                eget sem et eros laoreet rutrum. Quisque sem ante, feugiat quis
                                lorem in.
                            </p>
                            <div>
                                <a href="shop.html"><button
                                        class="flex items-center gpa-2 py-2 px-5 border bg-primary text-white rounded-full text-xs font-semibold uppercase">
                                        <span>RETURN TO STORE</span>
                                    </button></a>
                            </div>
                        </div>
                    </div>
                    <!-- Confirmation End -->
                </div>
            </form>
        </div>
    </section>

    <!-- cHECKOUT End -->

</div>
