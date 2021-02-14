@extends('layouts.app')

@section('content')

<!-- Carousel Section -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/LAaSoL0LrYs/1920x1080')">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4">First Slide</h2>
                <p class="lead">This is a description for the first slide.</p>
            </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4">Second Slide</h2>
                <p class="lead">This is a description for the second slide.</p>
            </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4">Third Slide</h2>
                <p class="lead">This is a description for the third slide.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Listings Section -->
<!-- Must be changed to iterative list of listings -->
    <div class="row center mt-5" style="width: 90% !important; margin: auto !important; padding: 25px !important; position: relative !important;">
        <div class="col-4">
            <div class="card listing-card" style="width: 20rem !important;">
                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                <span class="card-title position-absolute ml-2 h2" style="color: rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                <div class="card-body">
                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i>    <b>0</b> <i>Bath Size</i>    <b>0</b> <i>footprint</i></div>
                    <div class="card-text">Location
                        <span class="float float-right">
                            <!--Must include the listingId as a param-->
                            <a href="/listings/{{0}}">View Details</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card listing-card" style="width: 20rem !important;">
                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                <div class="card-body">
                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i>    <b>0</b> <i>Bath Size</i>    <b>0</b> <i>footprint</i></div>
                    <div class="card-text">Location
                        <span class="float float-right">
                            <!--Must include the listingId as a param-->
                            <a href="/listings/{{0}}">View Details</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card listing-card" style="width: 20rem !important;">
                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                <span class="card-title position-absolute ml-2 h2" style="color: rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                <div class="card-body">
                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i>    <b>0</b> <i>Bath Size</i>    <b>0</b> <i>footprint</i></div>
                    <div class="card-text">Location
                        <span class="float float-right">
                            <!--Must include the listingId as a param-->
                            <a href="/listings/{{0}}">View Details</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
