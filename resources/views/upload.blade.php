@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Upload Listing</h1>
            <p class="lead">Here you upload a listing by request of user. <span style="color: red !important;">All fields must be filled!</span></p>
        </div>
    </div>
    <div class="mx-5 my-5">
        <div class="row full-width">
            <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data">
                <div class="col">
                    <div class="text text-secondary text-left lead text-capitalize text-uppercase row">Miscelinious</div>
                    <div class="row">
                        <div class="my-3 col-8">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" name="user_email" id="id_email" required>
                        </div>

                        <div class="my-3 col">
                            <label class="form-label">Price</label>
                            <input class="form-control" type="number" step=0.01 name="price" id="id_price" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-3 col">
                            <label class="form-label">Description</label>
                            <textarea name="logline" class="form-control" id="id_logline" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-3 col">
                            <label class="form-label">Youtube Video id</label>
                            <input class="form-control" name="youtube_id" id="id_youtube" required>
                        </div>
                    </div>
                    <hr>
                    <div class="text text-secondary text-left lead text-capitalize text-uppercase row">Location Information</div>
                    <div class="row">
                        <div class="my-3 col">
                            <label class="form-label">Latitude</label>
                            <input class="form-control" type="number" step=any name="latitude" id="id_latitude">
                        </div>
                        <div class="my-3 col">
                            <label class="form-label">Longitude</label>
                            <input class="form-control" type="number" step=any name="longitude" id="id_longtiude">
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-3 col">
                            <label class="form-label">Sub City</label>
                            <input class="form-control" name="subcity" id="id_subcity">
                        </div>
                        <div class="my-3 col">
                            <label class="form-label">Wereda</label>
                            <input class="form-control" type="number" name="wereda" id="id_wereda">
                        </div>
                        <div class="my-3 col">
                            <label class="form-label">House Number</label>
                            <input class="form-control" name="houseno" id="id_houseno">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check form-switch my-3 col">
                            <input class="form-check-input" type="checkbox" name="featured" id="id_featured">
                            <label class="form-label">Featured</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <label class="form-label text text-secondary text-left lead text-capitalize text-uppercase">Images</label>
                    </div>
                    <div class="row">
                        <div class="input-group mt-3 mb-2 row">
                            <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 1"
                                aria-label="Listing Image 1" aria-describedby="images1" name="images[]">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" id="images1" type="button">Choose File</button>
                            </div>
                        </div>
                        <div class="input-group my-2 row">
                            <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 1"
                                aria-label="Listing Image 2" aria-describedby="images2" name="images[]">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" id="images2" type="button">Choose File</button>
                            </div>
                        </div>
                        <div class="input-group my-2 row">
                            <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 3"
                                aria-label="Listing Image 3" aria-describedby="images3" name="images[]">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" id="images3" type="button">Choose File</button>
                            </div>
                        </div>
                        <div class="input-group my-2 row">
                            <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 4"
                                aria-label="Listing Image 4" aria-describedby="images4" name="images[]">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" id="images4" type="button">Choose File</button>
                            </div>
                        </div>
                        <div class="input-group my-2 row">
                            <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 5"
                                aria-label="Listing Image 5" aria-describedby="images5" name="images[]">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" id="images5" type="button">Choose File</button>
                            </div>
                        </div>
                        <div class="input-group my-2 row">
                            <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 6"
                                aria-label="Listing Image 6" aria-describedby="images6" name="images[]">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" id="images6" type="button">Choose File</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
        {{-- <div class="row full-width">
            <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data">
                    <div class="my-3 col">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="user_email" id="id_email" required>
                    </div>

                    <div class="my-3 col">
                        <label class="form-label">Price</label>
                        <input class="form-control" type="number" step=0.01 name="price" id="id_price" required>
                    </div>

                    <div class="my-3 col">
                        <label class="form-label">Description</label>
                        <textarea name="logline" class="form-control" id="id_logline" required></textarea>
                    </div>

                    <div class="my-3 col">
                        <label class="form-label">Youtube Video id</label>
                        <input class="form-control" name="youtube_id" id="id_youtube" required>
                    </div>

                    <hr>

                    <div class="text text-secondary text-left lead text-capitalize text-uppercase mt-4 mb-3">Location Information</div>
                    <div class="my-3 col">
                        <label class="form-label">Latitude</label>
                        <input class="form-control" type="number" step=any name="latitude" id="id_latitude">
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">Longitude</label>
                        <input class="form-control" type="number" step=any name="longitude" id="id_longtiude">
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">Sub City</label>
                        <input class="form-control" name="subcity" id="id_subcity">
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">Wereda</label>
                        <input class="form-control" type="number" name="wereda" id="id_wereda">
                    </div>
                    <div class="my-3 col">
                        <label class="form-label">House Number</label>
                        <input class="form-control" name="houseno" id="id_houseno">
                    </div>
                    <div class="form-check form-switch my-3 col">
                        <input class="form-check-input" type="checkbox" name="featured" id="id_featured">
                        <label class="form-label">Featured</label>
                    </div>
                    <div class="w-100"></div>
                    <div>
                        <label class="form-label text text-secondary text-left lead text-capitalize text-uppercase">Images</label>
                    </div>
                    <div class="input-group mt-3 mb-2 col">
                        <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 1"
                            aria-label="Listing Image 1" aria-describedby="images1" name="images[]">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" id="images1" type="button">Choose File</button>
                        </div>
                    </div>
                    <div class="input-group my-2 col">
                        <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 1"
                            aria-label="Listing Image 2" aria-describedby="images2" name="images[]">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" id="images2" type="button">Choose File</button>
                        </div>
                    </div>
                    <div class="input-group my-2 col">
                        <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 3"
                            aria-label="Listing Image 3" aria-describedby="images3" name="images[]">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" id="images3" type="button">Choose File</button>
                        </div>
                    </div>
                    <div class="input-group my-2 col">
                        <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 4"
                            aria-label="Listing Image 4" aria-describedby="images4" name="images[]">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" id="images4" type="button">Choose File</button>
                        </div>
                    </div>
                    <div class="input-group my-2 col">
                        <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 5"
                            aria-label="Listing Image 5" aria-describedby="images5" name="images[]">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" id="images5" type="button">Choose File</button>
                        </div>
                    </div>
                    <div class="input-group my-2 col">
                        <input type="file" class="custom-file-input mt-2 form-control" placeholder="Listing Image 6"
                            aria-label="Listing Image 6" aria-describedby="images6" name="images[]">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" id="images6" type="button">Choose File</button>
                        </div>
                    </div>
                </div>
                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div> --}}
@endsection
