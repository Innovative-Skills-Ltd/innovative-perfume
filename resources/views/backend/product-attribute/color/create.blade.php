@extends('backend.layouts.master')
@push('title')
    Add Color
@endpush
@push('styles')
    <style>
        .max-width-90px {
            max-width: 90px;
        }
    </style>
@endpush
@section('main-content')
    <div class="card">
        <h5 class="card-header">Add Color</h5>
        <div class="card-body">
            <form method="post" action="{{ route('pa.color.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Color <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="color" name="name" class="form-control max-width-90px" placeholder="Enter Name of Color"
                        value="{{ old('name') }}" class="form-control">
                    @error('name')
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
