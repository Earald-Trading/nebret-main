@extends('layouts.app')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('style')
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{ $header }}</h1>
            <p class="lead">{{ $description }} <span style="color: red !important;">All fields must be filled!</span></p>
        </div>
    </div>
    <div class="container row m-auto p-auto card col-md-7">
        <form method="POST" action="{{ $route ?? route('listings.store') }}" enctype="multipart/form-data" id="form">
            <div class="col">
                <div class="row">
                    <div class="my-3 col-8">
                        <label class="form-label">User Email</label>
                        <input class="form-control" type="email" name="user_email" id="id_email" required
                            value={{ $data['user_email'] ?? old('user_email') }}>
                        @error('user_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="my-3 col">
                        <label class="form-label">Price</label>
                        @if (isset($data['price']) && ($price = (int) $data['price'] / 100)) @endif
                        <input class="form-control" type="number" step=0.01 name="price" id="id_price" required
                            value={{ $price ?? old('price') }}>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="text text-secondary text-left lead text-capitalize text-uppercase row">Details</div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">House type</label>
                        <select class="custom-select" name="house_type" id="id_house_type" required>
                            <option selected disabled hidden>Choose House Type</option>
                            @foreach (\App\Models\HouseType::all() as $h)
                                <option value="{{ $h['type'] }}" @if (isset($data['house_type']) && $data['house_type'] == $h['type']) selected @endif>{{ $h['type'] }}</option>
                            @endforeach
                        </select>
                        @error('house_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">Beds</label>
                        <input class="form-control" type="number" name="beds" id="id_beds" required
                            value={{ $data['beds'] ?? old('beds') }}>
                        @error('beds')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">Baths</label>
                        <input class="form-control" type="number" name="baths" id="id_baths" required
                            value={{ $data['baths'] ?? old('baths') }}>
                        @error('baths')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">House Area</label>
                        <input class="form-control" type="number" name="footprint" id="id_footprint" required
                            value={{ $data['footprint'] ?? old('footprint') }}>
                        @error('footprint')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">Total Area</label>
                        <input class="form-control" type="number" name="lot" id="id_lot" required
                            value={{ $data['lot'] ?? old('lot') }}>
                        @error('footprint')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">Year</label>
                        <input class="form-control" type="number" name="year" id="id_year" required
                            value={{ $data['year'] ?? old('year') }}>
                        @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="ckeditor form-control" id="id_description" required>{{ $data['description'] ?? old('desciption') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">Comparative Analysis</label>
                        <textarea name="comparative_analysis" class="ckeditor form-control" id="id_comparative_analysis" required>{{ $data['comparative_analysis'] ?? old('comparative_analysis') }}</textarea>
                        @error('comparative_analysis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row my-3"></div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">Youtube Video id</label>
                        <input class="form-control" name="youtube_id" id="id_youtube" required
                            value={{ $data['youtube_id'] ?? old('youtube_id') }}>
                        @error('youtube_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row my-3 col">
                    <label class="form-label">Images</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="images" id="images" accept=".zip" @if (!isset($data['images'])) required @endif>
                        <label class="custom-file-label" for="images">Choose zip file</label>
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
                        <label class="form-label">Latitude</label>
                        <input class="form-control" type="number" step=any name="latitude" id="id_latitude" required
                            value={{ $data['latitude'] ?? old('latitude') }}>
                        @error('latitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">Longitude</label>
                        <input class="form-control" type="number" step=any name="longitude" id="id_longitude" required
                            value={{ $data['longitude'] ?? old('longitude') }}>
                        @error('longitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="my-3 col">
                        <label class="form-label">Subcity</label>
                        <select class="custom-select" name="subcity" id="id_subcity" required>
                            <option selected disabled hidden>Choose subcity</option>
                            @foreach (\App\Models\State::all() as $s)
                                <option value="{{ $s['state'] }}" @if (isset($data['subcity']) && $data['subcity'] == $s['state']) selected @endif>{{ $s['state'] }}</option>
                            @endforeach
                        </select>
                        @error('subcity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">Wereda</label>
                        <input class="form-control" type="number" name="wereda" id="id_wereda" required
                            value={{ $data['wereda'] ?? old('wereda') }} />
                        @error('wereda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">House Number</label>
                        <input class="form-control" name="houseno" id="id_houseno" required
                            value={{ $data['houseno'] ?? old('houseno') }}>
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
                        <label class="form-label">Listing Type</label>
                        <select class="custom-select" name="listing_type" id="id_listing_type" required>
                            <option selected disabled hidden>Choose Listing type</option>
                            @foreach (\App\Models\ListingType::all() as $l)
                                <option value="{{ $l['type'] }}" @if (isset($data['listing_type']) && $data['listing_type'] == $l['type']) selected @endif>{{ $l['type'] }}</option>
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
                        <input class="form-check-input" type="checkbox" name="featured" id="id_featured" @if (isset($data['featured']) && $data['featured']) checked @endif>
                        <label class="form-label">Featured</label>
                    </div>
                    <div class="form-check form-switch my-3 col">
                        <input class="form-check-input" type="checkbox" name="openhouse" id="id_openhouse" @if (isset($data['openhouse']) && $data['openhouse']) checked @endif>
                        <label class="form-label">Open House</label>
                    </div>
                    <div class="form-check form-switch my-3 col">
                        <input class="form-check-input" type="checkbox" name="newconstruction" id="id_newconstruction" @if (isset($data['newconstruction']) && $data['newconstruction']) checked @endif>
                        <label class="form-label">New Construction</label>
                    </div>
                    @if ($editing)
                        <div class="form-check form-switch my-3 col">
                            <input class="form-check-input" type="checkbox" name="job_finished" id="id_newconstruction" @if (isset($data['job_finished']) && $data['job_finished']) checked @endif>
                            <label class="form-label">Job Finished</label>
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
    </script>
@endsection
