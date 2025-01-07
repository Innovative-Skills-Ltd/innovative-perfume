<div>
    <!-- cHECKOUT Start -->

    <section class="pb-20">
        <div class="container mx-auto px-2 md:px-0">
            <div class="py-8 flex items-center gap-2 text-sm">
                <a href="#">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 1024 1024">
                    <path fill=""
                        d="M452.864 149.312a29.12 29.12 0 0 1 41.728.064L826.24 489.664a32 32 0 0 1 0 44.672L494.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752L764.736 512L452.864 192a30.59 30.59 0 0 1 0-42.688m-256 0a29.12 29.12 0 0 1 41.728.064L570.24 489.664a32 32 0 0 1 0 44.672L238.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752L508.736 512L196.864 192a30.59 30.59 0 0 1 0-42.688" />
                </svg>
                <span>Checkout</span>
            </div>
            <h2 class="text-xl font-semibold mb-10 uppercase">Checkout</h2>
            <div x-data="{
                step: 'shipping',
                shipping: { firstName: '', lastName: '', country: '', state: '', city: '', zipCode: '', address: '' },
                payment: { method: 'CREDIT CARD', cardNumber: '', month: '', year: '', cvv: '' },
                orderConfirmed: false
            }">
                <!-- Shipping Start -->
                <div x-show="step === 'shipping'" class="container mx-auto px-2 md:px-0">
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
                                        <input type="text" class="py-2 px-5 rounded-full w-full border" />
                                    </div>
                                    <div>
                                        <label class="text-sm mb-1">Last name</label>
                                        <input type="text" class="py-2 px-5 rounded-full w-full border" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
                                    <div>
                                        <label class="text-sm mb-1">Country</label>
                                        <select class="py-2 px-5 rounded-md w-full border">
                                            <option>BD</option>
                                            <option>India</option>
                                            <option>Malaysian</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="text-sm mb-1">State</label>
                                        <select class="py-2 px-5 rounded-md w-full border">
                                            <option>BD</option>
                                            <option>India</option>
                                            <option>Malaysian</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="text-sm mb-1">City</label>
                                        <select class="py-2 px-5 rounded-md w-full border">
                                            <option>BD</option>
                                            <option>India</option>
                                            <option>Malaysian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                    <div>
                                        <label class="text-sm mb-1">Zip Code</label>
                                        <input type="text" class="py-2 px-5 rounded-full w-full border" />
                                    </div>
                                    <div>
                                        <label class="text-sm mb-1">Address</label>
                                        <input type="text" class="py-2 px-5 rounded-full w-full border" />
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="pb-1 text-lg font-medium">Your Order</h3>
                                <div class="mb-6">
                                    <span class="inline-block h-[2px] w-5 bg-primary"></span>
                                </div>
                                <div>
                                    <div class="flex items-center gap-7 pb-7 border-b mb-7">
                                        <img class="w-24 h-24"
                                            src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/item-order1.jpg" />
                                        <div>
                                            <h4 class="py-1 font-medium">3D Dining Chair</h4>
                                            <p class="text-sm py-1 text-secondary">Black, XXL</p>
                                            <h4 class="font-semibold">
                                                $45 <span class="text-secondary">x1</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-7 pb-7">
                                        <img class="w-24 h-24"
                                            src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/item-order1.jpg" />
                                        <div>
                                            <h4 class="py-1 font-medium">3D Dining Chair</h4>
                                            <p class="text-sm py-1 text-secondary">Black, XXL</p>
                                            <h4 class="font-semibold">
                                                $45 <span class="text-secondary">x1</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="font-medium">
                                    Total Price: <span class="text-xl font-medium">$95</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-end justify-end mb-12">
                        <button
                            class="flex items-center gpa-2 py-2 px-5 border rounded-full text-xs font-semibold uppercase"
                            @click="step = 'payment'">
                            <span>PAYMENT</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M13.293 7.293a1 1 0 0 0 0 1.414L15.586 11H8a1 1 0 0 0 0 2h7.586l-2.293 2.293a.999.999 0 1 0 1.414 1.414L19.414 12l-4.707-4.707a1 1 0 0 0-1.414 0" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Shipping End -->
                <!-- Pay Start -->
                <div x-show="step === 'payment'" class="container mx-auto px-2 md:px-0">
                    <div class="border rounded px-5 md:ps-7 py-10 mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-20">
                            <div class="md:col-span-2">
                                <h3 class="pb-1 text-lg font-medium">Payment Method</h3>
                                <div class="mb-6">
                                    <span class="inline-block h-[2px] w-5 bg-primary"></span>
                                </div>
                                <div class="flex items-end mb-5 gap-5">
                                    <button
                                        class="flex items-center gpa-2 py-2 px-5 border bg-primary text-white rounded-full text-xs font-semibold uppercase">
                                        <span>CREDIT CARD</span>
                                    </button>
                                    <button
                                        class="flex items-center gpa-5 py-2 px-5 border rounded-full text-xs font-semibold uppercase">
                                        <span>PAYPAL</span>
                                    </button>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                    <div>
                                        <label class="text-sm mb-1">Card number</label>
                                        <input type="text" class="py-2 px-5 rounded-full w-full border" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
                                    <div>
                                        <label class="text-sm mb-1">Month</label>
                                        <select class="py-2 px-5 rounded-md w-full border">
                                            <option>BD</option>
                                            <option>India</option>
                                            <option>Malaysian</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="text-sm mb-1">Year</label>
                                        <select class="py-2 px-5 rounded-md w-full border">
                                            <option>BD</option>
                                            <option>India</option>
                                            <option>Malaysian</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="text-sm mb-1">CVV</label>
                                        <select class="py-2 px-5 rounded-md w-full border">
                                            <option>BD</option>
                                            <option>India</option>
                                            <option>Malaysian</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="pb-1 text-lg font-medium">Your Order</h3>
                                <div class="mb-6">
                                    <span class="inline-block h-[2px] w-5 bg-primary"></span>
                                </div>
                                <div>
                                    <div class="flex items-center gap-7 pb-7 border-b mb-7">
                                        <img class="w-24 h-24"
                                            src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/item-order1.jpg" />
                                        <div>
                                            <h4 class="py-1 font-medium">3D Dining Chair</h4>
                                            <p class="text-sm py-1 text-secondary">Black, XXL</p>
                                            <h4 class="font-semibold">
                                                $45 <span class="text-secondary">x1</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-7 pb-7">
                                        <img class="w-24 h-24"
                                            src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/item-order1.jpg" />
                                        <div>
                                            <h4 class="py-1 font-medium">3D Dining Chair</h4>
                                            <p class="text-sm py-1 text-secondary">Black, XXL</p>
                                            <h4 class="font-semibold">
                                                $45 <span class="text-secondary">x1</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="font-medium">
                                    Total Price: <span class="text-xl font-medium">$95</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-end justify-end mb-12 gap-5">
                        <button @click="step = 'shipping'"
                            class="flex items-center gpa-5 py-2 px-5 border rounded-full text-xs font-semibold uppercase">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M11.884 6.116a1.25 1.25 0 0 0-1.768 0l-5 5a1.25 1.25 0 0 0 0 1.768l5 5a1.25 1.25 0 0 0 1.768-1.768L9.018 13.25H18a1.25 1.25 0 1 0 0-2.5H9.018l2.866-2.866a1.25 1.25 0 0 0 0-1.768" />
                            </svg>
                            <span>BACK TO SHIPPING</span>
                        </button>
                        <button @click="step = 'confirmation'"
                            class="flex items-center gpa-2 py-2 px-5 border bg-primary text-white rounded-full text-xs font-semibold uppercase">
                            <span>PAY NOW</span>
                        </button>
                    </div>
                </div>
                <!-- Pay End -->
                <!-- Confirmation Start -->
                <div x-show="step === 'confirmation'" class="container mx-auto px-2 md:px-0">
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
        </div>
    </section>
    <!-- cHECKOUT End -->

</div>
