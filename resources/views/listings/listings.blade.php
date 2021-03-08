@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                <a class="nav-item nav-link nav-link-browse @if(!Request::filled('type')) active @endif"
                    id="nav-all-tab" href="{{ route('listings') }}"
                    role="tab" aria-controls="nav-all" aria-selected="false">
                    {{ __('All Listings') }}
                </a>
                <a class="nav-item nav-link nav-link-browse @if (Request::filled('type') && Request::query('type') == 'rent') active @endif"
                   id="nav-rent-tab"  href="{{ query('listings', ['type' => 'rent']) }}" role="tab" aria-controls="nav-rent" aria-selected="true">
                    {{ __('For Rent') }}
                </a>
                <a class="nav-item nav-link nav-link-browse @if (Request::filled('type') && Request::query('type') == 'sale') active @endif"
                    id="nav-sell-tab" href="{{ query('listings', ['type' => 'sale']) }}" role="tab" aria-controls="nav-sell" aria-selected="true">
                    {{ __('For Sale') }}
                </a>
                <a class="nav-item nav-link nav-link-browse @if (Request::filled('type') && Request::query('type') == 'foreclosure') active @endif"
                    id="nav-foreclosure-tab" href="{{ query('listings', ['type' => 'foreclosure']) }}" role="tab" aria-controls="nav-foreclosure" aria-selected="true">
                    {{ __('Foreclosure') }}
                </a>
                <a class="nav-item nav-link nav-link-browse @if (Request::filled('type') && Request::query('type') == 'jointventure') active @endif"
                    id="nav-foreclosure-tab" href="{{ query('listings', ['type' => 'jointventure']) }}" role="tab" aria-controls="nav-foreclosure" aria-selected="true">
                    {{ __('Joint Venture') }}
                </a>
                <a class="nav-item nav-link nav-link-browse @if (Request::filled('type') && Request::query('type') == 'sold') active @endif"
                    id="nav-foreclosure-tab" href="{{ query('listings', ['type' => 'sold']) }}" role="tab" aria-controls="nav-foreclosure" aria-selected="true">
                    {{ __('Just Sold') }}
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="row mt-4 mb-3">
                <div class="col-9">{{ __('Filter by') }}:</div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label class="label my-0" for="house_type">{{ __('House Type') }}</label>
                    <div class="dropdown my-1" id="house_type">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle w-100"
                           href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (!Request::filled('htype'))
                               -- {{ __('Select the house type') }} --
                            @else
                                {{ Request::query('htype') }}
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ query_remove('listings', 'htype') }}">{{ __('All') }}</a>
                            @foreach (\App\Models\HouseType::all() as $h)
                                <a class="dropdown-item" href="{{ query('listings', ['htype' => $h->type]) }}">
                                    {{ __($h->type) }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <label class="label my-0" for="subcity">{{ __('Subcity') }}</label>
                    <div class="dropdown my-1" id="subcity">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle w-100"
                           href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (!Request::filled('subcity'))
                               -- {{ __('Select the subcity') }} --
                            @else
                                {{ Request::query('subcity' )}}
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ query_remove('listings', 'subcity') }}">{{ __('All') }}</a>
                            @foreach (\App\Models\State::all() as $s)
                                <a class="dropdown-item"  href="{{ query('listings', ['subcity' => $s->state]) }}">
                                    {{ __($s->state) }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <label class="label my-0" for="bed_number">{{ __('Beds') }}</label>
                    <div class="dropdown my-1" id="bed_number">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle w-100"
                           href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (!Request::filled('beds'))
                              -- {{ __('Select the bed number') }} --
                           @else
                               @switch(Request::query('beds'))
                                    @case(1)
                                        1 Bed Room
                                        @break
                                    @case(2)
                                        2 Bed Room
                                        @break
                                    @case(3)
                                        3 Bed Room
                                        @break
                                    @case(4)
                                        4 Bed Room
                                        @break
                                    @case(5)
                                        5 Bed Rooms and Above
                                        @break
                               @endswitch
                           @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ query_remove('listings', 'beds') }}">{{ __('All') }}</a>
                            <a class="dropdown-item" href="{{ query('listings', ['beds' => 1]) }}">
                                1 {{ __('Bed Room') }}
                            </a>
                            <a class="dropdown-item" href="{{ query('listings', ['beds' => 2]) }}">
                                2 {{ __('Bed Rooms') }}
                            </a>
                            <a class="dropdown-item" href="{{ query('listings', ['beds' => 3]) }}">
                                3 {{ __('Bed Rooms') }}
                            </a>
                            <a class="dropdown-item" href="{{ query('listings', ['beds' => 4]) }}">
                                4 {{ __('Bed Rooms') }}
                            </a>
                            <a class="dropdown-item" href="{{ query('listings', ['beds' => 5]) }}">
                                5 {{ __('Bed Rooms and Above') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <label class="label my-0" for="house_area">{{ __('Area') }}</label>
                    <div class="dropdown my-1" id="house_area">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle w-100"
                           href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (!Request::filled('area'))
                                -- {{ __('Select the area range') }} --
                            @else
                               @switch(Request::query('area'))
                                    @case(1)
                                        Below 100sqm
                                        @break
                                    @case(2)
                                        100 - 200sqm
                                        @break
                                    @case(3)
                                        200 - 300sqm
                                        @break
                                    @case(4)
                                        300 - 400sqm
                                        @break
                                    @case(5)
                                        Above 400sqm
                                        @break
                               @endswitch
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ query_remove('listings', 'area') }}">{{ __('All') }}</a>
                            <a class="dropdown-item" href="{{ query('listings', ['area' => 1]) }}">
                               {{ __('Below 100sqmr') }}
                            </a>
                            <a class="dropdown-item" href="{{ query('listings', ['area' => 2]) }}">
                               {{ __('100 - 200sqmr') }}
                            </a>
                            <a class="dropdown-item" href="{{ query('listings', ['area' => 3]) }}">
                               {{ __('200 - 300 sqmr') }}
                            </a>
                            <a class="dropdown-item" href="{{ query('listings', ['area' => 4]) }}">
                               {{ __('300 - 400 sqmr') }}
                            </a>
                            <a class="dropdown-item" href="{{ query('listings', ['area' => 5]) }}">
                               {{ __('Above 400sqmr') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center my-3" style="width: 100% !important; margin: auto !important; padding-top: 1rem !important;">
                <div class="col-3 form-check">
                    <input class="form-check-input" type="checkbox" id="filter_featured"
                            onclick="clickablecheckbox(this, '{{ query('listings', ['featured' => 1]) }}', '{{  query_remove('listings', 'featured') }}');"
                            @if(Request::has('featured')) checked @endif>
                    <label class="form-check-label" for="filter_featured">{{ __('Featured') }}</label>
                </div>
                <div class="col-3 form-check">
                    <input  class="form-check-input"type="checkbox" id="filter_reduced"
                            onclick="clickablecheckbox(this, '{{ query('listings', ['reduced' => 1]) }}', '{{  query_remove('listings', 'reduced') }}');"
                            @if(Request::has('reduced')) checked @endif>
                    <label class="label" for="filter_reduced">{{ __('Reduced Price') }}</label>
                </div>
                <div class="col-3 form-check">
                    <input class="form-check-input" type="checkbox" id="filter_new"
                            onclick="clickablecheckbox(this, '{{ query('listings', ['new' => 1]) }}', '{{  query_remove('listings', 'new') }}');"
                            @if(Request::has('new')) checked @endif>
                    <label class="label" for="filter_new">{{ __('New Construction') }}</label>
                </div>
                <div class="col-3 form-check">
                    <input class="form-check-input" type="checkbox" id="filter_open"
                            onclick="clickablecheckbox(this, '{{ query('listings', ['open' => 1]) }}', '{{  query_remove('listings', 'open') }}');"
                            @if(Request::has('open')) checked @endif>
                    <label class="label" for="filter_open">{{ __('Open House') }}</label>
                </div>
            </div>
            <div class="row justify-content-end my-3 mr-0 pr-0" style="width: auto !important; margin-right: 1rem !important;">
                <div class="input-group mb-3 col-3 w-100">
                    <label class="col-form-label mr-3" for="price">{{ __('Price') }}:</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text">{{ __('ETB') }}</span>
                    </div>
                    <input type="number" id="min_price" class="form-control" name="price"
                       value="{{ Request::query('min_price') ?? '' }}"
                       placeholder="{{ __('Min') }}" aria-label="Min price">
                </div>

                <div class="input-group mb-3 col-3 w-100">
                    <div class="input-group-prepend">
                        <span class="input-group-text">{{ __('ETB') }}</span>
                    </div>
                    <input type="number" id="max_price" class="form-control"
                        value="{{ Request::query('max_price') ?? '' }}"
                        placeholder="{{ __('Max') }}" aria-label="Max price">
                </div>
                <div class="col">
                    <button class="btn btn-secondary" onclick="filter_price();">
                        Go
                    </button>
                </div>
            </div>
            <hr>
            @include('inc.listings')
        </div>
    </div>

    <!-- Pagination -->
    <div class="row text-center d-flex justify-content-center">
        {{ $uploads->links() }}
    </div>

    <script type="text/javascript">
        function clickablecheckbox(element, query_str, query_removed_str)
        {
            if (element.checked)
                location.href=query_str;
            else
                location.href=query_removed_str;
        }
        function filter_price()
        {
            var min = document.getElementById('min_price').value;
            var max = document.getElementById('max_price').value;
            var route = "{{ route('listings') }}?";

            var query = new URLSearchParams(window.location.search);

            if (min > 0) {
                query.set('min_price', min);
            }

            if (max > 0 && max > min) {
                query.set('max_price', max);
            }
            location.href = route + query.toString();
        }
    </script>
@endsection
