@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <nav class="position-absolute position-sticky" style="width: 36% !important; margin: auto !important;">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link nav-link-browse active" id="nav-all-tab" data-toggle="tab" href="#nav-all"
                                                                                                       role="tab" aria-controls="nav-all" aria-selected="true">All Listings</a>
                <a class="nav-item nav-link nav-link-browse" id="nav-rent-tab" data-toggle="tab" href="#nav-rent" role="tab"
                                                                                                                  aria-controls="nav-rent" aria-selected="false">For Rent</a>
                <a class="nav-item nav-link nav-link-browse" id="nav-sell-tab" data-toggle="tab" href="#nav-sell" role="tab"
                                                                                                                  aria-controls="nav-sell" aria-selected="false">For Sell</a>
                <a class="nav-item nav-link nav-link-browse" id="nav-foreclosure-tab" data-toggle="tab"
                                                                                      href="#nav-foreclosure" role="tab" aria-controls="nav-foreclosure" aria-selected="false">Foreclosure</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <form>
                <div class="row mt-4 mb-3">
                    <div class="col-9">Filter by:</div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="label my-0" for="subcity">Type</label>
                        <div class="dropdown my-1" id="subcity">
                            <a class="btn btn-sm btn-outline-secondary dropdown-toggle" href="#" role="button"
                                                                                                 id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--
                                                                                                 Select the type --</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Appartment</a>
                                <a class="dropdown-item" href="#">Villa</a>
                                <a class="dropdown-item" href="#">G+__ Building</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label class="label my-0" for="subcity">Location</label>
                        <div class="dropdown my-1" id="subcity">
                            <a class="btn btn-sm btn-outline-secondary dropdown-toggle" href="#" role="button"
                                                                                                 id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--
                                                                                                 Select a subcity --</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Addis Ketema</a>
                                <a class="dropdown-item" href="#">Arada</a>
                                <a class="dropdown-item" href="#">Bole</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label class="label my-0" for="price">Price</label>
                        <div class="dropdown my-1" id="price">
                            <a class="btn btn-sm btn-outline-secondary dropdown-toggle" href="#" role="button"
                                                                                                 id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--
                                                                                                 Select a price range --</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Below 1M ETB</a>
                                <a class="dropdown-item" href="#">1M - 3M ETB</a>
                                <a class="dropdown-item" href="#">3M - 6M ETB</a>
                                <a class="dropdown-item" href="#">6M - 10M ETB</a>
                                <a class="dropdown-item" href="#">Above 10M ETB</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label class="label my-0" for="house_area">Area</label>
                        <div class="dropdown my-1" id="house_area">
                            <a class="btn btn-sm btn-outline-secondary dropdown-toggle" href="#" role="button"
                                                                                                 id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--
                                                                                                 Select an area range --</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Below 100sqm</a>
                                <a class="dropdown-item" href="#">100 - 200sqm</a>
                                <a class="dropdown-item" href="#">200 - 300 sqm</a>
                                <a class="dropdown-item" href="#">300 - 400 sqm</a>
                                <a class="dropdown-item" href="#">Above 400sqm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label class="label my-0" for="bed_number">Bed Number</label>
                        <div class="dropdown my-1" id="bed_number">
                            <a class="btn btn-sm btn-outline-secondary dropdown-toggle" href="#" role="button"
                                                                                                 id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--
                                                                                                 Select a bed number --</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">1 Bed Room</a>
                                <a class="dropdown-item" href="#">2 Bed Rooms</a>
                                <a class="dropdown-item" href="#">3 Bed Rooms</a>
                                <a class="dropdown-item" href="#">4 Bed Rooms</a>
                                <a class="dropdown-item" href="#">5 Bed Rooms and Above</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label class="label my-0" for="status">Status</label>
                        <div class="dropdown my-1" id="status">
                            <a class="btn btn-sm btn-outline-secondary dropdown-toggle" href="#" role="button"
                                                                                                 id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--
                                                                                                 Select a status --</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Featured</a>
                                <a class="dropdown-item" href="#">Reduced Price</a>
                                <a class="dropdown-item" href="#">New Construction</a>
                                <a class="dropdown-item" href="#">Open House</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                <div class="container">
                    @if (isset($uploads))
                        @php $i = 0; @endphp
                        @foreach($uploads as $upload)
                            @if ($i % 3  == 0)
                                <div class="row my-5">
                            @endif
                            @php $updated_at = \Carbon\Carbon::parse($upload->updated_at) @endphp
                            <div class="col" onclick="location.href='{{ route('listings.show', ['id' => $upload->id]) }}';" style="cursor: pointer;">
                                <div class="card listing-card" style="width: 20rem !important;">
                                    <img class="relative card-img" src="{{ route('images', ['id' => $upload->id, 'number' => 0 ]) }}"
                                        style="object-fit: cover !important; width: 20rem !important; height: 12rem !important;" />

                                    <div class="position-absolute mt-2 ml-2">
                                        <span class="badge badge-success">
                                            @if ($updated_at->diffInDays() > 30)
                                                {{ $updated_at->format('d, M Y') }}
                                            @elseif ($updated_at->diffInMinutes() < 60)
                                                New
                                            @elseif ($updated_at->diffInHours() < 24)
                                                New - {{ $updated_at->diffForHumans() }}
                                            @else
                                                {{ $updated_at->diffForHumans() }}
                                            @endif
                                        </span>
                                        @if ($upload->reduced_price)
                                            <span class="badge badge-danger">
                                                Reduced Price
                                            </span>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="card-text text-small">
                                            {{--What the hell is &#x0009.--}}
                                            <b> {{ $upload->beds }} </b> <i>Bed Size</i> &#x0009
                                            <b> {{ $upload->baths }}</b> <i>Bath Size</i> &#x0009
                                            <b> {{ $upload->footprint }} </b> <i>sqmr</i>
                                        </div>
                                        <div class="card-text">
                                            Location Addis Ababa, {{ $upload->subcity }}
                                            <span class="float float-right">
                                                <!--Must include the listingId as a param-->
                                                <a href="{{ route('images', ['id' => $upload->id, 'number' => 0 ]) }} ">View Details</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (($i + 1) % 3 == 0)
                                </div>
                            @endif
                            @php ++$i; @endphp
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="nav-rent" role="tabpanel" aria-labelledby="nav-rent-tab">...</div>
            <div class="tab-pane fade" id="nav-sell" role="tabpanel" aria-labelledby="nav-sell-tab">...</div>
            <div class="tab-pane fade" id="nav-foreclosure" role="tabpanel" aria-labelledby="nav-foreclosure-tab">...</div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="row text-center d-flex justify-content-center">
        {{ $uploads->links() }}
    </div>
@endsection
