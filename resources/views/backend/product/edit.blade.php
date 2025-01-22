@extends('backend.layouts.master')
@push('title')
    Edit Product
@endpush
@section('main-content')
    <div class="card">
        <h5 class="card-header">Edit Product</h5>
        <div class="card-body">
            <form method="post" action="{{ route('product.update', [$product->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Title<span class="text-danger">*</span> </label>
                        <input id="inputTitle" type="text" name="title" placeholder="Exp:- Enter title"
                            value="{{ $product->title }}" class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="model" class="col-form-label">Model </label>
                        <input id="model" type="text" name="model" placeholder="Exp:- Enter Model"
                            value="{{ $product->model }}" class="form-control">
                        @error('model')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mpn" class="col-form-label">Manufacture Name </label>
                        <input id="mpn" type="text" name="mpn" placeholder="Exp:- Enter Manufacture Name"
                            value="{{ $product->mpn }}" class="form-control">
                        @error('mpn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-form-label">Price(BDT)<span class="text-danger">*</span> </label>
                        <input id="price" type="text" name="price" placeholder="Exp:- Enter price" step="1"
                            value="{{ $product->price }}" class="form-control">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="discount" class="col-form-label">Discount(%)</label>
                        <input id="discount" type="number" name="discount" min="0" max="100"
                            placeholder="Exp:- Enter discount" value="{{ $product->discount }}" class="form-control">
                        @error('discount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group" id="final_price_div">
                        <label for="final_price" class="col-form-label">Final Price(tk)<span
                                class="text-danger">*</span></label>
                        <input id="final_price" type="text" name="final_price" min="0" max="500000"
                            placeholder="Exp:- Enter Final Price" value="{{ $product->final_price }}" class="form-control">
                        @error('final_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inventory_cost" class="col-form-label">Inventory Cost</label>
                        <input id="inventory_cost" type="text" name="inventory_cost" min="0" max="1000000"
                            placeholder="Exp:- Enter Inventory Cost" value="{{ $product->inventory_cost }}"
                            class="form-control">
                        @error('inventory_cost')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="summary" class="col-form-label">Summary </label>
                        <textarea class="form-control" id="summary" name="summary">{!! $product->summary !!}</textarea>
                        @error('summary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{!! $product->description !!}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Brand  --}}
                    <x-exchangable-input-select-div label_for='brand' label_title='Brand' :select_data="$brands"
                        select_data_echo='title' :id_for_selected="$product->brand_id" />

                    {{-- {{$categories}} --}}
                    <div class="form-group">
                        <label for="cat_id">Category </label>
                        <select name="cat_id" id="cat_id" class="form-control">
                            <option value="">--Select any category--</option>
                            @foreach ($categories as $key => $cat_data)
                                <option value='{{ $cat_data->id }}' @selected($cat_data->id == $product->cat_id)>{{ $cat_data->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- rest of categories  --}}
                    <div>
                        <span>Other Categories:</span>
                        <div class="input-group mb-3 " id="other_cat_div">
                            @foreach ($others_cats as $other_cat)
                                <div class="input-group-prepend ml-1">
                                    <div class="input-group-text bg-white">
                                        <input type="checkbox" @checked($other_cat->isHasThisProduct($product->slug))
                                            id="other_cats{{ $loop->index }}" name="other_cats_id[{{ $loop->index }}]"
                                            value="{{ $other_cat->id }}">
                                    </div>
                                    <label for="other_cats{{ $loop->index }}"
                                        class="input-group-text">{{ $other_cat->title }}</label>
                                </div>
                            @endforeach

                        </div>
                        @error('condition.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- sub categories --}}
                    <x-exchangable-input-select-div label_for='child_cat' label_title='Sub Category' :select_data="$sub_categories"
                        select_data_echo='title' :id_for_selected="$product->child_cat_id" />


                    <div class="form-group">
                        <label for="is_featured">Is Featured</label><br>
                        <input type="checkbox" name='is_featured' @checked($product->is_featured) id='is_featured'
                            value='1'>
                        <label for="is_featured">Yes</label>
                    </div>


                    <div class="form-group">
                        <label for="upcomming_toggler">Up Comming</label><br>
                        <input type="checkbox" name='upcomming_toggler' @checked($product->upcomming)
                            id='upcomming_toggler' value='1'>
                        <label for="upcomming_toggler">Yes</label>
                        <div class="ml-3" id="div_lunch_date">
                            <label for="upcomming" class="col-form-label">Product Lunch Date </label>
                            <input id="upcomming" type="date" name="upcomming"
                                placeholder="Exp:- Enter Product Lunch Date" value="{{ $product->upcomming }}"
                                class="form-control">
                            @error('upcomming')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock<span class="text-danger">*</span> </label>
                        <input id="quantity" type="number" name="stock" min="0" step="1"
                            placeholder="Exp:- Enter quantity" value="{{ $product->stock }}" class="form-control">
                        @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                {{-- ========== Display Attributes  --}}
                {{-- <div class="mt-4">
                    <h4>Display Attributes:</h4>
                    <div class="ml-3">
                        <!-- display Size -->
                        <x-exchangable-input-select-div label_for='display_size' label_title='Display Size'
                            :select_data="$d_sizes" select_data_echo='size' :id_for_selected="$product->display_size_id" />


                        <!-- display type -->
                        <x-exchangable-input-select-div label_for='display_type' label_title='Display Type'
                            :select_data="$d_types" select_data_echo='name' :id_for_selected="$product->display_type_id" />


                        <!-- d_resolution  -->
                        <div class="form-group">
                            <label for="d_resolution" class="col-form-label">Display Resolution </label>
                            <input id="d_resolution" type="text" name="d_resolution" placeholder="Exp:- 1920 x 1080"
                                value="{{ $product->d_resolution }}" class="form-control">
                            @error('d_resolution')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- d_other  -->
                        <div class="form-group">
                            <label for="d_other" class="col-form-label">Other Features</label>
                            <input id="d_other" type="text" name="d_other"
                                placeholder="Exp:- 220 nits, anti-glare, 171* Viewing Angle"
                                value="{{ $product->d_other }}" class="form-control">
                            @error('d_other')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- touch_screen  -->
                        <div class="form-group">
                            <label for="touch_screen">Touch Screen</label><br>
                            <input type="checkbox" name='touch_screen' @checked($product->touch_screen) id='touch_screen'
                                value="1">
                            Yes
                            @error('touch_screen')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div> --}}

                {{-- =========== Memory Attributes  --}}
                {{-- <div class="mt-4">
                    <h4 class="font-weight-bold">Memory Attributes</h4>
                    <div class="ml-3">
                        <!-- Ram  -->
                        <x-exchangable-input-select-div label_for='ram' label_title='RAM (GB)' :select_data="$rams"
                            select_data_echo='capacity' :id_for_selected="$product->ram_id" />

                        <!-- m_type  -->
                        <div class="form-group">
                            <label for="m_type" class="col-form-label">Memory Type</label>
                            <input id="m_type" type="text" name="m_type" placeholder="Exp:- DDR4"
                                value="{{ $product->m_type }}" class="form-control">
                            @error('m_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- bus_speed  -->
                        <div class="form-group">
                            <label for="bus_speed" class="col-form-label">Bus Speed</label>
                            <input id="bus_speed" type="text" name="bus_speed" placeholder="Exp:- 5100"
                                value="{{ $product->bus_speed }}" class="form-control">
                            @error('bus_speed')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- m_removal  -->
                        <div class="form-group">
                            <label for="m_removal">Memory Removable</label><br>
                            <input type="checkbox" name='m_removal' @checked($product->m_removal) id='m_removal'
                                value='1'>
                            Yes
                            @error('m_removal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- m_slot  -->
                        <div class="form-group">
                            <label for="m_slot" class="col-form-label">Slots</label>
                            <input id="m_slot" type="number" name="m_slot" placeholder="Exp:- 2"
                                value="{{ $product->m_slot }}" class="form-control">
                            @error('m_slot')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Other's information -->
                        <div class="form-group">
                            <label for="m_other" class="col-form-label">Others</label>
                            <textarea class="form-control" id="m_other" name="m_other">{{ $product->m_other }}</textarea>
                            @error('m_other')
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
                                placeholder="2 months" value="{{ $product->replacement_warranty }}"
                                class="form-control">
                            @error('replacement_warranty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- motherboard_warranty  -->
                        <div class="form-group">
                            <label for="motherboard_warranty" class="col-form-label">Motherboard Warranty</label>
                            <input id="motherboard_warranty" type="text" name="motherboard_warranty"
                                placeholder="1 year" value="{{ $product->motherboard_warranty }}" class="form-control">
                            @error('motherboard_warranty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- service_warranty  -->
                        <div class="form-group">
                            <label for="service_warranty" class="col-form-label">Service Warranty</label>
                            <input id="service_warranty" type="text" name="service_warranty" placeholder="Lifetime"
                                value="{{ $product->service_warranty }}" class="form-control">
                            @error('service_warranty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- disclaimer  -->
                        <div class="form-group">
                            <label for="disclaimer" class="col-form-label">Disclaimer</label>
                            <input id="disclaimer" type="text" name="disclaimer" placeholder=""
                                value="{{ $product->disclaimer }}" class="form-control">
                            @error('disclaimer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- note  -->
                        <div class="form-group">
                            <label for="note" class="col-form-label">Note</label>
                            <input id="note" type="text" name="note" placeholder=""
                                value="{{ $product->note }}" class="form-control">
                            @error('note')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- w_details  -->
                        <div class="form-group">
                            <label for="w_details" class="col-form-label">Other Warranty</label>
                            <input id="w_details" type="text" name="w_details"
                                placeholder="Exp:- 2 years warranty (Battery adapter 1 year)"
                                value="{{ $product->w_details }}" class="form-control">
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
                                @foreach ($durations as $duration)
                                    <option value="{{ $duration->id }}" @selected($duration->id == $product->installment?->id)>
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
                        <input name="photo[]" type="file" class="custom-file-input" id="photo" multiple>
                    </div>
                </div>
                <div id="photo_show" class="d-flex">
                    @foreach ($product->img() as $phto)
                        <img src="{{ $phto }}" alt="{{ $product->title }}"
                            class="img-thumbnail rounded h-150px">
                    @endforeach
                </div>
                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                   {{-- serial  --}}
                   <div class="form-group">
                    <label for="serial" class="col-form-label">Serial</label>
                    <input id="serial" type="number" name="serial"
                        placeholder="Exp:- 145" value="{{ old('serial') ? old('serial') : $product->serial }}"
                        class="form-control">
                    @error('serial')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Status </label>
                    <select name="status" class="form-control">
                        <option value="active" @selected($product->status == 'active')>Active</option>
                        <option value="inactive" @selected($product->status == 'inactive')>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote-lite.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <style>
        .h-6 {
            height: 32px;
        }

        .h-150px {
            height: 150px !important;
        }
    </style>
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote-lite.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('#lfm').filemanager('image');

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
                //  show = true;

            });

            $('#isOfferToggler').on('click', function() {
                $('#div_product_offer').toggle();
                //  show = true;

            });

            $('#price').on('keyup change', function() {
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
                console.log(price, discount, final_price);

                $('#final_price').val(final_price);
                // $('#final_price_div').show();
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
                                                        <input id="other_cats${index}" @checked($other_cat->isHasThisProduct($product->slug)) name="other_cats_id[${index}]" value="${cat.id}" type="checkbox">
                                                    </div>
                                                    <label for="other_cats${index}" class="input-group-text">${cat.title}</label>
                                                </div>`;
                            });
                            $('#other_cat_div').html(other_cats);
                            $('#child_cat_id').html(html_option);
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
