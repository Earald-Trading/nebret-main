@extends('layouts.app')

@section('content')
    <div class="container"
        style="padding-top: 3rem !important; padding-left: 0.2rem !important; padding-right: 0.2rem !important;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                @if ($featured)
                                    <div class="carousel-caption row position-absolute top-0 left-0" style="padding-bottom: 40% !important;">
                                        <span class="badge badge-dark">{{ __('Featured') }}</span>
                                    </div>
                                @endif
                                <div
                                    class="carousel-caption carousel-caption-listing position-absolute ml-0 left-align align-content-start justify-content-start">
                                    @if ($job_finished)
                                        <span class="badge badge-danger">{{ __('Listing not active') }}</span>
                                    @else
                                        <span class="badge badge-secondary">
                                           {{ __('Reduced Price') }}
                                        </span>
                                    @endif
                                    @php $updated_at = \Carbon\Carbon::parse($updated_at) @endphp
                                    <span class="badge badge-success">
                                       {{ __('Listed') }}
                                        @if ($updated_at->diffInDays() > 30)
                                           {{ __('on') }} - {{ $updated_at->format('d, M Y') }}
                                        @else
                                           {{ $updated_at->diffForHumans() }}
                                        @endif
                                    </span>
                                    <span class="badge badge-secondary">
                                        {{ $likes }}
                                    </span>
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
                                    @for ($i = 0; $i < $images_no; ++$i)
                                        <div class="carousel-item img img-fluid listing-img-carousel @if ($i==0) active @endif"
                                            style="background-image: url('{{ route('images', ['path' => $images, 'number' => $i]) }}')">
                                        </div>
                                    @endfor
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">{{ __('Previous') }}</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">{{ __('Next') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="header h4 mt-3 mb-0">
                                <span class="ml-md-1 ml-sm-3">{{ __('About this property') }}</span>
                            </div>
                            <hr class="mb-4">
                            <div class="text text-left font-weight-bolder h3 my-3">
                                @if($reduced_price) <span style="color: rgb(19, 9, 9); font-weight: lighter !important;">{{ __('Reduced Price') }}</span> - @endif {{ __($house_type) }}
                            </div>
                            @if ($house_type != 'Land')
                                <div class="row">
                                    <div class="col-5">
                                        <div class="text text-left text-secondary lead"><b
                                                class="font-weight-bold">{{ $beds }} </b> {{ __('Beds') }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="text text-left text-secondary lead"><b
                                                class="font-weight-bold">{{ $baths }} </b> {{ __('Baths') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="mt-4 mb-1 mx-3">
                                @if($house_type != 'Land')
                                    <div class="row text text-left text-secondary lead py-2">
                                        <b class="h5 font-weight-bold">{{ __('House Area') }} - {{ $footprint }}</b>{{ __('sqmr') }}
                                    </div>
                                @endif
                                <div class="row text text-left text-secondary lead py-2">
                                    <b class="h5 font-weight-bold">{{ __('Total Area') }} - {{ $lot }}</b>{{ __('sqmr') }}
                                </div>
                            </div>
                            <div class="row h6 lead text text-info mx-1 mt-1">
                                {{ __('Addis Ababa') }}, {{ __($subcity) }}
                                @agent
                                    , {{ __('Wereda') }} {{ $wereda }}, {{ $houseno }}
                                @endagent
                            </div>
                            <div class="text text-left text-secondary h1 mt-4 pt-2">{{ $price }} {{ __('ETB') }}</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 text text-left"
                    style="width: 100% !important; margin: 0 !important; background: white !important;">
                    <hr />
                    <div class="col-lg- col-md col-sm-12">
                        <div class="row my-3">
                            <div class="col-md-8 col-sm-12 text lead">
                                <span class="text text-secondary font-weight-light">{{ __('Property Type') }}</span>
                            </div>
                            <div class="col-md-4 col-sm-12 text lead">
                                <span class="text text-secondary font-weight-bold">{{ __($house_type) }}</span>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-8 col-sm-12 text lead">
                                <span class="text text-secondary font-weight-light">{{ __('Year Built') }}</span>
                            </div>
                            <div class="col-md-4 col-sm-12 text lead">
                                <span class="text text-secondary font-weight-bold">{{ $year }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg col-md col-sm-12">
                        <div class="row my-3">
                            <div class="col-md-7 col-sm-12 text lead">
                                <span class="text text-secondary font-weight-light">{{ __('Price per sqmr') }}</span>
                            </div>
                            @if ($footprint)
                                <div class="col-md-5 col-sm-12 text lead">
                                    <span class="text text-secondary font-weight-bold">{{ number_format(($price / $footprint), 2) }} {{ __('ETB') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="row my-3">
                            <div class="col-md-7 col-sm-12 text lead">
                                <span class="text text-secondary font-weight-light">{{ __('Status') }}</span>
                            </div>
                            <div class="col-md-5 col-sm-12 text lead">
                                <span class="text text-secondary font-weight-bold">{{ __($listing_type) }}</span>
                            </div>
                        </div>
                    </div>
                    @guest
                        <div class="col-lg col-md col-sm-12 my-4 col-auto align-self-center justify-content-center">
                            <a href="{{ route('login') }}">
                                <button class="btn btn-lg btn-danger" style="width: fit-content !important;" type="button">
                                   {{ __('Login to see comparative analysis') }}
                                </button>
                            </a>
                        </div>
                    @else
                        @agent
                            <div class="col col-auto align-self-center justify-content-center">
                                @if (! $job_finished)
                                    <a class="btn btn-lg btn-primary" style="width: fit-content !important;" href="{{ route('listings.edit', $id) }}">
                                       {{ __('Edit') }}
                                    </a>
                                    <a class="btn btn-lg btn-primary" style="width: fit-content !important;"
                                        onclick="document.getElementById('featured_form').submit();">
                                        @if (! $featured)
                                           {{ __('Feature') }}
                                        @else
                                           {{ __('Unfeature') }}
                                        @endif
                                    </a>
                                    <a class="btn btn-lg btn-danger" style="width: fit-content !important;"
                                        onclick="document.getElementById('job_finished_form').submit();">
                                       {{ __('Sold') }}
                                    </a>
                                @endif
                            </div>
                        @else
                            <div class="col col-auto align-self-center justify-content-center">
                                <button class="btn btn-lg btn-primary" style="width: fit-content !important;" type="button" data-toggle="modal" data-target="#contact-modal-center">
                                   {{ __('Contact Agent for More') }}
                                </button>
                            </div>
                            <div class="modal fade" id="contact-modal-center" tabindex="-1" role="dialog" aria-labelledby="contact-agent-center" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="contact-modal-title">{{ __('Agent Details') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="lead">{{ __('Yonathan Amha') }}</p>
                                            <p class="ml-3 mb-1 pb-0">+251 91 214 0906</p>
                                            <p class="ml-3 my-0 py-0">yonathan.amha@gmail.com</p>
                                            <br>
                                            <p class="lead">{{ __('Natnael Hailu') }}</p>
                                            <p class="ml-3 mb-1 pb-0">+251 92 116 1210</p>
                                            <p class="ml-3 my-0 py-0">natnael.hailu@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endagent
                    @endguest
                </div>
                <div class="card my-5">
                    <div class="card-header">
                        <span class="lead">{{ __('Description') }}</span>
                    </div>
                    <div class="card-body">
                        @if ($locale == "_am")
                            {!! $description_am !!}
                        @else
                            {!! $description !!}
                        @endif
                    </div>
                </div>
                <div class="card my-5">
                    <div class="card-header">
                        <span class="lead">{{ __('Video Footage') }}</span>
                    </div>
                    <div class="card-body" style="position: relative !important; overflow: hidden !important; width: 100% !important; padding-top: 56.25% !important;">
                        <iframe class="responsive-iframe" src="https://www.youtube.com/embed/{{ $youtube_id }}"
                            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen style="position: absolute !important; top: 0 !important; left: 0 !important; bottom: 0 !important; right: 0 !important; width: 100% !important; height: 100% !important;"></iframe>
                    </div>
                </div>
                @auth
                    <div class="card my-5">
                        <div class="card-header">
                            <span class="lead">{{ __('Comparative Market Analysis') }}</span>
                        </div>
                        <div class="card-body">
                            @if ($locale == "_am")
                                {!! $comparative_analysis_am !!}
                            @else
                                {!! $comparative_analysis !!}
                            @endif
                            <br />
                            {{--@agent--}}
                                {{--<hr />--}}
                                {{--<div style="width: 100% !important; margin: auto !important;">--}}
                                    {{--<div class="h5 font-weight-light">{{ __('Areal Location') }}</div>--}}
                                    {{--<div>--}}
                                        {{--[>This requires google api key see https://developers.google.com/maps/documentation/embed/embedding-map#view_mode<]--}}
                                        {{--<iframe--}}
                                            {{--src="https://maps.google.com/maps?q={{ $latitude }},{{ $longitude }}&z=15&output=embed"--}}
                                            {{--width="800" height="360" frameborder="0" style="border:0;" allowfullscreen=""--}}
                                            {{--aria-hidden="false" tabindex="0"></iframe>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endagent--}}
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    <form class="d-none" id="featured_form" method="POST" action="{{ route('listings.update', compact('id')) }}">
        <input type="hidden" name="featured" @if (! $featured) value="true" @else value="false" @endif >
        @csrf
    </form>
    <form class="d-none" id="job_finished_form" method="POST" action="{{ route('listings.update', compact('id')) }}">
        <input type="hidden" name="job_finished" value="true">
        @csrf
    </form>
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
