<div>
    <!-- Product Start -->
    <section>
        <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl mt-3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                @if ($product->photo)
                    @php
                        $photos = explode(',', $product->photo);
                        $photo = $photos[0];
                    @endphp
                @else
                    @php
                        $photo = '/backend/img/thumbnail-default.jpg';
                    @endphp
                @endif

                <div>
                    <div class="mb-5">
                        <!-- Dynamic photo from product -->
                        <img class="w-full" src="{{ $product->thumbnail_url }}" />
                    </div>
                    <!-- Keep existing static image grid -->
                    {{-- <div class="grid grid-cols-3 gap-5">
                        <img class="hover:border-primary border transition-all duration-300" src="{{ $product->thumbnail_url }}"
                        title="{{ $product->title }}">
                        @foreach ($photos as $pto)
                            <img class="hover:border-primary border transition-all duration-300" src="{{ $pto }}"
                                title="{{ $product->title }}">
                        @endforeach
                    </div> --}}
                </div>

                <form action="{{ route('create_cart', $product->slug) }}" method="GET">
                    @csrf
                    <div>
                        <!-- Dynamic title and price -->
                        <h1 class="mb-2 text-2xl font-medium">{{ $product->title }}</h1>
                        <div x-data="{
                            selectedSize: null,
                            sizes: {{ json_encode(
                                $product->sizes->map(function ($size) {
                                    return [
                                        'id' => $size->id,
                                        'size' => $size->size->size,
                                        'price' => $size->price,
                                        'discount' => $size->discount,
                                        'final_price' => $size->final_price,
                                        'is_show' => $size->is_show,
                                    ];
                                }),
                            ) }},
                            init() {
                                this.selectedSize = this.sizes.find(s => s.is_show) || this.sizes[0];
                            }
                        }">
                            <!-- Price Display -->
                            <div class="mb-5">
                                <span class="text-2xl font-medium" x-text="'৳' + selectedSize?.final_price"></span>
                                <template x-if="selectedSize?.discount > 0">
                                    <del class="text-gray-500 ml-2" x-text="'৳' + selectedSize?.price"></del>
                                </template>
                            </div>

                            <!-- Size Selector -->
                            <div class="text-sm font-semibold">
                                <span>Size:</span>
                            </div>
                            <div class="mt-3 mb-2 flex items-center">
                                <template x-for="size in sizes" :key="size.id">
                                    <div class="mr-2 mb-4">
                                        <div @click="selectedSize = size"
                                            :class="selectedSize?.id === size.id ? 'bg-primary text-white border' :
                                                'border text-gray-700'"
                                            class="p-2 px-4 text-xs cursor-pointer" x-text="size.size">
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Hidden input for selected size -->
                            <input type="hidden" name="size_id" x-model="selectedSize.id">
                        </div>

                        <!-- Color Selector -->
                        <div x-data="{
                            selectedColor: null,
                            colors: {{ json_encode(
                                $product->colors->map(function ($productColor) {
                                    return [
                                        'id' => $productColor->id,
                                        'name' => $productColor->color->name,
                                        'code' => $productColor->color->code,
                                    ];
                                }),
                            ) }},
                            init() {
                                this.selectedColor = this.colors[0];
                            }
                        }">

                            <div class="text-sm font-semibold">
                                <span>Notes:</span>
                            </div>
                            <div class="mt-4 mb-2 flex items-center flex-wrap">
                                <template x-for="color in colors" :key="color.id">
                                    <div @click="selectedColor = color" :title="color.name"
                                        :style="{ backgroundColor: color.code }"
                                        :class="selectedColor?.id === color.id ? 'ring-2 ring-primary' : ''"
                                        class="p-2 border mr-2 mb-4 cursor-pointer transition-all duration-300 hover:shadow-md">
                                        <!-- Color Name -->
                                        <span x-text="color.name" class="text-sm font-medium"
                                            :class="isLightColor(color.code) ? 'text-gray-800' : 'text-white'">
                                        </span>
                                    </div>
                                </template>
                            </div>
                            <!-- Hidden input for selected color -->
                            <input type="hidden" name="color_id" x-model="selectedColor.id">
                        </div>


                        <!-- Keep existing static buttons -->
                        <div>
                            <div class="mb-6 flex items-center gap-5">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24">
                                        <path fill="none" stroke="#333" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5"
                                            d="M7.75 3.5C5.127 3.5 3 5.76 3 8.547C3 14.125 12 20.5 12 20.5s9-6.375 9-11.953C21 5.094 18.873 3.5 16.25 3.5c-1.86 0-3.47 1.136-4.25 2.79c-.78-1.654-2.39-2.79-4.25-2.79" />
                                    </svg>
                                    {{-- <span class="text-secondary text-sm">Add to Wishlist</span> --}}
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 32 32">
                                        <path fill="#333"
                                            d="M27 3H5a2.003 2.003 0 0 0-2 2v22a2.003 2.003 0 0 0 2 2h22a2.003 2.003 0 0 0 2-2V5a2.003 2.003 0 0 0-2-2m0 7h-6V5h6Zm-8-2h-6V5h6Zm0 2v8h-6v-8Zm-8 12H5V12h6Zm2-2h6v7h-6Zm8-8h6v4h-6ZM11 5v5H5V5ZM5 24h6v3H5Zm16 3v-9h6v9Z" />
                                    </svg>
                                    <div x-data="{ open: false }">
                                        <!-- Trigger Button -->
                                        <span class="text-secondary text-sm cursor-pointer" @click="open = true">View
                                            Size Chart</span>

                                        <!-- Modal -->
                                        <div style="display: none" x-show="open"
                                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
                                            @click.away="open = false" x-transition>
                                            <div class="bg-white p-4 rounded-lg shadow-lg max-w-md">
                                                <!-- Close Button -->
                                                <div class="relative">
                                                    <button type="button"
                                                        class="absolute top-0 right-0 bg-black rounded-full text-white text-xs"
                                                        @click="open = false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-width="2"
                                                                d="m8 8l4 4m0 0l4 4m-4-4l4-4m-4 4l-4 4" />
                                                        </svg>
                                                    </button>
                                                    <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/size-chart.jpg"
                                                        alt="Size Chart" class="w-full h-full" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div x-data="{ quantity: 1 }" class="flex items-center gap-5">
                                <div class="p-2 px-4 gap-5 flex items-center rounded-full border">
                                    <span class="text-secondary cursor-pointer"
                                        @click="quantity > 1 ? quantity-- : null">
                                        -
                                    </span>
                                    <span x-text="quantity" class="font-semibold"></span>
                                    <input type="hidden" name="quant" value="1" x-model="quantity">
                                    <span class="text-secondary cursor-pointer" @click="quantity++">
                                        +
                                    </span>
                                </div>
                                <div>
                                    <span class="cursor-pointer">
                                        <button class="p-2 px-4 text-xs rounded-full bg-primary text-white font-bold">
                                            ADD TO CART
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Product Description Start -->
    <section>
        <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl  mt-20" x-data="{ activeTab: 'descriptions' }">
            <!-- Button Navigation -->
            <div class="mb-9 flex-wrap flex items-center justify-center gap-5 md:gap-10">
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
                        {!! $product->description !!}
                    </p>
                </div>

                <div x-show="activeTab === 'information'">
                    <p class="text-secondary">
                        {!! $product->summary !!}
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
    @if ($related_products)
        <section>
            <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl  pb-20">
                <div class="pt-14 pb-10 flex flex-col items-center justify-center gap-3">
                    <h2 class="text-xl font-semibold text-center uppercase">
                        You may also like
                    </h2>
                    <span class="w-10 h-1 bg-primary inline-block"></span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                    @foreach ($related_products as $product)
                        <a href="{{ route('product.details', $product->slug) }}">
                            <div class="group cursor-pointer">
                                <div class="border group-hover:border-[#ab8e66] transition-all duration-300">
                                    <div class="relative w-full">
                                        @php
                                            $photo = explode(',', $product->photo);
                                        @endphp
                                        <img src="{{ $product->thumbnail_url }}" class=" mx-auto object-contain h-[300px]" />
                                        <div class="top-0 left-0 right-0 bottom-0 m-auto absolute h-full">
                                            <div class="h-[300px] flex items-center justify-center">
                                                <div
                                                    class="bg-primary flex rounded-full group-hover:mt-0 transition-all duration-300 ease-in-out group-hover:opacity-100 opacity-0 mt-20">
                                                    {{-- <div class="w-11 h-11 flex items-center justify-end">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path fill="none" stroke="#fff"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M7.75 3.5C5.127 3.5 3 5.76 3 8.547C3 14.125 12 20.5 12 20.5s9-6.375 9-11.953C21 5.094 18.873 3.5 16.25 3.5c-1.86 0-3.47 1.136-4.25 2.79c-.78-1.654-2.39-2.79-4.25-2.79" />
                                                        </svg>
                                                    </div>
                                                    <div class="w-11 h-11 flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path fill="none" stroke="#fff"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
                                                        </svg>
                                                    </div> --}}
                                                    <div class="w-11 h-11 flex items-center justify-center">
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
                                        {{ $product->title }}
                                    </h3>
                                    <div>
                                        <div class="flex items-center justify-center w-full">
                                            {!! $product->echoStar() !!}
                                        </div>
                                        <h4 class="text-sm text-center pb-3">
                                            @if ($product->isDiscount())
                                                <del class="">{{ $product->defaultsize()?->price }}</del>
                                            @endif

                                            <span
                                                class="font-bold text-black">{{ $product->defaultsize()?->final_price }}</span>

                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!-- Products End -->
</div>

<!-- Add this Alpine.js function to check color brightness -->
<script>
    function isLightColor(color) {
        const hex = color.replace('#', '');
        const r = parseInt(hex.substr(0, 2), 16);
        const g = parseInt(hex.substr(2, 2), 16);
        const b = parseInt(hex.substr(4, 2), 16);
        const brightness = ((r * 299) + (g * 587) + (b * 114)) / 1000;
        return brightness > 155;
    }
</script>
