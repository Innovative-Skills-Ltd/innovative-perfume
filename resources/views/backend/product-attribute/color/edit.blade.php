@extends('backend.layouts.master')
@push('title')
    Update Color
@endpush
@section('main-content')
    <div class="card">
        <h5 class="card-header">Update Color</h5>
        <div class="card-body">
            <form method="post" action="{{ route('pa.color.update',$datum->id) }}">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Color <span class="text-danger">*</span>
                        <input id="inputTitle" type="color" name="name" placeholder="Enter Name of Color"
                        value="{{$datum->name}}" class="form-control">
                    </label>
                    @error('name')
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
