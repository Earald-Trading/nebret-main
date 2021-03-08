@extends('layouts.app')

@section('content')
    <div>
        <div class="text-center py-2" style="background: #c1c4db !important; width: 100% !important;">
            <span>
               {{ __('We are collecting a survey to help us understand more about you, our customers. And we would highly appreciate it, if you would fill you the form in') }}
                <a href="/survey">{{ __('this link') }}</a>
               {{ __('Thank you and keep safe!') }}
            </span>
        </div>
    </div>
    <!-- Carousel Section -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item carousel-item-landing active"
                style="background-image: url('/images/JUMBO1.jpeg')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">{{ __('Find Your Dream Home') }}</h2>
                    <p class="lead">{{ __('Use our easy-to-use platform and realize your dream, all without the hustle.') }}</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item carousel-item-landing"
                style="background-image: url('/images/JUMBO2.jpeg')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">{{ __('Secure Your Property') }}</h2>
                    <p class="lead">{{ __('We take all burden from you and manage your property as ours.') }}</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item carousel-item-landing"
                style="background-image: url('/images/JUMBO3.jpeg')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">{{ __('Sell! And Easily Restock') }}</h2>
                    <p class="lead">{{ __('Use our platform to sell or rent your place. Get direct contact to your clients.') }}</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('Previous') }}</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('Next') }}</span>
        </a>
    </div>

    <!-- Listings Section -->
    <!-- Must be changed to iterative list of listings -->
    <div class="container tab-content">
        @include('inc.listings', $uploads)
    </div>
@endsection
