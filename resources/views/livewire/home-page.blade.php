<div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    {{-- Alert message  --}}
    @if ($error = session('error'))
        <script>
            toastr.success("{{ $error }}")
        </script>
    @endif
    @if ($success = session('success'))
        <script>
            toastr.success("{{ $success }}")
        </script>
    @endif
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-pagination-bullet-active {
            background: none !important;
            border: 1px solid #ab8e66 !important;
            width: 16px !important;
            height: 16px !important;
        }

        .deals-of-the-day-swiper-pagination {
            display: flex !important;
            align-items: center;
            justify-content: center;
        }

        .hero-swiper-pagination {
            display: flex !important;
            align-items: center;
            justify-content: center;
            margin-top: -20px;
            z-index: 20;
            position: relative !important;
        }

        .news-swiper-pagination {
            display: flex !important;
            align-items: center;
            justify-content: center;
        }
    </style>

    <!-- Hero Section Start -->
    <section class="mt-5 mb-10">
        <div class="container mx-auto px-2 md:px-0">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="col-span-1 md:col-span-2 row-span-2 border w-full overflow-hidden">
                    <div class="swiper hero-swiper">
                        <div class="swiper-wrapper">
                            <div style="width: 100%; height: 100%"
                                class="swiper-slide bg-no-repeat object-cover bg- w-full p-5 md:pl-12 md:pt-44 md:pb-48 md:pr-12 flex flex-col gap-16 relative">
                                <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg"
                                    class="absolute top-0 left-0 bottom-0 -z-10 right-0 w-full h-full" />
                                <div>
                                    <h3
                                        class="font-semibold animate__fadeInDownBig animate__animated uppercase mb-3 text-primary relative transition-all duration-500">
                                        Sale Up To 40%
                                    </h3>
                                    <h1 class="mb-2 text-4xl font-medium animate__fadeInLeftBig animate__animated">
                                        A Range of Perfume
                                    </h1>
                                    <p class="text-lg font-medium animate__fadeInRightBig animate__animated">
                                        New Price:
                                        <span class="text-3xl font-semibold text-primary">$170.00</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="text-sm font-bold pb-2 border-b-2 uppercase border-black animate__fadeInUpBig  animate__animated">
                                        Shop Now
                                    </button>
                                </div>
                            </div>
                            <div style="width: 100%; height: 100%"
                                class="swiper-slide bg-no-repeat object-cover bg- w-full p-5 md:pl-12 md:pt-44 md:pb-48 md:pr-12 flex flex-col gap-16 relative">
                                <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg"
                                    class="absolute top-0 left-0 bottom-0 -z-10 right-0 w-full h-full" />
                                <div>
                                    <h3
                                        class="font-semibold uppercase mb-3 text-primary animate__fadeInDownBig animate__animated">
                                        Sale Up To 50%
                                    </h3>
                                    <h1 class="mb-2 text-4xl font-medium animate__fadeInLeftBig animate__animated">
                                        A Range of Perfume
                                    </h1>
                                    <p class="text-lg font-medium animate__fadeInRightBig animate__animated">
                                        New Price:
                                        <span class="text-3xl font-semibold text-primary">$170.00</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="text-sm font-bold pb-2 border-b-2 uppercase border-black animate__fadeInUpBig  animate__animated">
                                        Shop Now
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hero-swiper-pagination"></div>
                    </div>
                </div>

                <a href="product_details.html">
                    <div style="width: 100%; height: 298px" class="bg-no-repeat py-14 pl-7 pr-40 relative">
                        <img class="absolute top-0 bottom-0 left-0 right-0 w-full h-full -z-10"
                            src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg" />
                        <h3 x-bind:class="active ? 'top-0 opacity-100' : 'top-12 opacity-0'"
                            class="font-semibold uppercase mb-3 text-primary relative transition-all duration-500">
                            Pick Your Items
                        </h3>
                        <p class="text-secondary mb-4">Adipiscing elit curabitur</p>

                        <button class="text-sm font-bold pb-2 border-b-2 uppercase border-black">
                            Shop Now
                        </button>
                    </div>
                </a>

                <a href="product_details.html">
                    <div style="width: 100%; height: 298px" class="bg-no-repeat py-14 pl-7 pr-40 relative">
                        <img class="absolute top-0 bottom-0 left-0 right-0 w-full h-full -z-10"
                            src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg" />
                        <h3 class="text-2xl mb-2 font-bold">Pick Your Items</h3>
                        <p class="text-secondary mb-4">Adipiscing elit curabitur</p>

                        <button class="text-sm font-bold pb-2 border-b-2 uppercase border-black">
                            Shop Now
                        </button>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Deal of The Day Start -->
    <section>
        <div class="container mx-auto px-2 md:px-0">
            <h3 class="pb-3 text-center text-3xl font-semibold">DEAL OF THE DAY</h3>
            <div class="text-center mb-14">
                <span class="w-16 bg-primary inline-block h-1"></span>
            </div>
            <div class="swiper deals-of-the-day-swiper pb-20">
                <div class="swiper-wrapper pb-5">
                    @foreach($new_arrival as $na)
                        <a class="swiper-slide" href="product_details.html">
                            <div class="group cursor-pointer">
                                <div class="border group-hover:border-[#ab8e66] transition-all duration-300">
                                    <div class="relative w-full">
                                        <img src="{{asset($na->photo)}}" title="{{$na->title}}"
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
                                    <div class="flex items-center justify-center gap-3 mb-3 m-3">
                                        <div
                                            class="bg-tertiary w-full h-full rounded-full text-xs flex flex-col items-center justify-center gap-1 py-3">
                                            <h4 class="font-bold">00</h4>
                                            <span>DAYS</span>
                                        </div>
                                        <div
                                            class="bg-tertiary w-full h-full rounded-full text-xs flex flex-col items-center justify-center gap-1 py-3">
                                            <h4 class="font-bold">00</h4>
                                            <span>HRS</span>
                                        </div>
                                        <div
                                            class="bg-tertiary w-full h-full rounded-full text-xs flex flex-col items-center justify-center gap-1 py-3">
                                            <h4 class="font-bold">00</h4>
                                            <span>MINS</span>
                                        </div>
                                        <div
                                            class="bg-tertiary w-full h-full rounded-full text-xs flex flex-col items-center justify-center gap-1 py-3">
                                            <h4 class="font-bold">00</h4>
                                            <span>SECS</span>
                                        </div>
                                    </div>
                                    <h3 class="text-primary text-lg font-medium text-center mb-2">
                                        {{$na->title}}
                                    </h3>
                                    <div>
                                        <div class="flex items-center justify-center w-full">
                                            @if (count($na->reviews ?: []) > 0)
                                                @php
                                                    $star = $na->avgRating();
                                                @endphp
                                                @for ($i = 1; $i <= $star; $i++)
                                                    <span>
                                                        <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                                    stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                @endfor
                                                @for ($i = 1; $i <= 5 - $star; $i++)
                                                    <span>
                                                        <svg viewBox="0 0 24 24" fill="white" class="w-[18px] h-[18px]"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                                    stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                @endfor
                                            @else
                                                <span>
                                                    <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path
                                                                d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                                stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span>
                                                    <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path
                                                                d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                                stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span>
                                                    <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path
                                                                d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                                stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span>
                                                    <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path
                                                                d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                                stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span>
                                                    <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path
                                                                d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                                stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            @endif
                                        </div>
                                        <h4 class="text-sm text-center pb-3">
                                            <del class="">{{$na->price}}</del>
                                            <span class="font-bold text-black">{{$na->final_price}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="deals-of-the-day-swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- Deal of The Day End -->

    <!-- Best Collection Start -->
    <section class="my-10">
        <div class="container grid-cols-1 grid md:grid-cols-2 gap-5 mx-auto">
            <a href="product_details.html">
                <div style="width: 100%"
                    class="bg-no-repeat p-5 md:h-[300px] md:py-14 md:pl-10 bg-cover md:pr-[300px] relative">
                    <img class="absolute top-0 bottom-0 left-0 right-0 -z-10 w-full h-full"
                        src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg" />
                    <h3 class="text-sm font-semibold mb-1 text-primary">
                        TOP STAFF PICK
                    </h3>
                    <h2 class="mb-3 text-2xl font-medium">Best Collection</h2>
                    <p class="text-secondary mb-7">
                        Proin interdum magnaprimis id consequal
                    </p>

                    <button class="text-sm font-bold pb-2 border-b-2 uppercase border-black">
                        Shop Now
                    </button>
                </div>
            </a>
            <a href="product_details.html">
                <div style="width: 100%; height: 300px"
                    class="bg-no-repeat p-5 md:py-14 md:pl-10 bg-cover md:pr-[300px] relative">
                    <img class="absolute top-0 bottom-0 left-0 right-0 -z-10 w-full h-full"
                        src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg" />
                    <h3 class="text-sm font-semibold mb-1 text-primary">
                        TOP STAFF PICK
                    </h3>
                    <h2 class="mb-3 text-2xl font-medium">Best Collection</h2>
                    <p class="text-secondary mb-7">
                        Proin interdum magnaprimis id consequal
                    </p>

                    <button class="text-sm font-bold pb-2 border-b-2 uppercase border-black">
                        Shop Now
                    </button>
                </div>
            </a>
        </div>
    </section>
    <!-- Best Collection End -->
    <!-- Collection Arrival Start  -->
    <section class="mt-5">
        <div style="width: 100%"
            class="container mx-auto px-2 md:px-0 flex flex-col items-center justify-center py-12 px-4 bg-no-repeat bg-cover relative">
            <img class="absolute top-0 right-0 bottom-0 left-0 w-full h-full -z-10"
                src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg" />
            <h2 class="font-medium text-4xl mb-2">Collection Arrived</h2>
            <p class="mb-4 text-hard text-center">
                You have no items & Are you<br />
                ready to use? come & shop with us!
            </p>
            <p class="mb-5 text-hard">
                Price from:
                <span class="text-primary text-3xl font-semibold">$45.00</span>
            </p>
            <button class="text-sm font-bold pb-2 border-b-2 uppercase border-black">
                Shop Now
            </button>
        </div>
    </section>
    <!-- Collection Arrival End  -->
    <!-- Products Start -->
    <section class="my-20">
        <div class="container mx-auto px-2 md:px-0">
            <div class="flex flex-wrap gap-5 items-center justify-center mb-14">
                <div class="mx-5">
                    <button class="font-medium text-lg rounded-full bg-black text-white py-2 px-6">
                        Bestseller
                    </button>
                </div>
                <div class="mx-5">
                    <button class="font-medium text-lg rounded-full bg-primary text-white py-2 px-6">
                        New Arrivals
                    </button>
                </div>
                <div class="mx-5">
                    <button class="font-medium text-lg rounded-full bg-black text-white py-2 px-6">
                        Top Rated
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5"></div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                @foreach ($new_arrival as $new_arra)
                <a href="product_details.html">
                    <div class="group cursor-pointer">
                        <div class="border group-hover:border-[#ab8e66] transition-all duration-300">
                            <div class="relative w-full">
                                <img src="{{$new_arra->photo}}"
                                    class="w-full" />
                                <div class="top-0 left-0 right-0 bottom-0 m-auto absolute h-full">
                                    <div class="h-full flex items-center justify-center">
                                        <div
                                            class="bg-primary flex rounded-full group-hover:mt-0 transition-all duration-300 ease-in-out group-hover:opacity-100 opacity-0 mt-20">
                                            <div class="w-11 h-11 flex items-center justify-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="M7.75 3.5C5.127 3.5 3 5.76 3 8.547C3 14.125 12 20.5 12 20.5s9-6.375 9-11.953C21 5.094 18.873 3.5 16.25 3.5c-1.86 0-3.47 1.136-4.25 2.79c-.78-1.654-2.39-2.79-4.25-2.79" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-start">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 56 56">
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
                                {{$new_arra->title}}
                            </h3>
                            <div>
                                <div class="flex items-center justify-center w-full">
                                    @if (count($new_arra->reviews ?: []) > 0)
                                        @php
                                            $star = $new_arra->avgRating();
                                        @endphp
                                        @for ($i = 1; $i <= $star; $i++)
                                            <span>
                                                <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                            stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        @endfor
                                        @for ($i = 1; $i <= 5 - $star; $i++)
                                            <span>
                                                <svg viewBox="0 0 24 24" fill="white" class="w-[18px] h-[18px]"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                            stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        @endfor
                                    @else
                                        <span>
                                            <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                        stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <span>
                                            <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                        stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <span>
                                            <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                        stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <span>
                                            <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                        stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <span>
                                            <svg viewBox="0 0 24 24" fill="rgb(255, 206, 49)" class="w-[18px] h-[18px]"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z"
                                                        stroke="rgb(255, 206, 49)" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    @endif
                                </div>
                                <h4 class="text-sm text-center pb-3">
                                    <del class="">{{$new_arra->price}}</del>
                                    <span class="font-bold text-black">{{$new_arra->price - $new_arra->discount}}</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                {{-- <a href="product_details.html">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="M7.75 3.5C5.127 3.5 3 5.76 3 8.547C3 14.125 12 20.5 12 20.5s9-6.375 9-11.953C21 5.094 18.873 3.5 16.25 3.5c-1.86 0-3.47 1.136-4.25 2.79c-.78-1.654-2.39-2.79-4.25-2.79" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
                                                </svg>
                                            </div>
                                            <div class="w-11 h-11 flex items-center justify-start">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 56 56">
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
                </a> --}}
            </div>
        </div>
    </section>
    <!-- Products End -->
    <!-- Services Start -->
    <section class="bg-primary py-12">
        <div class="container mx-auto px-2 md:px-0 grid grid-cols-1 md:grid-cols-3">
            <div class="flex items-center gap-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24">
                    <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2">
                        <path
                            d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.4 22.4 0 0 1-4 2" />
                        <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0m1 7v5s3.03-.55 4-2c1.08-1.62 0-5 0-5" />
                    </g>
                </svg>
                <div>
                    <h3 class="mb-2 text-white font-semibold uppercase">
                        EU FREE DELIVERY
                    </h3>
                    <p class="text-white">
                        Free Delivery on all order from EU with price more than $90.00
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24">
                    <path fill="#fff"
                        d="M11.896 18a.75.75 0 0 1-.75.75c-3.792 0-6.896-3.005-6.896-6.75s3.104-6.75 6.896-6.75c3.105 0 5.749 2.015 6.605 4.801l.603-1.02a.75.75 0 0 1 1.292.763l-1.63 2.755a.75.75 0 0 1-1.014.272L14.18 11.23a.75.75 0 1 1 .737-1.307l1.472.83c-.574-2.288-2.691-4.003-5.242-4.003C8.149 6.75 5.75 9.117 5.75 12s2.399 5.25 5.396 5.25a.75.75 0 0 1 .75.75" />
                </svg>
                <div>
                    <h3 class="mb-2 text-white font-semibold uppercase">
                        Money Back Gurantee
                    </h3>
                    <p class="text-white">
                        Free Delivery on all order from EU with price more than $90.00
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24">
                    <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2">
                        <path d="M5 13a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2z" />
                        <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0-2 0m-3-5V7a4 4 0 1 1 8 0v4" />
                    </g>
                </svg>
                <div>
                    <h3 class="mb-2 text-white font-semibold uppercase">
                        Online Support 24/7
                    </h3>
                    <p class="text-white">
                        Free Delivery on all order from EU with price more than $90.00
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Services End -->
    <!-- Latest News Start -->
    <section class="my-20">
        <div class="container mx-auto px-2 md:px-0">
            <h3 class="pb-3 text-center text-3xl font-semibold">Our Latest News</h3>
            <div class="text-center mb-14">
                <span class="w-16 bg-primary inline-block h-1"></span>
            </div>
            <div class="swiper news-swiper pb-20">
                <div class="swiper-wrapper pb-5">
                    <a href="product_details.html" class="swiper-slide">
                        <div>
                            <div class="relative group">
                                <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/slider-blog-thumb-2.jpg"
                                    class="object-cover h-96" />
                                <div
                                    class="bg-black top-0 right-0 left-0 absolute w-full h-96 group-hover:opacity-75 opacity-0 transition-all duration-150">
                                </div>
                            </div>
                            <p class="text-hard mt-2 mb-1 text-xs font-medium">
                                August 17,9:14 AM
                            </p>
                            <h3 class="mb-4 text-xl font-medium text-black">
                                We bring you the best
                            </h3>
                            <p class="text-hard mb-2">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. A
                                fugiat reprehenderit odio consectetur sequi hic accusamus
                                explicabo ex repudiandae perspiciatis!
                            </p>
                            <button class="text-sm font-bold pb-2 border-b-2 uppercase border-black">
                                Shop Now
                            </button>
                        </div>
                    </a>
                    <a href="product_details.html" class="swiper-slide">
                        <div>
                            <div class="relative group">
                                <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/slider-blog-thumb-2.jpg"
                                    class="object-cover h-96" />
                                <div
                                    class="bg-black top-0 right-0 left-0 absolute w-full h-96 group-hover:opacity-75 opacity-0 transition-all duration-150">
                                </div>
                            </div>
                            <p class="text-hard mt-2 mb-1 text-xs font-medium">
                                August 17,9:14 AM
                            </p>
                            <h3 class="mb-4 text-xl font-medium text-black">
                                We bring you the best
                            </h3>
                            <p class="text-hard mb-2">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. A
                                fugiat reprehenderit odio consectetur sequi hic accusamus
                                explicabo ex repudiandae perspiciatis!
                            </p>
                            <button class="text-sm font-bold pb-2 border-b-2 uppercase border-black">
                                Shop Now
                            </button>
                        </div>
                    </a>
                    <a href="product_details.html" class="swiper-slide">
                        <div>
                            <div class="relative group">
                                <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/slider-blog-thumb-2.jpg"
                                    class="object-cover h-96" />
                                <div
                                    class="bg-black top-0 right-0 left-0 absolute w-full h-96 group-hover:opacity-75 opacity-0 transition-all duration-150">
                                </div>
                            </div>
                            <p class="text-hard mt-2 mb-1 text-xs font-medium">
                                August 17,9:14 AM
                            </p>
                            <h3 class="mb-4 text-xl font-medium text-black">
                                We bring you the best
                            </h3>
                            <p class="text-hard mb-2">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. A
                                fugiat reprehenderit odio consectetur sequi hic accusamus
                                explicabo ex repudiandae perspiciatis!
                            </p>
                            <button class="text-sm font-bold pb-2 border-b-2 uppercase border-black">
                                Shop Now
                            </button>
                        </div>
                    </a>
                    <a href="product_details.html" class="swiper-slide">
                        <div>
                            <div class="relative group">
                                <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/slider-blog-thumb-2.jpg"
                                    class="object-cover h-96" />
                                <div
                                    class="bg-black top-0 right-0 left-0 absolute w-full h-96 group-hover:opacity-75 opacity-0 transition-all duration-150">
                                </div>
                            </div>
                            <p class="text-hard mt-2 mb-1 text-xs font-medium">
                                August 17,9:14 AM
                            </p>
                            <h3 class="mb-4 text-xl font-medium text-black">
                                We bring you the best
                            </h3>
                            <p class="text-hard mb-2">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. A
                                fugiat reprehenderit odio consectetur sequi hic accusamus
                                explicabo ex repudiandae perspiciatis!
                            </p>
                            <button class="text-sm font-bold pb-2 border-b-2 uppercase border-black">
                                Shop Now
                            </button>
                        </div>
                    </a>
                    <a href="product_details.html" class="swiper-slide">
                        <div>
                            <div class="relative group">
                                <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/slider-blog-thumb-2.jpg"
                                    class="object-cover h-96" />
                                <div
                                    class="bg-black top-0 right-0 left-0 absolute w-full h-96 group-hover:opacity-75 opacity-0 transition-all duration-150">
                                </div>
                            </div>
                            <p class="text-hard mt-2 mb-1 text-xs font-medium">
                                August 17,9:14 AM
                            </p>
                            <h3 class="mb-4 text-xl font-medium text-black">
                                We bring you the best
                            </h3>
                            <p class="text-hard mb-2">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. A
                                fugiat reprehenderit odio consectetur sequi hic accusamus
                                explicabo ex repudiandae perspiciatis!
                            </p>
                            <button class="text-sm font-bold pb-2 border-b-2 uppercase border-black">
                                Shop Now
                            </button>
                        </div>
                    </a>
                </div>
                <div class="news-swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- Latest News End -->
    <hr />
    <!-- Instagram Feed Start -->
    <section>
        <div class="text-center my-10">
            <div class="flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24">
                    <g fill="none" stroke="#ab8e66" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 16a4 4 0 1 0 0-8a4 4 0 0 0 0 8" />
                        <path d="M3 16V8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="m17.5 6.51l.01-.011" />
                    </g>
                </svg>
            </div>
            <h3 class="pb-3 text-center text-3xl font-semibold">INSTAGRAM FEED</h3>
            <div class="text-center mb-14">
                <span class="w-16 bg-primary inline-block h-1"></span>
            </div>
        </div>
        <div class="md:flex-nowrap md:flex-row flex flex-col">
            <a href="https://instagram.com" target="_blank">
                <div class="group relative cursor-pointer w-full">
                    <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg"
                        class="w-full h-72 object-cover" />

                    <div
                        class="group-hover:h-72 group-hover:w-full h-0 w-0 absolute m-auto top-0 left-0 right-0 bottom-0 cursor-pointer transition-all duration-300 ease-out bg-black group opacity-0 group-hover:opacity-30">
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        class="absolute group-hover:opacity-100 opacity-0 transition-all duration-300 top-0 right-0 bottom-0 left-0 m-auto">
                        <g fill="none" stroke="#fff" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 16a4 4 0 1 0 0-8a4 4 0 0 0 0 8" />
                            <path d="M3 16V8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m17.5 6.51l.01-.011" />
                        </g>
                    </svg>
                </div>
            </a>
            <a href="https://instagram.com" target="_blank">
                <div class="group relative cursor-pointer w-full">
                    <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg"
                        class="w-full h-72 object-cover" />

                    <div
                        class="group-hover:h-72 group-hover:w-full h-0 w-0 absolute m-auto top-0 left-0 right-0 bottom-0 cursor-pointer transition-all duration-300 ease-out bg-black group opacity-0 group-hover:opacity-30">
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        class="absolute group-hover:opacity-100 opacity-0 transition-all duration-300 top-0 right-0 bottom-0 left-0 m-auto">
                        <g fill="none" stroke="#fff" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 16a4 4 0 1 0 0-8a4 4 0 0 0 0 8" />
                            <path d="M3 16V8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m17.5 6.51l.01-.011" />
                        </g>
                    </svg>
                </div>
            </a>
            <a href="https://instagram.com" target="_blank">
                <div class="group relative cursor-pointer w-full">
                    <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg"
                        class="w-full h-72 object-cover" />

                    <div
                        class="group-hover:h-72 group-hover:w-full h-0 w-0 absolute m-auto top-0 left-0 right-0 bottom-0 cursor-pointer transition-all duration-300 ease-out bg-black group opacity-0 group-hover:opacity-30">
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        class="absolute group-hover:opacity-100 opacity-0 transition-all duration-300 top-0 right-0 bottom-0 left-0 m-auto">
                        <g fill="none" stroke="#fff" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 16a4 4 0 1 0 0-8a4 4 0 0 0 0 8" />
                            <path d="M3 16V8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m17.5 6.51l.01-.011" />
                        </g>
                    </svg>
                </div>
            </a>
            <a href="https://instagram.com" target="_blank">
                <div class="group relative cursor-pointer w-full">
                    <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg"
                        class="w-full h-72 object-cover" />

                    <div
                        class="group-hover:h-72 group-hover:w-full h-0 w-0 absolute m-auto top-0 left-0 right-0 bottom-0 cursor-pointer transition-all duration-300 ease-out bg-black group opacity-0 group-hover:opacity-30">
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        class="absolute group-hover:opacity-100 opacity-0 transition-all duration-300 top-0 right-0 bottom-0 left-0 m-auto">
                        <g fill="none" stroke="#fff" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 16a4 4 0 1 0 0-8a4 4 0 0 0 0 8" />
                            <path d="M3 16V8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m17.5 6.51l.01-.011" />
                        </g>
                    </svg>
                </div>
            </a>
            <a href="https://instagram.com" target="_blank">
                <div class="group relative cursor-pointer w-full">
                    <img src="https://dreamingtheme.kiendaotac.com/html/stelina/assets/images/banner-home-6.jpg"
                        class="w-full h-72 object-cover" />

                    <div
                        class="group-hover:h-72 group-hover:w-full h-0 w-0 absolute m-auto top-0 left-0 right-0 bottom-0 cursor-pointer transition-all duration-300 ease-out bg-black group opacity-0 group-hover:opacity-30">
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        class="absolute group-hover:opacity-100 opacity-0 transition-all duration-300 top-0 right-0 bottom-0 left-0 m-auto">
                        <g fill="none" stroke="#fff" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 16a4 4 0 1 0 0-8a4 4 0 0 0 0 8" />
                            <path d="M3 16V8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m17.5 6.51l.01-.011" />
                        </g>
                    </svg>
                </div>
            </a>
        </div>
    </section>
    <!-- Instagram Feed End -->


</div>
