<div>
    <!-- Product Start -->
    <section>
        <div class="container mx-auto px-2 md:px-0">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <div>
                    <div class="mb-5">
                        <!-- Dynamic photo from product -->
                        <img class="w-full" src="{{ $product->photo }}" />
                    </div>
                    <!-- Keep existing static image grid -->
                    <div class="grid grid-cols-3 gap-5">
                        @foreach($product->product_images as $image)
                        <img class="hover:border-primary border transition-all duration-300"
                            src="{{ $image->photo }}" />
                        @endforeach
                    </div>
                </div>
                <div>
                    <!-- Dynamic title and price -->
                    <h1 class="mb-2 text-2xl font-medium">{{ $product->title }}</h1>
                    <div class="mb-5">
                        <span class="text-2xl font-medium">৳{{ $product->final_price }}</span>
                        @if($product->discount > 0)
                            <del class="text-gray-500 ml-2">৳{{ $product->price }}</del>
                        @endif
                    </div>

                    <!-- Keep existing static notes section -->
                    <div class="text-sm font-semibold">
                        <span>Notes:</span>
                    </div>
                    <div class="mt-4 mb-2 flex items-center">
                        <div class="p-2 bg-red-200 border mr-2 mb-4">Oud</div>
                        <div class="p-2 bg-lime-200 border mr-2 mb-4">Woody</div>
                        <div class="p-2 bg-orange-200 border mr-2 mb-4">Sweet</div>
                        <div class="p-2 bg-yellow-200 border mr-2 mb-4">Balastic</div>
                        <div class="p-2 bg-green-200 border mr-2 mb-4">Rose</div>
                    </div>

                    <!-- Keep existing static size selector -->
                    <div x-data="{ selectedSize: '8ML' }">
                        <div class="text-sm font-semibold">
                            <span>Size:</span>
                        </div>
                        <div class="mt-3 mb-2 flex items-center">
                            <template x-for="size in ['3ML', '6ML', '8ML', '10ML', '12ML', '14ML']" :key="size">
                                <div @click="selectedSize = size"
                                    :class="selectedSize === size ? 'bg-primary text-white border' : 'border text-gray-700'"
                                    class="flex items-center justify-center w-14 h-7 text-xs font-semibold mr-2 mb-4 cursor-pointer"
                                    x-text="size"></div>
                            </template>
                        </div>
                    </div>

                    <!-- Keep existing static buttons -->
                    <div>
                        <div class="mb-6 flex items-center gap-5">
                            <button class="p-2 px-4 text-xs rounded-full border">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </button>
                            <button class="p-2 px-4 text-xs rounded-full border">Size Guide</button>
                        </div>
                        <div x-data="{ quantity: 1 }" class="flex items-center gap-5">
                            <div class="p-2 px-4 gap-5 flex items-center rounded-full border">
                                <span class="text-secondary cursor-pointer"
                                    @click="quantity > 1 ? quantity-- : null">-</span>
                                <span x-text="quantity" class="font-semibold"></span>
                                <span class="text-secondary cursor-pointer" @click="quantity++">+</span>
                            </div>
                            <div>
                                <button wire:click="addToCart({{ $product->id }}, quantity)"
                                    class="p-2 px-4 text-xs rounded-full bg-primary text-white font-bold">
                                    ADD TO CART
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Description Start -->
    <section>
        <div class="container mx-auto px-2 md:px-0 mt-20" x-data="{ activeTab: 'descriptions' }">
            <!-- Button Navigation -->
            <div class="mb-9 flex items-center justify-center gap-10">
                <button :class="{ 'text-primary border-b-2 border-b-primary': activeTab === 'descriptions' }"
                    @click="activeTab = 'descriptions'" class="font-semibold uppercase">
                    DESCRIPTIONS
                </button>
                <button :class="{ 'text-primary border-b-2 border-b-primary': activeTab === 'information' }"
                    @click="activeTab = 'information'" class="font-semibold uppercase">
                    INFORMATION
                </button>
                <button :class="{ 'text-primary border-b-2 border-b-primary': activeTab === 'reviews' }"
                    @click="activeTab = 'reviews'" class="font-semibold uppercase">
                    REVIEWS
                </button>
            </div>

            <!-- Tab Content -->
            <div>
                <div x-show="activeTab === 'descriptions'">
                    <p class="text-secondary">
                        Quisque quis ipsum venenatis, fermentum ante volutpat, ornare
                        enim. Phasellus molestie risus non aliquet cursus. Integer
                        vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante
                        ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor
                        elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus
                        sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam
                        sodales, massa non tincidunt iaculis, mauris libero scelerisque
                        justo, ut rutrum lectus urna sit amet quam. Nulla maximus
                        vestibulum mi vitae accumsan.
                    </p>
                </div>

                <div x-show="activeTab === 'information'">
                    <p class="text-secondary">
                        Informational content goes here. You can provide additional
                        details or descriptions related to the product, including
                        specifications or features. Add any relevant information that the
                        user might need to know about the product in this section.
                    </p>
                </div>

                <div x-show="activeTab === 'reviews'">
                    <p class="text-secondary">
                        Reviews will be shown here. This section could include user
                        feedback, ratings, or testimonials about the product. Customers
                        can leave their opinions or ratings about the product to help
                        others make informed decisions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Description End -->
    <!-- Products Start -->
    <section>
        <div class="container mx-auto px-2 md:px-0 pb-20">
            <div class="pt-14 pb-10 flex flex-col items-center justify-center gap-3">
                <h2 class="text-xl font-semibold text-center uppercase">
                    You may also like
                </h2>
                <span class="w-10 h-1 bg-primary inline-block"></span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                <a href="product_details.html">
                    <div class="group cursor-pointer">
                        <div class="border group-hover:border-[#ab8e66] transition-all duration-300">
                            <div class="relative w-full">
                                <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/product-item-17.jpg"
                                    class="w-full" />
                                <div class="top-0 left-0 right-0 bottom-0 m-auto absolute h-full">
                                    <div class="h-full flex items-center justify-center">
                                        <div
                                            class="bg-primary flex rounded-full group-hover:mt-0 transition-all duration-300 ease-in-out group-hover:opacity-100 opacity-0 mt-20">
                                            <div class="w-11 h-11 flex items-center justify-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="M7.75 3.5C5.127 3.5 3 5.76 3 8.547C3 14.125 12 20.5 12 20.5s9-6.375 9-11.953C21 5.094 18.873 3.5 16.25 3.5c-1.86 0-3.47 1.136-4.25 2.79c-.78-1.654-2.39-2.79-4.25-2.79" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-start">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 56 56">
                                                    <path fill="#fff"
                                                        d="M14.559 51.953h27.586c4.218 0 6.656-2.437 6.656-7.266V20.43c0-4.828-2.461-7.266-7.36-7.266h-3.726c-.14-4.922-4.406-9.117-9.703-9.117c-5.32 0-9.586 4.195-9.727 9.117H14.56c-4.875 0-7.36 2.414-7.36 7.266v24.258c0 4.851 2.485 7.265 7.36 7.265M28.012 7.61c3.304 0 5.812 2.485 5.93 5.555h-11.86c.094-3.07 2.602-5.555 5.93-5.555M14.629 48.18c-2.344 0-3.656-1.242-3.656-3.679V20.617c0-2.437 1.312-3.68 3.656-3.68h26.766c2.296 0 3.632 1.243 3.632 3.68V44.5c0 2.438-1.336 3.68-2.953 3.68Z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items-center justify-center absolute top-2 left-2">
                                    <div
                                        class="bg-primary w-10 h-5 flex items-center justify-center text-white font-bold rounded-full">
                                        <span class="text-xs">New</span>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-primary text-lg font-medium text-center mt-5 mb-2">
                                Glorious Eau
                            </h3>
                            <div>
                                <div class="flex items-center justify-center w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m8.85 16.825l3.15-1.9l3.15 1.925l-.825-3.6l2.775-2.4l-3.65-.325l-1.45-3.4l-1.45 3.375l-3.65.325l2.775 2.425zm-1.525 2.098l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102zM12 12.25" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m8.85 16.825l3.15-1.9l3.15 1.925l-.825-3.6l2.775-2.4l-3.65-.325l-1.45-3.4l-1.45 3.375l-3.65.325l2.775 2.425zm-1.525 2.098l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102zM12 12.25" />
                                    </svg>
                                </div>
                                <h4 class="text-sm text-center pb-3">
                                    <del class="">$65</del>
                                    <span class="font-bold text-black">$45</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="product_details.html">
                    <div class="group cursor-pointer">
                        <div class="border group-hover:border-[#ab8e66] transition-all duration-300">
                            <div class="relative w-full">
                                <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/product-item-17.jpg"
                                    class="w-full" />
                                <div class="top-0 left-0 right-0 bottom-0 m-auto absolute h-full">
                                    <div class="h-full flex items-center justify-center">
                                        <div
                                            class="bg-primary flex rounded-full group-hover:mt-0 transition-all duration-300 ease-in-out group-hover:opacity-100 opacity-0 mt-20">
                                            <div class="w-11 h-11 flex items-center justify-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="M7.75 3.5C5.127 3.5 3 5.76 3 8.547C3 14.125 12 20.5 12 20.5s9-6.375 9-11.953C21 5.094 18.873 3.5 16.25 3.5c-1.86 0-3.47 1.136-4.25 2.79c-.78-1.654-2.39-2.79-4.25-2.79" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-start">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 56 56">
                                                    <path fill="#fff"
                                                        d="M14.559 51.953h27.586c4.218 0 6.656-2.437 6.656-7.266V20.43c0-4.828-2.461-7.266-7.36-7.266h-3.726c-.14-4.922-4.406-9.117-9.703-9.117c-5.32 0-9.586 4.195-9.727 9.117H14.56c-4.875 0-7.36 2.414-7.36 7.266v24.258c0 4.851 2.485 7.265 7.36 7.265M28.012 7.61c3.304 0 5.812 2.485 5.93 5.555h-11.86c.094-3.07 2.602-5.555 5.93-5.555M14.629 48.18c-2.344 0-3.656-1.242-3.656-3.679V20.617c0-2.437 1.312-3.68 3.656-3.68h26.766c2.296 0 3.632 1.243 3.632 3.68V44.5c0 2.438-1.336 3.68-2.953 3.68Z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items-center justify-center absolute top-2 left-2">
                                    <div
                                        class="bg-primary w-10 h-5 flex items-center justify-center text-white font-bold rounded-full">
                                        <span class="text-xs">New</span>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-primary text-lg font-medium text-center mt-5 mb-2">
                                Glorious Eau
                            </h3>
                            <div>
                                <div class="flex items-center justify-center w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m8.85 16.825l3.15-1.9l3.15 1.925l-.825-3.6l2.775-2.4l-3.65-.325l-1.45-3.4l-1.45 3.375l-3.65.325l2.775 2.425zm-1.525 2.098l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102zM12 12.25" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m8.85 16.825l3.15-1.9l3.15 1.925l-.825-3.6l2.775-2.4l-3.65-.325l-1.45-3.4l-1.45 3.375l-3.65.325l2.775 2.425zm-1.525 2.098l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102zM12 12.25" />
                                    </svg>
                                </div>
                                <h4 class="text-sm text-center pb-3">
                                    <del class="">$65</del>
                                    <span class="font-bold text-black">$45</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="product_details.html">
                    <div class="group cursor-pointer">
                        <div class="border group-hover:border-[#ab8e66] transition-all duration-300">
                            <div class="relative w-full">
                                <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/product-item-17.jpg"
                                    class="w-full" />
                                <div class="top-0 left-0 right-0 bottom-0 m-auto absolute h-full">
                                    <div class="h-full flex items-center justify-center">
                                        <div
                                            class="bg-primary flex rounded-full group-hover:mt-0 transition-all duration-300 ease-in-out group-hover:opacity-100 opacity-0 mt-20">
                                            <div class="w-11 h-11 flex items-center justify-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="M7.75 3.5C5.127 3.5 3 5.76 3 8.547C3 14.125 12 20.5 12 20.5s9-6.375 9-11.953C21 5.094 18.873 3.5 16.25 3.5c-1.86 0-3.47 1.136-4.25 2.79c-.78-1.654-2.39-2.79-4.25-2.79" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-start">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 56 56">
                                                    <path fill="#fff"
                                                        d="M14.559 51.953h27.586c4.218 0 6.656-2.437 6.656-7.266V20.43c0-4.828-2.461-7.266-7.36-7.266h-3.726c-.14-4.922-4.406-9.117-9.703-9.117c-5.32 0-9.586 4.195-9.727 9.117H14.56c-4.875 0-7.36 2.414-7.36 7.266v24.258c0 4.851 2.485 7.265 7.36 7.265M28.012 7.61c3.304 0 5.812 2.485 5.93 5.555h-11.86c.094-3.07 2.602-5.555 5.93-5.555M14.629 48.18c-2.344 0-3.656-1.242-3.656-3.679V20.617c0-2.437 1.312-3.68 3.656-3.68h26.766c2.296 0 3.632 1.243 3.632 3.68V44.5c0 2.438-1.336 3.68-2.953 3.68Z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items-center justify-center absolute top-2 left-2">
                                    <div
                                        class="bg-primary w-10 h-5 flex items-center justify-center text-white font-bold rounded-full">
                                        <span class="text-xs">New</span>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-primary text-lg font-medium text-center mt-5 mb-2">
                                Glorious Eau
                            </h3>
                            <div>
                                <div class="flex items-center justify-center w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m8.85 16.825l3.15-1.9l3.15 1.925l-.825-3.6l2.775-2.4l-3.65-.325l-1.45-3.4l-1.45 3.375l-3.65.325l2.775 2.425zm-1.525 2.098l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102zM12 12.25" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m8.85 16.825l3.15-1.9l3.15 1.925l-.825-3.6l2.775-2.4l-3.65-.325l-1.45-3.4l-1.45 3.375l-3.65.325l2.775 2.425zm-1.525 2.098l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102zM12 12.25" />
                                    </svg>
                                </div>
                                <h4 class="text-sm text-center pb-3">
                                    <del class="">$65</del>
                                    <span class="font-bold text-black">$45</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="product_details.html">
                    <div class="group cursor-pointer">
                        <div class="border group-hover:border-[#ab8e66] transition-all duration-300">
                            <div class="relative w-full">
                                <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/product-item-17.jpg"
                                    class="w-full" />
                                <div class="top-0 left-0 right-0 bottom-0 m-auto absolute h-full">
                                    <div class="h-full flex items-center justify-center">
                                        <div
                                            class="bg-primary flex rounded-full group-hover:mt-0 transition-all duration-300 ease-in-out group-hover:opacity-100 opacity-0 mt-20">
                                            <div class="w-11 h-11 flex items-center justify-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="M7.75 3.5C5.127 3.5 3 5.76 3 8.547C3 14.125 12 20.5 12 20.5s9-6.375 9-11.953C21 5.094 18.873 3.5 16.25 3.5c-1.86 0-3.47 1.136-4.25 2.79c-.78-1.654-2.39-2.79-4.25-2.79" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-start">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 56 56">
                                                    <path fill="#fff"
                                                        d="M14.559 51.953h27.586c4.218 0 6.656-2.437 6.656-7.266V20.43c0-4.828-2.461-7.266-7.36-7.266h-3.726c-.14-4.922-4.406-9.117-9.703-9.117c-5.32 0-9.586 4.195-9.727 9.117H14.56c-4.875 0-7.36 2.414-7.36 7.266v24.258c0 4.851 2.485 7.265 7.36 7.265M28.012 7.61c3.304 0 5.812 2.485 5.93 5.555h-11.86c.094-3.07 2.602-5.555 5.93-5.555M14.629 48.18c-2.344 0-3.656-1.242-3.656-3.679V20.617c0-2.437 1.312-3.68 3.656-3.68h26.766c2.296 0 3.632 1.243 3.632 3.68V44.5c0 2.438-1.336 3.68-2.953 3.68Z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items-center justify-center absolute top-2 left-2">
                                    <div
                                        class="bg-primary w-10 h-5 flex items-center justify-center text-white font-bold rounded-full">
                                        <span class="text-xs">New</span>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-primary text-lg font-medium text-center mt-5 mb-2">
                                Glorious Eau
                            </h3>
                            <div>
                                <div class="flex items-center justify-center w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m7.325 18.923l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m8.85 16.825l3.15-1.9l3.15 1.925l-.825-3.6l2.775-2.4l-3.65-.325l-1.45-3.4l-1.45 3.375l-3.65.325l2.775 2.425zm-1.525 2.098l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102zM12 12.25" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#ffb933"
                                            d="m8.85 16.825l3.15-1.9l3.15 1.925l-.825-3.6l2.775-2.4l-3.65-.325l-1.45-3.4l-1.45 3.375l-3.65.325l2.775 2.425zm-1.525 2.098l1.24-5.313l-4.123-3.572l5.431-.47L12 4.557l2.127 5.01l5.43.47l-4.123 3.572l1.241 5.313L12 16.102zM12 12.25" />
                                    </svg>
                                </div>
                                <h4 class="text-sm text-center pb-3">
                                    <del class="">$65</del>
                                    <span class="font-bold text-black">$45</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- Products End -->
</div>
