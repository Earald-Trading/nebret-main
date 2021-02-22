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
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">{{ $header }}</h1>
        <p class="lead">{{ $description }} <span style="color: red !important;">All fields must be filled!</span></p>
    </div>
</div>
<div class="container row m-auto p-auto card col-md-7">
    <form method="POST" action="{{ Request::url() }}" enctype="multipart/form-data">
        <div class="col">
            <div class="row">
                <div class="my-3 col-8">
                    <label class="form-label">User Email</label>
                    <input class="form-control" type="email" name="user_email" id="id_email" required value={{ $data['user_email'] ?? '' }}>
                </div>

                <div class="my-3 col">
                    <label class="form-label">Price</label>
                    @if (isset($data['price']) && $price = (int)$data['price'] / 100) @endif
                    <input class="form-control" type="number" step=0.01 name="price" id="id_price" required value={{ $price ?? '' }}>
                </div>
            </div>
            <hr>
            <div class="text text-secondary text-left lead text-capitalize text-uppercase row">Details</div>
            <div class="row">
                <div class="my-3 col">
                    <label class="form-label">House type</label>
                    <input class="form-control" name="type" id="id_type" required value={{ $data['type'] ?? '' }}>
                </div>
                <div class="my-3 col">
                    <label class="form-label">Beds</label>
                    <input class="form-control" type="number" name="beds" id="id_beds" required value={{ $data['beds'] ?? '' }}>
                </div>
                <div class="my-3 col">
                    <label class="form-label">Baths</label>
                    <input class="form-control" type="number" name="baths" id="id_baths" required value={{ $data['baths'] ?? '' }}>
                </div>
            </div>
            <div class="row">
                <div class="my-3 col">
                    <label class="form-label">Footprint</label>
                    <input class="form-control" type="number" name="footprint" id="id_footprint" required value={{ $data['footprint'] ?? '' }}>
                </div>
                <div class="my-3 col">
                    <label class="form-label">Lot</label>
                    <input class="form-control" type="number" name="lot" id="id_lot" required value={{ $data['lot'] ?? '' }}>
                </div>
                <div class="my-3 col">
                    <label class="form-label">Year</label>
                    <input class="form-control" type="number" name="year" id="id_year" required value={{ $data['year'] ?? '' }}>
                </div>
            </div>
            <div class="row">
                <div class="my-3 col">
                    <label class="form-label">Description</label>
                    <textarea name="logline" class="ckeditor form-control" id="id_logline" required>{{ $data['logline'] ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="my-3 col">
                    <label class="form-label">Youtube Video id</label>
                    <input class="form-control" name="youtube_id" id="id_youtube" required value={{ $data['youtube_id'] ?? '' }}>
                </div>
            </div>
            <div class="row my-3 col">
                <label class="form-label">Images</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="images" id="images" accept=".zip" @if (! isset($data['images'])) required @endif>
                    <label class="custom-file-label" for="images">Choose zip file</label>
                </div>
            </div>
            <hr>
            <div class="text text-secondary text-left lead text-capitalize text-uppercase row">Location Information</div>
            <div class="row">
                <div class="my-3 col">
                    <label class="form-label">Latitude</label>
                    <input class="form-control" type="number" step=any name="latitude" id="id_latitude" required value={{ $data['latitude'] ?? '' }}>
                </div>
                <div class="my-3 col">
                    <label class="form-label">Longitude</label>
                    <input class="form-control" type="number" step=any name="longitude" id="id_longtiude" required value={{ $data['longitude'] ?? '' }}>
                </div>
            </div>
            <div class="row">
                <div class="my-3 col">
                    <label class="form-label">Sub City</label>
                    <select class="custom-select" name="subcity" id="id_subcity" required>
                        <option selected disabled hidden>Choose subcity</option>
                        @foreach($subcity as $s)
                        <option value="{{ $s['name'] }}" @if(isset($data['subcity']) && $data['subcity']==$s['name']) selected @endif>{{ $s['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3 col">
                    <label class="form-label">Wereda</label>
                    <input class="form-control" type="number" name="wereda" id="id_wereda" required value={{ $data['wereda'] ?? '' }} />
                </div>
                <div class="my-3 col">
                    <label class="form-label">House Number</label>
                    <input class="form-control" name="houseno" id="id_houseno" required value={{ $data['houseno'] ?? '' }}>
                </div>
            </div>
            <hr>
            <div class="text text-secondary text-left lead text-capitalize text-uppercase row">Miscellaneous</div>
            <div class="row">
                <div class="form-check form-switch my-3 col">
                    <label class="form-label">Purchase Type</label>
                    <select class="custom-select" name="purchase_status" id="id_purchase_status" required>
                        <option selected disabled hidden>Choose purchase type</option>
                        <option value="sale" @if(isset($data['purchase_status']) && $data['purchase_status'] == 'sale' ) selected @endif>Selling</option>
                        <option value="rent" @if(isset($data['purchase_status']) && $data['purchase_status'] == 'rent' ) selected @endif>Renting</option>
                        <option value="foreclosure" @if(isset($data['purchase_status']) && $data['purchase_status'] == 'foreclosure' ) selected @endif>Foreclosure</option>
                    </select>
                </div>
            </div>
            <div class="row my-3 col">
                <div class="form-check form-switch my-3 col">
                    <input class="form-check-input" type="checkbox" name="featured" id="id_featured" @if(isset($data['featured']) && $data['featured']) checked @endif>
                    <label class="form-label">Featured</label>
                </div>
                <div class="form-check form-switch my-3 col">
                    <input class="form-check-input" type="checkbox" name="openhouse" id="id_openhouse" @if(isset($data['openhouse']) && $data['openhouse']) checked @endif>
                    <label class="form-label">Open House</label>
                </div>
                <div class="form-check form-switch my-3 col">
                    <input class="form-check-input" type="checkbox" name="newconstruction" id="id_newconstruction" @if(isset($data['newconstruction']) && $data['newconstruction']) checked @endif>
                    <label class="form-label">New Construction</label>
                </div>
            </div>
        </div>
        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
        <button type="submit" class="col mt-5 my-3 btn btn-primary">Submit</button>
    </form>
</div>
@endsection
