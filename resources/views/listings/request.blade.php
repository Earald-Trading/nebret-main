@extends('layouts.app')

@section('content')
    <div class="container container-fluid">
        <form method="POST" action="{{ $route ?? route('uploadRequest.store') }}" enctype="multipart/form-data" id="form">
            <div class="row justify-content-center" style="margin-top: 4rem !important;">
                <div class="card w-50">
                    <div class="card-header">
                        <h4 class="lead text-center py-2 align-self-center">{{ __('Send Your Request') }}</h4>
                    </div>
                    <div class="card-body">
                        {{-- <div class="row">
                            <label for="name" class="col-form-label mb-0 pb-0"><span style="color: red !important;">* </span>Full Name:</label>
                            <input class="form-control mt-0 pt-0 mb-3" name="name" id="name" type="text" required>
                        </div> --}}
                        <div class="row">
                            <label class="col-form-label mb-0 pb-0" for="phone_number"><span style="color: red !important;">* </span>
                               {{ __('Phone Number') }}:
                            </label>
                            <input class="form-control mt-0 pt-0 mb-3" name="phone_number" id="phone_number" type="text" required value={{ old('phone_number')}}>
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <label class="col-form-label mb-0 pb-0" for="house_type"><span style="color: red !important;">* </span>
                               {{ __('House Type') }}
                            </label>
                            <select class="custom-select mt-0 pt-0 mb-3" name="house_type" id="house_type" required>
                                <option selected disabled hidden>-- {{ __('Select the house type') }} --</option>
                                @foreach (\App\Models\HouseType::all() as $h)
                                    <option value="{{ $h['type'] }}" @if (isset($data['house_type']) && $data['house_type'] == $h['type']) selected @endif>{{ __($h['type']) }}</option>
                                @endforeach
                            </select>
                            @error('house_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <label class="col-form-label mb-0 pb-0" for="purchase_type"><span style="color: red !important;">* </span>
                               {{ __('Are you buying or selling?') }}
                            </label>
                            <select class="custom-select mt-0 pt-0 mb-3" name="purchase_type" id="purchase_type" required>
                                <option selected disabled hidden>-- {{ __('Choose one') }} --</option>
                                <option value="sell">{{ __('Sell') }}</option>
                                <option value="buy">{{ __('Buy') }}</option>
                            </select>
                        </div>
                        <div class="row">
                            <label class="col-form-label mb-0 pb-0" for="description"><span style="color: red !important;">* </span>
                               {{ __('Description') }}:
                            </label>
                            <textarea class="form-control mt-0 pt-0 mb-3" name="description" id="description" placeholder="{{ __('Put a brief description about the property you\'re putting request in') }} ..." required>{{ old('desciption') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-end">
                            @csrf
                            <button class="btn btn-primary mr-1" type="submit">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
