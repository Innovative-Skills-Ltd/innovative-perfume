<a class="group cursor-pointer" href="{{ route('product.details', $product->slug) }}">
    <div class="border group-hover:border-[#ab8e66] transition-all duration-300">
        <div class="relative w-full">
            @if ($product->photo)
                @php
                    $photo = explode(',', $product->photo);
                @endphp
                <img src="{{ $photo[0] }}" class="object-container pimg h-[180px] mx-auto" alt="{{ $product->photo }}">
            @else
                <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="object-container pimg h-[180px]"
                    alt="avatar.png">
            @endif

            @if ($product->stock < 1)
                <span class="text-[14px] text-[#fff] bg-[#ef4a23] absolute top-[-8px] left-[-8px] px-2 py-[2px] rounded-r-lg">
                    Out Of Stock
                </span>
            @endif
            <div class="top-0 left-0 right-0 bottom-0 m-auto absolute h-full">
                <!-- Action buttons -->
                <div class="h-full flex items-center justify-center">
                    <div class="bg-primary flex rounded-full group-hover:mt-0 transition-all duration-300 ease-in-out group-hover:opacity-100 opacity-0 mt-20">
                        <!-- Your existing action buttons -->
                    </div>
                </div>
            </div>
            <!-- New tag -->
            <div class="items-center justify-center absolute top-2 left-2">
                <div class="bg-primary w-10 h-5 flex items-center justify-center text-white font-bold rounded-full">
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
                @if($product->sizes->where('is_show', true)->first())
                    @php $defaultSize = $product->sizes->where('is_show', true)->first(); @endphp
                    @if($defaultSize->discount > 0)
                        <del class="">BDT {{ number_format($defaultSize->price, 2) }}</del>
                    @endif
                    <span class="font-bold text-black">BDT {{ number_format($defaultSize->final_price, 2) }}</span>
                    <span class="text-xs">({{ $defaultSize->size->size }})</span>
                @endif
            </h4>
        </div>
    </div>
</a>
