@extends('layouts.app')

@section('content')
    @php $required = empty($data) ? 'required' : '' @endphp
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{ __($header) }}</h1>
            <p class="lead">{{ __($description) }}
            <span style="color: red !important;">{{ __('All fields must be filled!') }}</span></p>
        </div>
    </div>
    <div class="container row m-auto p-auto card col-md-7">
        <form method="POST" action="{{ $route ?? route('listings.store') }}" enctype="multipart/form-data" id="form">
            <div class="col">
                <div class="row">
                    <div class="my-3 col-8">
                        <label class="form-label">{{ __('User Email') }}</label>
                        <input class="form-control" type="email" name="user_email" id="id_email" {{ $required }}
                            value={{ old('user_email') ?? $data['user_email'] ?? '' }}>
                        @error('user_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="my-3 col">
                        <label class="form-label">{{ __('Price') }}</label>
                        @if ($price = intval($data['price'] ?? 0) / 100) @endif
                        <input class="form-control" type="number" step=0.01 name="price" id="id_price" {{ $required }}
                            value={{ old('price') ?? $price }}>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="text text-secondary text-left lead text-capitalize text-uppercase row">{{ __('Details') }}</div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">{{ __('House type') }}</label>
                        <select class="custom-select" name="house_type" id="id_house_type" {{ $required }}>
                            <option selected disabled hidden>{{ __('Choose House Type') }}</option>
                            @foreach (\App\Models\HouseType::all('type') as $h)
                                <option value="{{ $h['type'] }}" @if (($data['house_type'] ?? null) == $h['type']) selected @endif>{{ __($h['type']) }}</option>
                            @endforeach
                        </select>
                        @error('house_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Beds') }}</label>
                        <input class="form-control" type="number" name="beds" id="id_beds" {{ $required }}
                            value={{ old('beds') ?? $data['beds'] ?? '' }}>
                        @error('beds')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Baths') }}</label>
                        <input class="form-control" type="number" name="baths" id="id_baths" {{ $required }}
                            value={{ old('baths') ?? $data['baths'] ?? '' }}>
                        @error('baths')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">{{ __('House Area') }}</label>
                        <input class="form-control" type="number" name="footprint" id="id_footprint" {{ $required }}
                            value={{ old('footprint') ?? $data['footprint'] ?? '' }}>
                        @error('footprint')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Total Area') }}</label>
                        <input class="form-control" type="number" name="lot" id="id_lot" {{ $required }}
                            value={{ old('lot') ?? $data['lot'] ?? '' }}>
                        @error('footprint')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Year') }}</label>
                        <input class="form-control" type="number" name="year" id="id_year" {{ $required }}
                            value={{ old('year') ?? $data['year'] ?? '' }}>
                        @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Description') }}</label>
                        <textarea name="description" class="ckeditor form-control" id="id_description" {{ $required }}>{{ old('desciption') ?? $data['description'] ?? '' }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Description in Amharic') }}</label>
                        <textarea name="description_am" class="ckeditor form-control" id="id_description_am" {{ $required }}>{{ old('desciption_am') ?? $data['description_am'] ?? '' }}</textarea>
                        @error('description_am')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Comparative Analysis') }}</label>
                        <textarea name="comparative_analysis" class="ckeditor form-control" id="id_comparative_analysis" {{ $required }}>{{ old('comparative_analysis') ?? $data['comparative_analysis'] ?? '' }}</textarea>
                        @error('comparative_analysis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Comparative Analysis in Amharic') }}</label>
                        <textarea name="comparative_analysis_am" class="ckeditor form-control" id="id_comparative_analysis_am" {{ $required }}>{{ old('comparative_analysis_am') ?? $data['comparative_analysis_am'] ?? '' }}</textarea>
                        @error('comparative_analysis_am')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row my-3"></div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Youtube Video id') }}</label>
                        <input class="form-control" name="youtube_id" id="id_youtube" {{ $required }}
                            value={{ old('youtube_id') ?? $data['youtube_id'] ?? '' }}>
                        @error('youtube_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row my-3 col">
                    <label class="form-label">{{ __('Images') }}</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="images" id="images" accept=".zip" {{ $required }} />
                        <label class="custom-file-label" for="images">{{ __('Choose zip file') }}</label>
                        @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="text text-secondary text-left lead text-capitalize text-uppercase row">Location Information
                </div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Latitude') }}</label>
                        <input class="form-control" type="number" step=any name="latitude" id="id_latitude" {{ $required }}
                            value={{ old('latitude') ?? $data['latitude'] ?? '' }}>
                        @error('latitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Longitude') }}</label>
                        <input class="form-control" type="number" step=any name="longitude" id="id_longitude" {{ $required }}
                            value={{ old('longitude') ?? $data['longitude'] ?? '' }}>
                        @error('longitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Subcity') }}</label>
                        <select class="custom-select" name="subcity" id="id_subcity" {{ $required }}>
                            <option selected disabled hidden>{{ __('Choose subcity') }}</option>
                            @foreach (\App\Models\State::all('state') as $s)
                                <option value="{{ $s['state'] }}" @if (($data['subcity'] ?? null) == $s['state']) selected @endif>{{ __($s['state']) }}</option>
                            @endforeach
                        </select>
                        @error('subcity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">{{ __('Wereda') }}</label>
                        <input class="form-control" type="number" name="wereda" id="id_wereda" {{ $required }}
                            value={{ old('wereda') ?? $data['wereda'] ?? '' }} />
                        @error('wereda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">{{ __('House Number') }}</label>
                        <input class="form-control" name="houseno" id="id_houseno" {{ $required }}
                            value={{ old('houseno') ?? $data['houseno'] ?? '' }}>
                        @error('houseno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="text text-secondary text-left lead text-capitalize text-uppercase row">Miscellaneous</div>
                <div class="row">
                    <div class="form-check form-switch my-3 col">
                        <label class="form-label">{{ __('Listing Type') }}</label>
                        <select class="custom-select" name="listing_type" id="id_listing_type" {{ $required }}>
                            <option selected disabled hidden>{{ __('Choose Listing type') }}</option>
                            @foreach (\App\Models\ListingType::all('type') as $l)
                                <option value="{{ $l['type'] }}" @if (($data['listing_type'] ?? null) == $l['type']) selected @endif>{{ __($l['type']) }}</option>
                            @endforeach
                        </select>
                        @error('listing_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row my-3 col">
                    <div class="form-check form-switch my-3 col">
                        <input class="form-check-input" type="checkbox" id="id_featured" @if ($data['featured'] ?? null) checked @endif>
                        <input type="hidden" name="featured" id="id_featured_hidden">
                        <label class="form-label">{{ __('Featured') }}</label>
                    </div>
                    <div class="form-check form-switch my-3 col">
                        <input class="form-check-input" type="checkbox" id="id_openhouse" @if ($data['openhouse'] ?? null) checked @endif>
                        <input type="hidden" name="openhouse" id="id_openhouse_hidden">
                        <label class="form-label">{{ __('Open House') }}</label>
                    </div>
                    <div class="form-check form-switch my-3 col">
                        <input class="form-check-input" type="checkbox" id="id_newconstruction" @if ($data['newconstruction'] ?? null) checked @endif>
                        <input type="hidden" name="newconstruction" id="id_newconstruction_hidden">
                        <label class="form-label">{{ __('New Construction') }}</label>
                    </div>
                    @if (! empty($data))
                        <div class="form-check form-switch my-3 col">
                            <input class="form-check-input" type="checkbox" id="id_job_finished" @if ($data['job_finished'] ?? null) checked @endif>
                            <input type="hidden" name="job_finished" id="id_job_finished_hidden">
                            <label class="form-label">{{ __('Job Finished') }}</label>
                        </div>
                    @endif
                </div>
            </div>
            @csrf
            <button type="submit" class="col mt-5 my-3 btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
        $('#form').submit(function() {
            checkboxes = [
                document.getElementById('id_featured'),
                document.getElementById('id_openhouse'),
                document.getElementById('id_newconstruction'),
                document.getElementById('id_job_finished'),
            ];

            for (var checkbox of checkboxes) {
                elem = document.getElementById(checkbox.id+'_hidden');
                if (checkbox.checked) {
                    elem.value = "true";
                } else {
                    elem.value = "false";
                }
            }
            return true;
        });
    </script>
@endsection
