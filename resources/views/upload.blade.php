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
        <h1 class="display-4">Upload Listing</h1>
        <p class="lead">Here you upload a listing by request of user. <span style="color: red !important;">All fields must be filled!</span></p>
    </div>
</div>
<div class="container row mx-5 my-5 justify-content-center card col-md-10" style="padding: 3rem !important; width: 60% !important; margin: auto !important; padding: 25px !important; position: relative !important;">
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
                    <input class="form-control" type="number" step=any name="latitude" id="id_latitude" required />
                </div>
                <div class="my-3 col">
                    <label class="form-label">Longitude</label>
                    <input class="form-control" type="number" step=any name="longitude" id="id_longtiude" required />
                </div>
            </div>
            <div class="row">
                <div class="my-3 col">
                    <label class="form-label">Sub City</label>
                    <select class="custom-select" name="subcity" id="id_subcity" required>
                        <option selected>Choose subcity</option>
                        <option value="Addis Ketema">Addis Ketema</option>
                        <option value="Akaky Kaliti">Akaky Kaliti</option>
                        <option value="Arada">Arada</option>
                        <option value="Bole">Bole</option>
                        <option value="Gullele">Gullele</option>
                        <option value="Kirkos">Kirkos</option>
                        <option value="Kolfe Keranio">Kolfe Keranio</option>
                        <option value="Lemi Kura">Lemi Kura</option>
                        <option value="Lideta">Lideta</option>
                        <option value="Nifas Silk-Lafto">Nifas Silk-Lafto</option>
                        <option value="Yeka">Yeka</option>
                    </select>
                </div>
                <div class="my-3 col">
                    <label class="form-label">Wereda</label>
                    <input class="form-control" type="number" name="wereda" id="id_wereda" required />
                </div>
                <div class="my-3 col">
                    <label class="form-label">House Number</label>
                    <input class="form-control" name="houseno" id="id_houseno" required />
                </div>
            </div>
            <div class="row">
                <div class="form-check form-switch my-3 col">
                    <input class="form-check-input" type="checkbox" name="selling" id="id_selling" />
                    <label class="form-label">Selling</label>
                </div>
                <div class="form-check form-switch my-3 col">
                    <input class="form-check-input" type="checkbox" name="featured" id="id_featured" />
                    <label class="form-label">Featured</label>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <label class="form-label text text-secondary text-left lead text-capitalize text-uppercase">Images</label>
            </div>
            <div class="row">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="images" id="images" accept=".zip" required />
                    <label class="custom-file-label" for="images">Choose zip file</label>
                </div>
            </div>
        </div>
        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
        <button type="submit" class="col mt-5 my-3 btn btn-primary">Submit</button>
    </form>
</div>
@endsection