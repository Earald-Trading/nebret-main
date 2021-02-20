@extends('layouts.app')
@section('content')
    <div class="container">
        <nav class="position-absolute position-sticky" style="width: 30% !important; margin: auto !important;">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link nav-link-browse active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">All Listings</a>
                <a class="nav-item nav-link nav-link-browse" id="nav-rent-tab" data-toggle="tab" href="#nav-rent" role="tab" aria-controls="nav-rent" aria-selected="false">For Rent</a>
                <a class="nav-item nav-link nav-link-browse" id="nav-sell-tab" data-toggle="tab" href="#nav-sell" role="tab" aria-controls="nav-sell" aria-selected="false">For Sell</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <form>
                <div class="row">
                    <div class="col">
                        <label class="label" for="subcity">Location</label>
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown link</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                <div class="container">
                    <!-- Temp Dumb Data -->
                    <div class="row my-5">
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-text text-small"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
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
                    <div class="row my-5">
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
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
                    <div class="row my-5">
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
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
                    <div class="row my-5">
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
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
                    <div class="row my-5">
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
                                    <div class="card-text">Location
                                        <span class="float float-right">
                                            <!--Must include the listingId as a param-->
                                            <a href="/listings/{{0}}">View Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card listing-card" style="width: 15rem !important;">
                                <img class="relative card-img" src="https://s3-us-west-1.amazonaws.com/realisticshots/63.jpg" style="object-fit: cover !important;">
                                <span class="badge badge-success position-absolute mt-2 ml-2" style="width: auto !important;">UploadTime</span>
                                <span class="card-title position-absolute ml-2 h2" style="color:rgb(20, 20, 20) !important; margin-top: 56% !important;"><b>Bunglo</b></span>
                                <div class="card-body">
                                    <div class="card-subtitle"><b>0</b> <i>Bed Size</i> &#x0009 <b>0</b> <i>Bath Size</i> &#x0009 <b>0</b> <i>footprint</i></div>
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
                </div>
            </div>
            <div class="tab-pane fade" id="nav-rent" role="tabpanel" aria-labelledby="nav-rent-tab">...</div>
            <div class="tab-pane fade" id="nav-sell" role="tabpanel" aria-labelledby="nav-sell-tab">...</div>
        </div>
    </div>
@endsection
