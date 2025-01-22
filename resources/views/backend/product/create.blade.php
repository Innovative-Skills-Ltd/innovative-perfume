@extends('backend.layouts.master')
@push('title')
    Add Product
@endpush
@section('main-content')
    <div class="card">
        <h5 class="card-header">Add Product</h5>
        <div class="card-body">
            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Title<span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="title" placeholder="Exp:- Enter title"
                            value="{{ old('title') }}" class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="model" class="col-form-label">Model</label>
                        <input id="model" type="text" name="model" placeholder="Exp:- Enter Model"
                            value="{{ old('model') }}" class="form-control">
                        @error('model')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mpn" class="col-form-label">Manufacture Name</label>
                        <input id="mpn" type="text" name="mpn" placeholder="Exp:- Enter Manufacture Name"
                            value="{{ old('mpn') }}" class="form-control">
                        @error('mpn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-form-label">Price(BDT)<span class="text-danger">*</span> </label>
                        <input id="price" type="text" name="price" placeholder="Exp:- Enter price" step="1"
                            value="{{ old('price') }}" class="form-control">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="discount" class="col-form-label">Discount(%)</label>
                        <input id="discount" type="number" name="discount" min="0" max="100"
                            placeholder="Exp:- Enter discount" value="{{ old('discount') ?? '0' }}" class="form-control">
                        @error('discount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group" id="final_price_div">
                        <label for="final_price" class="col-form-label">Final Price(tk)<span
                                class="text-danger">*</span></label>
                        <input id="final_price" type="text" name="final_price" min="0" max="500000"
                            placeholder="Exp:- Enter Final Price" value="{{ old('final_price') }}" class="form-control">
                        @error('final_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inventory_cost" class="col-form-label">Inventory Cost</label>
                        <input id="inventory_cost" type="text" name="inventory_cost" min="0" max="1000000"
                            placeholder="Exp:- Enter Inventory Cost" value="{{ old('inventory_cost') ?? '0' }}"
                            class="form-control">
                        @error('inventory_cost')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="summary" class="col-form-label">Summary </label>
                        <textarea class="form-control" id="summary" name="summary">{{ old('summary') }}</textarea>
                        @error('summary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Brand  --}}
                    <x-exchangable-input-select-div label_for='brand' label_title='Brand' :select_data="$brands"
                        select_data_echo='title' />
                    {{-- <div class="form-group">
                        <label for="brand_id">Brand</label>
                        <div class="input-group mb-3">
                            <select name="brand_id" class="form-control exchangable_select">
                                <option value="">--Select Brand--</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @selected($brand->id == old('brand_id'))>
                                        {{ $brand->title }}
                                    </option>
                                @endforeach
                            </select>

                            <input id="brand_name" type="text" name="brand_name" min="0" max="1000000"
                                placeholder="Exp:- Enter brand name" value="{{ old('brand_name') }}"
                                class="form-control exchangable_input">

                            <div class="input-group-append">
                                <button type="button" class="btn btn-success  m-0 p-0 input_instead_select"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                                    </svg>
                                </button>
                                <button type="button" class="btn btn-danger m-0 p-0 select_restore"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 9.75h4.875a2.625 2.625 0 0 1 0 5.25H12M8.25 9.75 10.5 7.5M8.25 9.75 10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @error('brand_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @error('brand_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    {{-- {{$categories}} --}}
                    <div class="form-group" id="cat_div">
                        <label for="cat_id">Category</label>
                        <select name="cat_id" id="cat_id" class="form-control">
                            <option value="">--Select any category--</option>
                            @foreach ($categories as $key => $cat_data)
                                <option value='{{ $cat_data->id }}' @selected($cat_data->id == old('cat_id'))>{{ $cat_data->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('cat_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- rest of categories  --}}
                    <div class="d-none" id="paren_other_cat">
                        <span>Other Categories:</span>
                        <div class="input-group mb-3 " id="other_cat_div">

                        </div>
                    </div>

                    <x-exchangable-input-select-div label_for='child_cat' label_title='Sub Category' />
                    {{-- <div class="form-group">
                        <label for="child_cat_id">Sub Category</label>
                        <select name="child_cat" id="child_cat" class="form-control">
                            <option value="">--Select any category--</option>
                        </select>
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="condition">Condtion </label>
                        <select name="condition" id="condition" class="form-control">
                            <option value="">--Select any condition--</option>
                            <option value="Pre-Owned">Pre-Owned</option>
                            <option value="Brand New">Brand New</option>
                        </select>
                        @error('condition')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    <div class="form-group">
                        <label for="is_featured">Is Featured</label><br>
                        <input type="checkbox" name='is_featured' @checked(old('is_featured')) id='is_featured'
                            value='1'>
                        <label for="is_featured">Yes</label>
                    </div>

                    {{-- <div class="form-group">
                        <label for="is_student">Is Student Laptop</label><br>
                        <input type="checkbox" name='is_student' @checked(old('is_student')) id='is_student'
                            value='1'>
                        <label for="is_student">Yes</label>
                    </div> --}}

                    <div class="form-group">
                        <label for="upcomming_toggler">Up Comming</label><br>
                        <input type="checkbox" name='upcomming_toggler' @checked(old('upcomming_toggler'))
                            id='upcomming_toggler' value='1'>
                        <label for="upcomming_toggler">Yes</label>
                        <div class="ml-3" id="div_lunch_date">
                            <label for="upcomming" class="col-form-label">Product Lunch Date </label>
                            <input id="upcomming" type="date" name="upcomming"
                                placeholder="Exp:- Enter Product Lunch Date" value="{{ old('upcomming') }}"
                                class="form-control">
                            @error('upcomming')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="isOfferToggler">Is Offer Products</label><br>
                        <input type="checkbox" name='isOfferToggler' @checked(old('isOfferToggler')) id='isOfferToggler'
                            value='1'>
                        <label for="isOfferToggler">Yes</label>
                        <div class="ml-3" id="div_product_offer">
                            <label for="product_offer_id" class="col-form-label">Select an offer </label>
                            <select name="product_offer_id" class="form-control" id="product_offer_id">
                                <option value="" hidden>Choose....</option>
                                @foreach ($product_offers as $poffer)
                                    <option value="{{ $poffer->id }}" @selected($poffer->id == old('product_offer_id'))>
                                        {{ $poffer->title . ' (' . $poffer->dis }}%)
                                    </option>
                                @endforeach
                            </select>
                            @error('product_offer_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="speacial_feature">Special Features </label>
                        <select name="special_feature[]" class="form-control selectpicker" id="speacial_feature"
                            multiple>
                            <option value="" hidden>Choose....</option>
                            @foreach ($special_features as $sp)
                                <option value="{{ $sp->name }}" @selected($sp->name == old('speacial_feature'))>{{ $sp->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('speacial_feature')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    <div class="form-group">
                        <label for="stock">Stock<span class="text-danger">*</span></label>
                        <input id="quantity" type="number" name="stock" min="0" step=""
                            placeholder="Exp:- Enter quantity" value="{{ old('stock') ?? 1 }}" class="form-control">
                        @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- ======== Processor Attributes  --}}
              {{-- <div class="mt-4">
                    <h4 class="fw-bold">Processor Attributes:</h4>
                    <div class="ml-3">

                        <!-- Processor Brand  -->
                        <div class="form-group">
                            <label for="p_brand" class="col-form-label">Processor Brand </label>
                            <input id="p_brand" type="text" name="p_brand" placeholder="Exp:- 2.8 GHz upto 4.3 GHz"
                                value="{{ old('p_brand') }}" class="form-control">
                            @error('p_brand')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Processore Type  -->
                        <x-exchangable-input-select-div label_for='processor_model' label_title='Prosessor Type'
                            :select_data="$p_models" select_data_echo='name' />

                        <!-- Processore Generation -->
                        <x-exchangable-input-select-div label_for='processor_generation'
                            label_title='Prosessor Generation' :select_data="$p_generations" select_data_echo='name' />

                        <!-- Processor Speed  -->
                        <div class="form-group">
                            <label for="c_speed" class="col-form-label">Processor Speed </label>
                            <input id="c_speed" type="text" name="c_speed" placeholder="Exp:- 2.8 GHz upto 4.3 GHz"
                                value="{{ old('c_speed') }}" class="form-control">
                            @error('c_speed')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- L1 cache  -->
                        <div class="form-group">
                            <label for="l1_cache" class="col-form-label">L1 Cache </label>
                            <input id="l1_cache" type="text" name="l1_cache" placeholder="Exp:- 256 KB"
                                value="{{ old('l1_cache') }}" class="form-control">
                            @error('l1_cache')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- L2 cache  -->
                        <div class="form-group">
                            <label for="l2_cache" class="col-form-label">L2 Cache </label>
                            <input id="l2_cache" type="text" name="l2_cache" placeholder="Exp:- 2 MB"
                                value="{{ old('l2_cache') }}" class="form-control">
                            @error('l2_cache')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- l3_cache  -->
                        <div class="form-group">
                            <label for="l3_cache" class="col-form-label">L3 Cache </label>
                            <input id="l3_cache" type="text" name="l3_cache" placeholder="Exp:- 4 MB"
                                value="{{ old('l3_cache') }}" class="form-control">
                            @error('l3_cache')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- p_core  -->
                        <div class="form-group">
                            <label for="p_core" class="col-form-label">Processore Core</label>
                            <input id="p_core" type="number" name="p_core" placeholder="Exp:- 2"
                                value="{{ old('p_core') }}" class="form-control">
                            @error('p_core')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                            <!-- p_thread  -->
                        <div class="form-group">
                            <label for="p_thread" class="col-form-label">Processore Thread</label>
                            <input id="p_thread" type="number" name="p_thread" placeholder="Exp:- 4"
                                value="{{ old('p_thread') }}" class="form-control">
                            @error('p_thread')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Other's information -->
                        <div class="form-group">
                            <label for="p_other" class="col-form-label">Others</label>
                            <textarea class="form-control" id="p_other" name="p_other">{{ old('p_other') }}</textarea>
                            @error('p_other')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div> --}}

                {{-- ========== Display Attributes  --}}
                {{-- <div class="mt-4">
                    <h4>Display Attributes:</h4>
                    <div class="ml-3">
                        <!-- display Size -->
                        <x-exchangable-input-select-div label_for='display_size' label_title='Display Size'
                            :select_data="$d_sizes" select_data_echo='size' />


                        <!-- display type -->
                        <x-exchangable-input-select-div label_for='display_type' label_title='Display Type'
                            :select_data="$d_types" select_data_echo='name' />



                        <!-- d_resolution  -->
                        <div class="form-group">
                            <label for="d_resolution" class="col-form-label">Display Resolution </label>
                            <input id="d_resolution" type="text" name="d_resolution" placeholder="Exp:- 1920 x 1080"
                                value="{{ old('d_resolution') }}" class="form-control">
                            @error('d_resolution')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- d_other  -->
                        <div class="form-group">
                            <label for="d_other" class="col-form-label">Other Features</label>
                            <input id="d_other" type="text" name="d_other"
                                placeholder="Exp:- 220 nits, anti-glare, 171* Viewing Angle" value="{{ old('d_other') }}"
                                class="form-control">
                            @error('d_other')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- touch_screen  -->
                        <div class="form-group">
                            <label for="touch_screen">Touch Screen</label><br>
                            <input type="checkbox" name='touch_screen' @checked(old('touch_screen')) id='is_featured'
                                value="1">
                            Yes
                            @error('touch_screen')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div> --}}


                {{-- Warranty Attributes --}}
                {{-- <div class="mt-4">
                    <h4>Warranty Attributes</h4>
                    <div class="ml-3">
                        <!-- replacement_warranty  -->
                        <div class="form-group">
                            <label for="replacement_warranty" class="col-form-label">Replacement Warranty</label>
                            <input id="replacement_warranty" type="text" name="replacement_warranty"
                                placeholder="2 months" value="{{ old('replacement_warranty') }}" class="form-control">
                            @error('replacement_warranty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- motherboard_warranty  -->
                        <div class="form-group">
                            <label for="motherboard_warranty" class="col-form-label">Motherboard Warranty</label>
                            <input id="motherboard_warranty" type="text" name="motherboard_warranty"
                                placeholder="1 year" value="{{ old('motherboard_warranty') }}" class="form-control">
                            @error('motherboard_warranty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- service_warranty  -->
                        <div class="form-group">
                            <label for="service_warranty" class="col-form-label">Service Warranty</label>
                            <input id="service_warranty" type="text" name="service_warranty" placeholder="Lifetime"
                                value="{{ old('service_warranty') }}" class="form-control">
                            @error('service_warranty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- disclaimer  -->
                        <div class="form-group">
                            <label for="disclaimer" class="col-form-label">Disclaimer</label>
                            <input id="disclaimer" type="text" name="disclaimer" placeholder=""
                                value="{{ old('disclaimer') }}" class="form-control">
                            @error('disclaimer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- note  -->
                        <div class="form-group">
                            <label for="note" class="col-form-label">Note</label>
                            <input id="note" type="text" name="note" placeholder=""
                                value="{{ old('note') }}" class="form-control">
                            @error('note')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- w_details  -->
                        <div class="form-group">
                            <label for="w_details" class="col-form-label">Other Warranty</label>
                            <input id="w_details" type="text" name="w_details"
                                placeholder="Exp:- 2 years warranty (Battery adapter 1 year)"
                                value="{{ old('w_details') }}" class="form-control">
                            @error('w_details')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div> --}}

                {{-- Installment process --}}
                {{-- <div class="mt-4">
                    <h4>Installment</h4>
                    <div class="ml-3">
                        <!-- installment duration  -->
                        <div class="form-group">
                            <label for="durations">Duration </label>
                            <select name="durations[]" class="form-control selectpicker" id="durations">
                                <option value="">Choose a duration</option>
                                @foreach ($durations as $duration)
                                    <option value="{{ $duration->id }}" @selected($duration->id == old('durations'))>
                                        {{ $duration->year ? $duration->year . ' years ' : ' ' }}{{ $duration->month ? $duration->month . ' month' : ' ' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('durations')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div> --}}

                {{-- Manual upload Photo  --}}
                <label for="photo" class="col-form-label">Photo<span class="text-danger">*</span> </label>
                <div class="input-group is-invalid">
                    <div class="custom-file">
                        <label class="custom-file-label" for="photo">Choose file...</label>
                        <input name="photo[]" type="file" class="custom-file-input" id="photo" required multiple>
                    </div>
                </div>
                <div id="photo_show" class="d-flex"></div>
                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                {{-- serial  --}}
                <div class="form-group">
                    <label for="serial" class="col-form-label">Serial</label>
                    <input id="serial" type="number" name="serial"
                        placeholder="Exp:- 145" value="{{ old('serial') ? old('serial') : $serial }}"
                        class="form-control">
                    @error('serial')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        #div_lunch_date {
            display: none;
        }

        #div_product_offer {
            display: none;
        }

        .h-6 {
            height: 32px;
        }

        .h-150px {
            height: 150px !important;
        }
    </style>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote-lite.css') }}">
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('backend/summernote/summernote-lite.js') }}"></script>

    <script>
        // $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150,
            });
            $('#description').summernote({
                placeholder: "Write detail description.....",
                tabsize: 2,
                height: 200
            });

            let show = false;
            $('#upcomming_toggler').on('click', function() {
                $('#div_lunch_date').toggle();
            });

            $('#isOfferToggler').on('click', function() {
                $('#div_product_offer').toggle();
            });
            $('#price').on('keyup', function() {
                let price_with_comma = $(this).val() ? $(this).val() : '0';
                let final_price_with_comma = $('#final_price').val() ? $('#final_price').val() : '0';

                let price = parseInt(price_with_comma.replace(/,/g, ''));
                let final_price = parseInt(final_price_with_comma.replace(/,/g, ''));
                let discount = Math.round(((price - final_price) * 100) / price);

                $('#discount').val(discount);
            });

            $('#final_price').on('keyup change', function() {
                let price_with_comma = $('#price').val() ? $('#price').val() : '0';
                let final_price_with_comma = $(this).val() ? $(this).val() : '0';

                let price = parseInt(price_with_comma.replace(/,/g, ''));
                let final_price = parseInt(final_price_with_comma.replace(/,/g, ''));
                let discount = Math.round(((price - final_price) * 100) / price);

                $('#discount').val(discount);
            });

            $('#discount').on('keyup', function() {
                let price_with_comma = $('#price').val() ? $('#price').val() : '0';
                let discount = $('#discount').val() ? $('#discount').val() : 0;
                let price = parseInt(price_with_comma.replace(/,/g, ''));
                let final_price = price - Math.round(price * discount / 100);

                $('#final_price').val(final_price);
                $('#final_price_div').show();
            });

            $('#cat_id').change(function() {
                var cat_id = $(this).val();
                // alert(cat_id);
                if (cat_id != null) {
                    // Ajax call
                    $.ajax({
                        url: "/admin/category/" + cat_id + "/child",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: cat_id
                        },
                        type: "POST",
                        success: function(response) {
                            if (typeof(response) != 'object') {
                                response = $.parseJSON(response)
                            }

                            var html_option =
                                "<option value=''>----Select sub category----</option>";
                            if (response.status) {
                                var data = response.data.child_cats;
                                if (data) {
                                    $.each(data, function(id, title) {
                                        html_option += "<option value='" + id + "'>" +
                                            title +
                                            "</option>"
                                    });
                                }
                            }
                            let other_cats = '';
                            $.each(response.data.categories, function(index, cat) {
                                other_cats += `<div class="input-group-prepend ml-1">
                                                    <div class="input-group-text bg-white">
                                                        <input id="other_cats${index}" name="other_cats_id[${index}]" value="${cat.id}" type="checkbox">
                                                    </div>
                                                    <label for="other_cats${index}" class="input-group-text">${cat.title}</label>
                                                </div>`;
                            });

                            $('#paren_other_cat').removeClass('d-none');
                            $('#other_cat_div').html(other_cats);
                            $('#child_cat').html(html_option);
                        }
                    });
                } else {}
            });


            //custom input instead of select
            $('.select_restore,.exchangable_input').hide();

            $('.input_instead_select').each(function(index) {
                $(this).on('click', function() {
                    $('.exchangable_select').eq(index).hide(100);
                    $('.exchangable_input').eq(index).show(100);
                    $(this).hide(100);
                    $('.select_restore').eq(index).show(100);
                });
            });
            $('.select_restore').each(function(index) {
                $(this).on('click', function() {
                    $('.exchangable_input').eq(index).hide(100);
                    $('.exchangable_select').eq(index).show(100);
                    $(this).hide(100);
                    $('.input_instead_select').eq(index).show(100);
                });
            });


            //photo show
            $('#photo').on('change', function(event) {
                let previews = [];
                let img = [];
                let images_div = '';
                console.log();
                let photo_length = event.target.files.length;
                let inti = 0;
                for (const file of event.target.files) {
                    ++inti;
                    const reader = new FileReader()
                    reader.onload = (e) => {
                        // console.log(e.target.result);
                        previews.push(e.target.result);
                        images_div +=
                            `<img src='${e.target.result}' alt='Not Found' class='img-thumbnail rounded h-150px'>`;
                        if (inti == photo_length) {
                            photoShow();
                        }
                        // console.log(images_div);
                    }
                    reader.readAsDataURL(file);

                }

                function photoShow() {
                    $('#photo_show').html(images_div);
                }

            });
        });
    </script>
@endpush
