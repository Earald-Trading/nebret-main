@extends('layouts.app')

@section('content')
    <div class="container"
        style="padding-top: 3rem !important; padding-left: 0.2rem !important; padding-right: 0.2rem !important;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-8">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div
                                    class="carousel-caption carousel-caption-listing position-absolute ml-0 left-align align-content-start justify-content-start">
                                    @if ($reduced_price)
                                        <span class="badge badge-danger">
                                            Reduced Price
                                        </span>
                                    @endif
                                    @php $updated_at = \Carbon\Carbon::parse($updated_at) @endphp
                                    <span class="badge badge-success">
                                        Listed
                                        @if ($updated_at->diffInDays() > 30)
                                            on - {{ $updated_at->format('d, M Y') }}
                                        @else
                                            {{ $updated_at->diffForHumans() }}
                                        @endif
                                    </span>
                                    <span class="badge badge-primary">@if($job_finished)Not @endif Active</span>
                                    <span>
                                        <i id="like_button" class="fa fa-thumbs-up btn btn-sm @if($liked) btn-primary @else btn-secondary @endif"
                                           @guest onclick="document.querySelector('#like_button>a').click();" @endguest
                                           @auth onclick="sendLike();"; @endauth
                                        >
                                            <a href="{{ route('listings.like', compact('id')) }}"></a>
                                        </i>
                                    </span>
                                </div>
                                <div class="carousel-inner">
                                    @for ($i = 0; $i < $images; ++$i)
                                        <div class="carousel-item img img-fluid listing-img-carousel @if ($i==0) active @endif"
                                            style="background-image: url('{{ route('images', ['id' => $id, 'number' => $i]) }}')">
                                        </div>
                                    @endfor
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="header h4 mt-3 mb-4">
                                <span class="">About this property</span>
                                <hr>
                            </div>
                            <div class="text text-left font-weight-bolder h3 my-3">
                                @if($reduced_price) Reduced Price - @endif {{ $house_type }}
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="text text-left text-info lead"><b
                                            class="font-weight-bold">{{ $beds }} </b>Beds</div>
                                </div>
                                <div class="col">
                                    <div class="text text-left text-info lead"><b
                                            class="font-weight-bold">{{ $baths }} </b>Baths</div>
                                </div>
                            </div>
                            <div class="my-4">
                                <div class="row text text-left text-info lead">
                                    <b class="h5 font-weight-bold">House Area - {{ $footprint }}</b>sqmr
                                </div>
                                <div class="row text text-left text-info lead">
                                    <b class="h5 font-weight-bold">Total Area - {{ $lot }}</b>sqmr
                                </div>
                            </div>
                            <div class="row h6 lead text text-info">
                                Addis Ababa, {{ $subcity }}
                                @agent
                                    , Wereda {{ $wereda }}, {{ $houseno }}
                                @endagent
                            </div>
                            <div class="text text-left text-secondary h1 mt-4 pt-2">{{ $price / 100 }} ETB</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 text text-left"
                    style="width: 100% !important; margin: 0 !important; background: white !important;">
                    <hr />
                    <div class="col">
                        <div class="row my-3">
                            <div class="col-8 text lead">
                                <span class="text text-secondary font-weight-light">Property Type</span>
                            </div>
                            <div class="col-4 text lead">
                                <span class="text text-secondary font-weight-bold">{{ $house_type }}</span>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-8 text lead">
                                <span class="text text-secondary font-weight-light">Year Built</span>
                            </div>
                            <div class="col-4 text lead">
                                <span class="text text-secondary font-weight-bold">{{ $year }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row my-3">
                            <div class="col-7 text lead">
                                <span class="text text-secondary font-weight-light">Price per sqmr</span>
                            </div>
                            <div class="col-5 text lead">
                                <span class="text text-secondary font-weight-bold">{{ number_format(($price / 100 / $footprint), 2) }} ETB</span>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-7 text lead">
                                <span class="text text-secondary font-weight-light">Status</span>
                            </div>
                            <div class="col-5 text lead">
                                <span class="text text-secondary font-weight-bold">{{ $listing_type }}</span>
                            </div>
                        </div>
                    </div>
                    @guest
                        <div class="col col-auto align-self-center justify-content-center">
                            <a href="../../login">
                                <button class="btn btn-lg btn-danger" style="width: fit-content !important;" type="button">
                                    Login to see comparative analysis
                                </button>
                            </a>
                        </div>
                    @else
                        <div class="col col-auto align-self-center justify-content-center">
                            <button class="btn btn-lg btn-primary" style="width: fit-content !important;">
                                Contact Agent for More
                            </button>
                        </div>
                    @endguest
                </div>
                <div class="card my-5">
                    <div class="card-header">
                        <span class="lead">Description</span>
                    </div>
                    <div class="card-body">
                            {!! $description !!}
                    </div>
                </div>
                <div class="card my-5">
                    <div class="card-header">
                        <span class="lead">Video Footage</span>
                    </div>
                    <div class="card-body">
                        <iframe width="1090" height="409" src="https://www.youtube.com/embed/{{ $youtube_id }}"
                            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                @auth
                    <div class="card my-5">
                        <div class="card-header">
                            <span class="lead">Comparative Market Analysis</span>
                        </div>
                        <div class="card-body">
                            {!! $comparative_analysis !!}
                            <br />
                            @agent
                                <hr />
                                <div style="width: 100% !important; margin: auto !important;">
                                    <div class="h5 font-weight-light">Areal Location in Google Maps</div>
                                    <div>
                                        {{--This requires google api key see https://developers.google.com/maps/documentation/embed/embedding-map#view_mode--}}
                                        <iframe
                                            src="https://maps.google.com/maps?q={{ $latitude }},{{ $longitude }}&z=15&output=embed"
                                            width="800" height="360" frameborder="0" style="border:0;" allowfullscreen=""
                                            aria-hidden="false" tabindex="0"></iframe>
                                    </div>
                                </div>
                            @endagent
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var liked = {{ $liked == true ? 1 : 0 }};
        function sendLike() {
            axios.get("{{ route('listings.like', compact('id')) }}").then(function(response) {
                if (response.status == 204) {
                    if(! liked) {
                        document.getElementById('like_button').classList.remove('btn-secondary');
                        document.getElementById('like_button').classList.add('btn-primary');
                        liked = true;
                    } else {
                        document.getElementById('like_button').classList.remove('btn-primary');
                        document.getElementById('like_button').classList.add('btn-secondary');
                        liked = false;
                    }
                }
            }).catch(function(error) {});
        }
    </script>
@endsection
